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