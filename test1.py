from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager  # Import this
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
from bs4 import BeautifulSoup
import time

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
exchange_rates = {}

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
                buy_price = columns[2].text.strip()
                sell_price = columns[3].text.strip()
                exchange_rates[currency_name] = {
                    "buy_price": buy_price,
                    "sell_price": sell_price
                }
    except Exception as e:
        print(f"Error processing row: {e}, Row HTML: {row}")

# Write extracted exchange rates to a file
with open("prices.txt", "w", encoding="utf-8") as file:
    for currency, rates in exchange_rates.items():
        line = f"{currency}: Buy - {rates['buy_price']}, Sell - {rates['sell_price']}\n"
        file.write(line)
        print(line.strip())  # Optional: Print while writing

# Close the browser
driver.quit()
time.sleep(5)