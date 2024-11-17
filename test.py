from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
import time

# Set up the Selenium WebDriver
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))

# Open the page
url = 'https://www.tgju.org/local-markets'
driver.get(url)

# Wait for the page to load
time.sleep(5)  # Adjust this based on your internet speed and the page load time

# Find the currency values
currencies = {
    'دلار': None,
    'درهم': None,
    'لیر': None,
    'بات': None
}

# Look for the rows containing the currency data
rows = driver.find_elements(By.CSS_SELECTOR, 'tr')  # Adjust selector if needed

for row in rows:
    columns = row.find_elements(By.TAG_NAME, 'td')  # Corrected: Use TAG_NAME directly here
    if len(columns) > 1:
        name = columns[0].text.strip()
        if name in currencies:
            currencies[name] = columns[1].text.strip()  # Assuming the rate is in the second column

# Print the results
print(currencies)

# Close the browser
driver.quit()
