from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options
from concurrent.futures import ThreadPoolExecutor
import time

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

def scrape_loop_details(url, driver):

    while True:

        span_element = WebDriverWait(driver, 5).until(
            EC.presence_of_element_located((By.XPATH, "//span[@data-col='info.last_trade.PDrCotVal']"))
        )
        
        value = span_element.text.strip()
        
        if not value:
            value = driver.execute_script(
                "return document.querySelector('span[data-col=\"info.last_trade.PDrCotVal\"]').textContent;"
            )
        
        print(url, " ", value.strip())
        print("*************************************************************************")
        
        driver.refresh()
        
        time.sleep(2)

def analyze_website(url):

    driver = setup_driver()
    driver.get(f"https://www.tgju.org/profile{url}") 

    try:
        scrape_loop_details(url, driver)

    except Exception as e:
        print(f"Error processing {url}: {e}")

    finally:
        driver.quit()

def main():

    urls = ["/price_dollar_rl", "/price_aed", "/price_try", "/price_thb"]

    batch_size = 4

    with ThreadPoolExecutor(max_workers=batch_size) as executor:
        executor.map(analyze_website, urls)

if __name__ == "__main__":

    main()
