<?php

$servername = "localhost";
$username = "root";
$password = "";
$db='task2';

// Create connection
$conn =mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Error is found". mysqli_connect_error());
}
echo 'connection done successfully'.'<br>';

// create table
// $sql= 'CREATE TABLE users(
//     user_id INT AUTO_INCREMENT primary key,
//     user_name VARCHAR(20) not NULL,
//     user_email VARCHAR(50) not NULL,
//     user_gender ENUM("male","female") NOT NULL,
//     user_agree boolean not NULL,
//     user_class_details VARCHAR(1000)

// )';
// if (mysqli_query($conn, $sql)) {
//     echo "Table users created successfully";
//   } else {
//     echo "Error creating table: " . mysqli_error($conn);
//   }