<?php
// Database connection
$host = "localhost"; // Update with your DB host
$user = "root";      // Update with your DB username
$pass = "";          // Update with your DB password
$dbname = "adsbarg"; // Update with your DB name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch websites from the database
$query = "SELECT user_id, user_website FROM user_websites";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $keyword = "طراحی"; // Word to search for
    while ($row = $result->fetch_assoc()) {
        $id = $row['user_id'];
        $url = $row['user_website'];

        // Fetch content from the URL
        $content = fetchWebsiteContent($url);

        if ($content) {
            // Check if the keyword exists in the content
            if (strpos($content, $keyword) !== false) {
                echo "Keyword found in website ID: $id ($url)<br>";

                // Insert the found keyword into the robot_words table
                $stmt = $conn->prepare("INSERT INTO robot_words (user_id, user_websites, user_words) VALUES (?, ?, ?)");
                $stmt->bind_param("iss", $id, $url, $keyword);

                if ($stmt->execute()) {
                    echo "Data inserted into robot_words for website ID: $id ($url)<br>";
                } else {
                    echo "Error inserting data into robot_words for website ID: $id ($url): " . $stmt->error . "<br>";
                }
                $stmt->close();
            } else {
                echo "Keyword NOT found in website ID: $id ($url)<br>";
            }
        } else {
            echo "Failed to fetch content for website ID: $id ($url)<br>";
        }
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
