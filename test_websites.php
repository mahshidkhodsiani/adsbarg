<?php



$host = '185.141.212.171'; // Change as needed
$username = 'adsbarg_admin'; // Your database username
$password = 'HL(to{PCYL=b'; // Your database password
$dbname = 'adsbarg_dashboard'; // Replace with your database name


// $host = "localhost"; // Update with your DB host
// $username = "root";      // Update with your DB username
// $password = "";          // Update with your DB password
// $dbname = "adsbarg"; // Update with your DB name

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");


// Fetch websites where robot_checked is 0
$query = "SELECT user_id, user_website, account_id FROM user_websites WHERE robot_checked = 0";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    // Fetch keywords from the find_words table
    $words_query = "SELECT * FROM find_words";
    $words_result = $conn->query($words_query);

    if ($words_result->num_rows > 0) {
        // Iterate through each website
        while ($row = $result->fetch_assoc()) {
            $id = $row['user_id'];
            $url = $row['user_website'];
            $account_id = $row['account_id'];

            // Fetch content from the URL
            $content = fetchWebsiteContent($url);

            if ($content) {
                // Iterate through each keyword and check if it exists in the content
                while ($row_word = $words_result->fetch_assoc()) {
                    $keyword = $row_word['word'];

                    if (strpos($content, $keyword) !== false) {
                        echo "Keyword '$keyword' found in website ID: $id ($url)<br>";

                        // Insert the found keyword into the robot_words table
                        $stmt = $conn->prepare("INSERT INTO robot_words (user_id, account_id, user_websites, user_words) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("iiss", $id, $account_id, $url, $keyword);

                        if ($stmt->execute()) {
                            echo "Data inserted into robot_words for website ID: $id ($url) with keyword '$keyword'<br>";
                        } else {
                            echo "Error inserting data into robot_words for website ID: $id ($url): " . $stmt->error . "<br>";
                        }
                        $stmt->close();
                    } else {
                        echo "Keyword '$keyword' NOT found in website ID: $id ($url)<br>";
                    }
                }
                
                // Reset the pointer of the words result set for the next website
                $words_result->data_seek(0);
            } else {
                echo "Failed to fetch content for website ID: $id ($url)<br>";
            }

            // Update the robot_checked column to 1 after processing
            $update_stmt = $conn->prepare("UPDATE user_websites SET robot_checked = 1 WHERE user_id = ?");
            $update_stmt->bind_param("i", $id);

            if ($update_stmt->execute()) {
                echo "robot_checked updated to 1 for website ID: $id ($url)<br>";
            } else {
                echo "Error updating robot_checked for website ID: $id ($url): " . $update_stmt->error . "<br>";
            }
            $update_stmt->close();
        }
    } else {
        echo "No keywords found in the database.";
    }
} else {
    echo "No websites found in the database.";
}

// Function to fetch website content
function fetchWebsiteContent($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout in seconds
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects

    $content = curl_exec($ch);

    if (curl_errno($ch)) {
        return false;
    }

    curl_close($ch);
    return $content;
}

$conn->close();
?>
