<?php
    include 'config.php';
var_dump($_POST);
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $u_user = $_POST['username'];
            $u_password = $_POST['password'];
            $sql = "INSERT INTO customer VALUES ('$u_user','$u_password');";
            $query = mysqli_query($conn, $sql);
            header('location:login.php');
            echo "User added successfully";
            if (!$query) {
            }
            
        
    }else {
        header('HTTP/1.1 400 Bad Request');
        echo 'Invalid request';
    }
