<?php


function get_name($id){

    include "config.php";

    $query = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['name']." ".$row['family'];
    }else{
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

function cidAccount($id){
    include "config.php";
    $query = "SELECT * FROM accounts WHERE id = $id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['cid'];
    }else{
        return "Account not found";
    }
}