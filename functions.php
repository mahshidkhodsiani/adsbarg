<?php


function get_name($id) {
    if (empty($id) || !is_numeric($id)) {
        return "Invalid ID";
    }

    include "config.php";

    $stmt = $conn->prepare("SELECT name, family FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['name'] . " " . $row['family'];
    } else {
        return "null";
    }
}


function generateRandomID() {
    // Fixed part of the ID
    $part1 = 'ad';
    
    // Generate a random number for the second part (e.g., 12065)
    $part2 = rand(10000, 99999);  // Random number between 10000 and 99999
    
    // Generate a random number for the third part (e.g., 87335)
    $part3 = rand(10000, 99999);  // Random number between 10000 and 99999
    
    // Combine all parts into a single string
    $randomID = $part1 . '-' . $part2 . '-' . $part3;
    
    return $randomID;
}

function cidAccount($id) {
    include "config.php";

    // Ensure $id is a valid integer
    if (!is_numeric($id) || $id <= 0) {
        return "Invalid account ID";
    }

    // Use a prepared statement
    $stmt = $conn->prepare("SELECT cid FROM accounts WHERE id = ?");
    if ($stmt === false) {
        return "Query preparation failed: " . $conn->error;
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['cid'] ?? "CID ایجاد نشده";
    } else {
        return "CID ایجاد نشده";
    }
}
