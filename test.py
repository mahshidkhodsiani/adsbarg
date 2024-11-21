from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from bs4 import BeautifulSoup
import mysql.connector
import time

# Database connection configuration
db_config = {
    "host": "localhost",  # Replace with your MySQL host
    "user": "root",  # Replace with your MySQL username
    "password": "",  # Replace with your MySQL password
    "database": "adsbarg"  # Replace with your database name
}

# Set up the Chrome WebDriver
chrome_service = Service(ChromeDriverManager().install())
chrome_options = Options()
driver = webdriver.Chrome(service=chrome_service, options=chrome_options)

# Open the website
url = "https://alanchand.com/"
driver.get(url)

# Wait for the page to load completely
WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.CLASS_NAME, "tableRow"))
)

# Parse the page content using BeautifulSoup
html = driver.page_source
soup = BeautifulSoup(html, 'html.parser')

# Find the exchange rates container
rows = soup.select('.arz-body .table .body .tableRow')

# Initialize a dictionary to store exchange rates
currencys = {}

# Define the currencies you are interested in
currencies = ["دلار آمریکا", "درهم امارات", "لیر ترکیه", "بات تایلند"]

# Extract data
for row in rows:
    try:
        # Extract columns
        columns = row.find_all('div', class_='cell')
        if len(columns) >= 4:
            currency_name = columns[1].text.strip()
            if currency_name in currencies:
                buy_price = columns[2].text.strip().replace(",", "").replace(" ", "")  # Remove commas and spaces
                sell_price = columns[3].text.strip().replace(",", "").replace(" ", "")  # Remove commas and spaces
                currencys[currency_name] = {
                    "buy_price": buy_price,
                    "sell_price": sell_price
                }
    except Exception as e:
        print(f"Error processing row: {e}, Row HTML: {row}")

# Debugging: Print out the exchange rates
print("Extracted exchange rates:")
for currency, rates in currencys.items():
    print(f"{currency}: Buy - {rates['buy_price']}, Sell - {rates['sell_price']}")

# Prepare the data for the table
dollor = currencys.get("دلار آمریکا", {}).get("buy_price", "").strip()
derham = currencys.get("درهم امارات", {}).get("buy_price", "").strip()
lira = currencys.get("لیر ترکیه", {}).get("buy_price", "").strip()
bat = currencys.get("بات تایلند", {}).get("buy_price", "").strip()

# Only proceed with the insertion if all values are valid (not empty)
if dollor and derham and lira and bat:
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()

        # SQL query to insert exchange rates into the table
        sql = """
        INSERT INTO currencys (dollor, derham, lira, bat)
        VALUES (%s, %s, %s, %s)
        """
        values = (dollor, derham, lira, bat)

        # Execute and commit the insertion
        cursor.execute(sql, values)
        conn.commit()
        
        print(f"Inserted exchange rates: Dollor - {dollor}, Derham - {derham}, Lira - {lira}, Bat - {bat}")
    except mysql.connector.Error as err:
        print(f"Database error: {err}")
    finally:
        if conn.is_connected():
            cursor.close()
            conn.close()
else:
    print("Error: One or more exchange rates are missing or invalid. No data inserted.")

# Close the browser
driver.quit()
