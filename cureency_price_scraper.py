from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from concurrent.futures import ThreadPoolExecutor
import mysql.connector
from mysql.connector import errorcode
import time
import datetime

# ********************************************************************************************************

# DB Info
host= 'localhost'
database = 'adsbarg'
user = 'root'
password = ''

def mysql_create_tables(host='localhost', database='wordpress', user='root', password=''):
    # Database connection configuration
    config = {
        'user': user,
        'password': password,
        'host': host,
        'database': database
    }

    # SQL statements to create tables
    TABLES = {
        'currencys': """
            CREATE TABLE IF NOT EXISTS currencys (
                id INT AUTO_INCREMENT,
                currency VARCHAR(255),
                price_11 VARCHAR(255),
                price_17 VARCHAR(255),
                PRIMARY KEY (id,currency)
            );
        """
    }

    # Connect to MySQL and create tables
    try:
        cnx = mysql.connector.connect(**config)
        cursor = cnx.cursor()

        # Loop through and execute the table creation queries
        for table_name, table_sql in TABLES.items():
            try:
                print(f"Creating table {table_name}...")
                cursor.execute(table_sql)
                print(f"Table {table_name} created successfully.")
            except mysql.connector.Error as err:
                # If the table already exists, skip it
                if err.errno != errorcode.ER_TABLE_EXISTS_ERROR:
                    print(f"Table {table_name} already exists.")
                else:
                    print(f"Error creating table {table_name}: {err.msg}")

        # Commit and close the cursor and connection
        cnx.commit()
        cursor.close()
        cnx.close()

    except mysql.connector.Error as err:
        # Handling connection errors
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Access denied. Check your username and password.")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print(f"Database '{database}' does not exist.")
        else:
            print(f"MySQL Error: {err}")

# ********************************************************************************************************

def update_currency_prices(new_prices,host='localhost', database='wordpress', user='root', password=''):
    # Database connection configuration
    config = {
        'user': user,
        'password': password,
        'host': host,
        'database': database
    }

    # SQL statements to update prices
    update_price_11_query = """
        UPDATE currencys
        SET price_11 = %s
        WHERE currency = %s;
    """
    update_price_17_query = """
        UPDATE currencys
        SET price_17 = %s
        WHERE currency = %s;
    """

    try:
        # Connect to the MySQL database
        cnx = mysql.connector.connect(**config)
        cursor = cnx.cursor()

        # Update price_11 first for each currency
        print("Updating price_11 values...")
        for currency, prices in new_prices.items():
            cursor.execute(update_price_11_query, (prices['new_price_11'], currency))
            print(f"Updated price_11 for {currency}: {prices['new_price_11']}")

        # Commit the changes after updating price_11
        cnx.commit()

        # Update price_17 after price_11
        print("Updating price_17 values...")
        for currency, prices in new_prices.items():
            cursor.execute(update_price_17_query, (prices['new_price_17'], currency))
            print(f"Updated price_17 for {currency}: {prices['new_price_17']}")

        # Commit the changes after updating price_17
        cnx.commit()

        cursor.close()
        cnx.close()

    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Access denied. Check your username and password.")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print(f"Database '{database}' does not exist.")
        else:
            print(f"MySQL Error: {err}")

mysql_create_tables(host, database, user, password)

# ********************************************************************************************************

def setup_driver():
    chrome_options = Options()
    chrome_options.add_argument("--headless")  
    chrome_options.add_argument("--disable-gpu") 
    chrome_options.add_argument("--window-size=1920,1080") 
    chrome_options.add_argument("--ignore-certificate-errors")  
    chrome_options.add_argument("--disable-web-security")  
    
    # Initialize the Chrome WebDriver with the options
    service = Service(ChromeDriverManager().install())
    driver = webdriver.Chrome(service=service, options=chrome_options)
    return driver

# ********************************************************************************************************
# USD - دلار آمریکا
# AED - درهم امارات
# TRY - لیر ترکیه
# THB - بات تایلند

# Please do not change the format below ... 
new_prices = {
    'USD': {'new_price_11': '120', 'new_price_17': '0'},
    'AED': {'new_price_11': '0', 'new_price_17': '0'},
    'TRY': {'new_price_11': '0', 'new_price_17': '0'},
    'THB': {'new_price_11': '0', 'new_price_17': '0'}
}

# scrape_loop_details inputs
first_time = 11
second_time = 17
minutes = 0
page_load_timeout = 50

# ********************************************************************************************************

def scrape_loop_details(url, driver):
    global counter

    while True:
        current_time = datetime.datetime.now()

        if current_time.hour in [first_time, second_time] and current_time.minute == minutes:
            value = None

            # Search to get a valid value
            while not value:
                try:
                    # Wait for the element and get the value
                    span_element = WebDriverWait(driver, page_load_timeout).until(
                        EC.presence_of_element_located((By.XPATH, "//span[@data-col='info.last_trade.PDrCotVal']"))
                    )
                    value = span_element.text.strip()

                    # If the value is empty, get it from JavaScript
                    if not value:
                        value = driver.execute_script(
                            "return document.querySelector('span[data-col=\"info.last_trade.PDrCotVal\"]').textContent;"
                        ).strip()

                except Exception as e:
                    print(f"Error retrieving value, retrying: {e}")
                    time.sleep(1)

            # If a valid value is received, update the data
            if value:
                if current_time.hour == first_time:
                    if url == "/price_dollar_rl":
                        new_prices['USD']['new_price_11'] = value
                    elif url == "/price_aed":
                        new_prices['AED']['new_price_11'] = value
                    elif url == "/price_try":
                        new_prices['TRY']['new_price_11'] = value
                    elif url == "/price_thb":
                        new_prices['THB']['new_price_11'] = value

                elif current_time.hour == second_time:
                    if url == "/price_dollar_rl":
                        new_prices['USD']['new_price_17'] = value
                    elif url == "/price_aed":
                        new_prices['AED']['new_price_17'] = value
                    elif url == "/price_try":
                        new_prices['TRY']['new_price_17'] = value
                    elif url == "/price_thb":
                        new_prices['THB']['new_price_17'] = value

                update_currency_prices(new_prices, host, database, user, password)
                counter += 1
                print(f"Updated prices at {current_time}. Counter: {counter}")

                # Refresh the browser
                driver.refresh()

# ********************************************************************************************************

def analyze_website(url):
    
    driver = setup_driver()
    driver.get(f"https://www.tgju.org/profile{url}")
    
    try:
        scrape_loop_details(url, driver)

    except Exception as e:
        print(f"Error processing {url}: {e}")

    finally:
        driver.quit()

# ********************************************************************************************************

def main():

    urls = ["/price_dollar_rl", "/price_aed", "/price_try", "/price_thb"]

    batch_size = 4

    with ThreadPoolExecutor(max_workers=batch_size) as executor:
        executor.map(analyze_website, urls)

if __name__ == "__main__":

    main()