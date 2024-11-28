from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
from word_functions import get_resource_path, read_words, append_words
from mysql_connection import mysql_create_tables,extract_data,insert_into_robot_words
from selenium.webdriver.chrome.options import Options
from concurrent.futures import ThreadPoolExecutor
from collections import OrderedDict
import time


# DB Information
host = 'localhost'     
database = 'adsbarg'  
user = 'root'
password = ''

# DB_question = input('''Do you want me to create database tables for you? enter (Y or y)''')

# if DB_question == 'Y' or DB_question == 'y':
#     mysql_create_tables(host, database, user, password)
# else:
#     pass

# print('####################################################################')

words = list()
websites = list()
batch_size = 2

archive = OrderedDict()
# function to add non-repeating values ​​to a key
def add_value(key, value, user_id):

    if key not in archive:
        archive[key] = list() 
        
    if value not in archive[key]:  
        archive[key].append(value)
        insert_into_robot_words(int(user_id), value, key,host,database,user,password)

def setup_driver():

    chrome_options = Options()
    chrome_options.add_argument("--headless")
    chrome_options.add_argument("--disable-gpu")
    chrome_options.add_argument("--window-size=1920,1080")

    service = Service(ChromeDriverManager().install())
    driver = webdriver.Chrome(service=service,options=chrome_options)

    return driver

def analyze_website(data):

    id, user_id, url = data

    if data not in websites:
        driver = setup_driver()
        driver.get(f"https://{url}") 
        web_words = driver.find_element(By.XPATH, "/html/body").text
        web_words = web_words.split()
        websites.append(data)

    for word in words :

        # Unique search
        if word in web_words:
            # add_value(word, url, user_id)
            pass

        # General search
        if word in web_words and data in websites:
                insert_into_robot_words(int(user_id), url, word,host,database,user,password)
            

    driver.quit()

def main():

    while True:

        user_websites,find_words = extract_data(host,database,user,password)
        for word in find_words:
            if word[1] not in words:
                words.append(word[1])

        for i in range(0, len(user_websites), batch_size):
            batch = user_websites[i:i + batch_size]
            with ThreadPoolExecutor(max_workers=batch_size) as executor:
                executor.map(analyze_website, batch)

if __name__ ==  "__main__":
        main()