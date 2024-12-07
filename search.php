<?php

include 'config.php';  // Ensure you have a database connection setup

// Check if the form is submitted and there's input
if (isset($_POST['search']) && !empty($_POST['search'])) {
    $searchTerm = $_POST['search'];

    // Sanitize input to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

    // Write your SQL query to search for account_id in the accounts table
    $sql = "SELECT * FROM accounts WHERE cid LIKE '%$searchTerm%'";

    // Run the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            // Display the result as needed, e.g., cid
            echo "<li>Account ID: " . $row['cid'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No accounts found.";
    }
} else {
    echo "Please enter a search term.";
}

?>
