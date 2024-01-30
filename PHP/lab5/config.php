<?php 
$host='localhost';
$user='root';
$password='';
$db='tasks';
$conn=mysqli_connect($host,$user,$password,$db);
if (!$conn) {
    die("Error is found". mysqli_connect_error());
}
echo 'connection done successfully'.'<br>';

// //table create statement
// $sql="CREATE TABLE `customer` (
// c_user VARCHAR(50) PRIMARY KEY,
// c_password VARCHAR(20) NOT NULL
// )";
// if (mysqli_query($conn,$sql)) {
//     echo 'table is built';
// }else{
//     $error=mysqli_error($conn);
//     echo 'error making table'.$error;
// }
