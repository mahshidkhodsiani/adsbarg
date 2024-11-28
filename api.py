from flask import Flask, jsonify
import mysql.connector

app = Flask(__name__)

# Database connection configuration
db_config = {
    "host": "185.8.173.137",  # Replace with your MySQL host
    "user": "mahshid_admin",  # Replace with your MySQL username
    "password": "5Pbbpm#V7a2d",  # Replace with your MySQL password
    "database": "mahshid_test"  # Replace with your database name
}

@app.route('/exchange-rates', methods=['GET'])
def get_exchange_rates():
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor(dictionary=True)

        # Query to get the latest exchange rates
        cursor.execute("SELECT * FROM currencys ORDER BY id DESC LIMIT 1")
        result = cursor.fetchone()

        if result:
            return jsonify(result)
        else:
            return jsonify({"error": "No data found"}), 404

    except mysql.connector.Error as err:
        return jsonify({"error": str(err)}), 500
    finally:
        if conn.is_connected():
            cursor.close()
            conn.close()

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
