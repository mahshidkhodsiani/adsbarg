from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from bs4 import BeautifulSoup
import mysql.connector

# Database configuration
db_config = {
    "host": "localhost",
    "user": "root",
    "password": "",
    "database": "adsbarg"
}

# Setup ChromeDriver
chrome_service = Service(ChromeDriverManager().install())
chrome_options = Options()
chrome_options.add_argument("--headless")
chrome_options.add_argument("--disable-gpu")
chrome_options.add_experimental_option("prefs", {"profile.managed_default_content_settings.images": 2})
driver = webdriver.Chrome(service=chrome_service, options=chrome_options)

# Open the website
url = "https://alanchand.com/"
driver.get(url)

# Wait for the page content to load
WebDriverWait(driver, 5).until(
    EC.presence_of_element_located((By.CLASS_NAME, "tableRow"))
)

# Parse the page content with BeautifulSoup
html = driver.page_source
soup = BeautifulSoup(html, 'html.parser')
rows = soup.select('.arz-body .tableRow')

# Extract relevant data
currencys = {}
currencies = ["دلار آمریکا", "درهم امارات", "لیر ترکیه", "بات تایلند"]

for row in rows:
    columns = row.find_all('div', class_='cell')
    if len(columns) >= 4:
        currency_name = columns[1].text.strip()
        if currency_name in currencies:
            buy_price = columns[2].text.strip().replace(",", "").replace(" ", "")
            currencys[currency_name] = buy_price

# Prepare data for insertion
data = (
    currencys.get("دلار آمریکا", ""),
    currencys.get("درهم امارات", ""),
    currencys.get("لیر ترکیه", ""),
    currencys.get("بات تایلند", "")
)

# Insert data into the database
if all(data):
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()
        cursor.execute(
            "INSERT INTO currencys (dollor, derham, lira, bat) VALUES (%s, %s, %s, %s)",
            data
        )
        conn.commit()
        print("Data inserted:", data)
    except mysql.connector.Error as e:
        print(f"Database error: {e}")
    finally:
        if conn.is_connected():
            cursor.close()
            conn.close()
else:
    print("Error: Missing data. No insertion made.")

# Close browser
driver.quit()
# time.sleep(5)