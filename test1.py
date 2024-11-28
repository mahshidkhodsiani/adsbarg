import os
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

# linux64 webdriver
# https://storage.googleapis.com/chrome-for-testing-public/131.0.6778.85/linux64/chrome-linux64.zip

# ********************************************************************************************************

# DB Info
host= 'localhost'
database = 'adsbarg'
user = 'root'
password = ''

# host= '185.8.173.137'
# database = 'mahshid_adsbarg'
# user = 'mahshid_admin'
# password = 'IpNOJm$vXORM'

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
                id INT AUTO_INCREMENT PRIMARY KEY,
                USD VARCHAR(255) DEFAULT '0',
                AED VARCHAR(255) DEFAULT '0',
                TRY VARCHAR(255) DEFAULT '0',
                THB VARCHAR(255) DEFAULT '0'
            );
        """}

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
                    print(f"Error creating table {table_name}: {err.msg}")
                else:
                    print(f"Table {table_name} already exists.")

            # Insert a row with id=1 and other values set to '0'
            insert_query = """
                INSERT INTO currencys (id, USD, AED, TRY, THB) 
                VALUES (1, '0', '0', '0', '0') 
                ON DUPLICATE KEY UPDATE 
                USD = '0', AED = '0', TRY = '0', THB = '0';
            """
            cursor.execute(insert_query)
            print("Initial row inserted successfully.")

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

mysql_create_tables(host, database, user, password)

# ********************************************************************************************************

def update_currency_prices(new_prices, host='localhost', database='wordpress', user='root', password=''):
    # Database connection configuration
    config = {
        'user': user,
        'password': password,
        'host': host,
        'database': database
    }

    # SQL statement to update prices in the row with id = 1
    update_price_query = """
        UPDATE currencys
        SET USD = %s, AED = %s, TRY = %s, THB = %s
        WHERE id = 1
    """

    try:
        # Connect to the MySQL database
        cnx = mysql.connector.connect(**config)
        cursor = cnx.cursor()

        # Update the prices for the row with id = 1
        print("Updating currency prices...")

        cursor.execute(update_price_query, (
            new_prices['USD']['new_price'],
            new_prices['AED']['new_price'],
            new_prices['TRY']['new_price'],
            new_prices['THB']['new_price']
        ))

        # Commit the changes after updating prices
        cnx.commit()

        # Close the cursor and connection
        cursor.close()
        cnx.close()
        print("Currency prices updated successfully!")

    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Access denied. Check your username and password.")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print(f"Database '{database}' does not exist.")
        else:
            print(f"MySQL Error: {err}")

# ********************************************************************************************************

def setup_driver():
    # مسیر chrome driver را تعیین می‌کنیم. اگر chromedriver در مسیر پیش‌فرض باشد، نیاز به تعیین مسیر نیست.
    chromedriver_path = ChromeDriverManager().install()
    
    # بررسی وجود ChromeDriver
    if not os.path.exists(chromedriver_path):
        raise FileNotFoundError(f"ChromeDriver not found at {chromedriver_path}")
    
    # تنظیمات Chrome برای حالت headless و بهینه‌سازی
    chrome_options = Options()
    chrome_options.add_argument("--headless")  # اجرای Chrome در حالت headless
    chrome_options.add_argument("--disable-gpu")  # غیرفعال کردن GPU برای بهبود عملکرد
    chrome_options.add_argument("--window-size=1920,1080")  # تنظیم سایز پنجره مرورگر
    chrome_options.add_argument("--ignore-certificate-errors")  # نادیده گرفتن خطاهای گواهی‌نامه
    chrome_options.add_argument("--disable-web-security")  # غیرفعال کردن امنیت وب برای تست‌ها

    try:
        # استفاده از ChromeDriver با مسیر خودکار نصب شده
        service = Service(executable_path=chromedriver_path)
        driver = webdriver.Chrome(service=service, options=chrome_options)
    except Exception as e:
        print(f"Error initializing the ChromeDriver: {e}")
        print("Please make sure Chrome is installed and accessible.")
        raise

    return driver

# ********************************************************************************************************
# USD - دلار آمریکا
# AED - درهم امارات
# TRY - لیر ترکیه
# THB - بات تایلند

# Please do not change the format below ...
new_prices = {
    'USD': {'new_price': '0'},
    'AED': {'new_price': '0'},
    'TRY': {'new_price': '0'},
    'THB': {'new_price': '0'}
}

# scrape_loop_details inputs
page_load_timeout = 50

def scrape_loop_details(url, driver):
    while True:
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
                # Convert value from Rial to Toman (divide by 10)
                value_in_toman = float(value.replace(',', '')) / 10

                # Format the value with a comma every three digits and one decimal place
                formatted_value = f"{value_in_toman:,.0f}"

                # Now store the formatted value
                if url == "/price_dollar_rl":
                    new_prices['USD']['new_price'] = formatted_value
                elif url == "/price_aed":
                    new_prices['AED']['new_price'] = formatted_value
                elif url == "/price_try":
                    new_prices['TRY']['new_price'] = formatted_value
                elif url == "/price_thb":
                    new_prices['THB']['new_price'] = formatted_value

                print(new_prices)

                update_currency_prices(new_prices, host, database, user, password)
                time.sleep(30)

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
