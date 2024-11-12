import mysql.connector
from mysql.connector import errorcode

def mysql_create_tables(host='localhost',database='wordpress',user='root',password=''):
    # Database connection configuration
    config = {
        'user': user,
        'password': password,
        'host': host,
        'database': database
    }

    # SQL statements to create tables
    TABLES = {}

    TABLES['user_websites'] = """
    CREATE TABLE IF NOT EXISTS user_websites (
        id INT AUTO_INCREMENT,
        user_id INT,
        user_website VARCHAR(255),
        PRIMARY KEY (id, user_id)
    );
    """

    TABLES['find_words'] = """
    CREATE TABLE IF NOT EXISTS find_words (
        id INT AUTO_INCREMENT,
        word VARCHAR(255),
        PRIMARY KEY (id)
    );
    """

    TABLES['robot_words'] = """
    CREATE TABLE IF NOT EXISTS robot_words (
        id INT AUTO_INCREMENT,
        user_id INT,
        user_websites VARCHAR(255),
        user_words VARCHAR(255),
        PRIMARY KEY (id, user_id)
    );
    """
    # Connect to MySQL and create tables
    try:
        cnx = mysql.connector.connect(**config)
        cursor = cnx.cursor()
        
        for table_name, table_sql in TABLES.items():
            try:
                cursor.execute(table_sql)
                print(f"Table `{table_name}` created successfully.")
            except mysql.connector.Error as err:
                if err.errno == errorcode.ER_TABLE_EXISTS_ERROR:
                    print(f"Table `{table_name}` already exists.")
                else:
                    print(err.msg)
        
        cursor.close()
        cnx.close()

    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Access denied. Check your username and password.")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exist.")
        else:
            print(err)


def extract_data(host='localhost',database='wordpress',user='root',password=''):

    # Database connection configuration
    config = {
        'user': user,
        'password': password,
        'host': host,
        'database': database
    }

    try:
        # # Connect to the MySQL database
        cnx = mysql.connector.connect(**config)
        cursor = cnx.cursor()

        # SQL query to select id, user_id, and user_website from user_websites
        query_1 = "SELECT id, user_id, user_website FROM user_websites"

        # SQL query to select id, user_id, and user_website from find_words
        query_2 = "SELECT id, word FROM find_words"

        # Execute the query_1
        cursor.execute(query_1)

        # Fetch all results_1
        results_1 = cursor.fetchall()

        # Execute the query_2
        cursor.execute(query_2)

        # Fetch all results_2
        results_2 = cursor.fetchall()

        # Close the cursor and connection
        cursor.close()
        cnx.close()

        return results_1,results_2
    
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Access denied. Check your username and password.")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exist.")
        else:
            print(err)

def insert_into_robot_words(user_id, user_websites, user_words,host='localhost'
                            ,database='wordpress',user='root',password=''):

    # Database connection configuration
    config = {
        'user': user,
        'password': password,
        'host': host,
        'database': database
    }

    try:

        # Connect to the MySQL database
        cnx = mysql.connector.connect(**config)
        cursor = cnx.cursor()

        # create a query
        query = """
        INSERT INTO robot_words (user_id, user_websites, user_words)
        VALUES (%s, %s, %s)
        """

        #choose query and values to execute
        values = (user_id, user_websites, user_words)
        cursor.execute(query, values)
        cnx.commit()  
        print(f"Data inserted successfully: {values}")

    except mysql.connector.Error as err:
        print(f"Error: {err}")
        
    finally:
        cursor.close()
        cnx.close()
                           
