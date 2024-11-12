import mysql.connector
from mysql.connector import errorcode

# Database connection configuration
config = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'adsbarg'
}

# List of words to insert
words_to_insert = [
    "باربری", "بار", "ظریف", "اتوبار", "صداقت", "اطلس", "ایزی", "تابان", "فدک", "حمل",
    "اسباب کشی", "اثاثیه", "بین شهری", "وانت", "نیسان", "خاور", "انبار", "مسقف", "ادمین",
    "پیج", "ارز", "دیجیتال", "سرمایه گذاری", "وام", "سیم کارت", "طلا", "سیمکارت", "ترید",
    "تتر", "صراف", "صرافی", "سقط", "جنین", "لابیاپلاستی", "لابیا", "واژن", "پراپ", "پراپی",
    "مکمل", "ویتامین", "آرایشی", "پوشاک", "کرم"
]

try:
    # Connect to the MySQL database
    cnx = mysql.connector.connect(**config)
    cursor = cnx.cursor()

    # SQL Insert Statement
    add_word = "INSERT INTO find_words (word) VALUES (%s)"

    # Insert each word into the find_words table
    for word in words_to_insert:
        cursor.execute(add_word, (word,))
    
    # Commit the transaction
    cnx.commit()
    print(f"Inserted {len(words_to_insert)} words into `find_words` table.")

    # Close the cursor and connection
    cursor.close()
    cnx.close()

except mysql.connector.Error as err:
    if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
        print("Access denied. Check your username and password.")
    elif err.errno == errorcode.ER_BAD_DB_ERROR:
        print("Database does not exist.")
    else:
        print(err)
