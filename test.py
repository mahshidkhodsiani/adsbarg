from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from webdriver_manager.chrome import ChromeDriverManager
import time

# Set up the WebDriver
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))

# Open the webpage
driver.get("https://fa.navasan.net/")

# Wait for the page to load fully and the rows for USD, Turkish Lira, and UAE Dirham
usd_row = WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.XPATH, '//tr[@data-code="usd"]'))
)

lira_row = WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.XPATH, '//tr[@data-code="try"]'))
)

aed_row = WebDriverWait(driver, 10).until(
    EC.presence_of_element_located((By.XPATH, '//tr[@data-code="aed"]'))
)

# Extract data from the USD row
usd_currency = usd_row.find_element(By.XPATH, './/a').text
usd_price = usd_row.find_element(By.XPATH, './/td[@class="price"]').text
try:
    usd_change = usd_row.find_element(By.XPATH, './/td[@class="change"]').text
except:
    usd_change = "N/A"

usd_time = usd_row.find_element(By.XPATH, './/td[@class="time"]').text

# Extract data from the Turkish Lira row
lira_currency = lira_row.find_element(By.XPATH, './/a').text
lira_price = lira_row.find_element(By.XPATH, './/td[@class="price"]').text
try:
    lira_change = lira_row.find_element(By.XPATH, './/td[@class="change"]').text
except:
    lira_change = "N/A"

lira_time = lira_row.find_element(By.XPATH, './/td[@class="time"]').text

# Extract data from the UAE Dirham row
aed_currency = aed_row.find_element(By.XPATH, './/a').text
aed_price = aed_row.find_element(By.XPATH, './/td[@class="price"]').text
try:
    aed_change = aed_row.find_element(By.XPATH, './/td[@class="change"]').text
except:
    aed_change = "N/A"

aed_time = aed_row.find_element(By.XPATH, './/td[@class="time"]').text

# Prepare the data to save in a file
result = (
    f"Currency: {usd_currency}\n"
    f"Price (Toman): {usd_price}\n"
    f"Change: {usd_change}\n"
    f"Time: {usd_time}\n\n"
    f"Currency: {lira_currency}\n"
    f"Price (Toman): {lira_price}\n"
    f"Change: {lira_change}\n"
    f"Time: {lira_time}\n\n"
    f"Currency: {aed_currency}\n"
    f"Price (Toman): {aed_price}\n"
    f"Change: {aed_change}\n"
    f"Time: {aed_time}\n"
)

# Save the result to prices.txt
with open('prices.txt', 'w', encoding='utf-8') as file:
    file.write(result)

print("Data saved to prices.txt")

# Close the browser window
driver.quit()
