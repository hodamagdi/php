<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_day_4';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

if(isset($_GET['id'])) {
    $id =$_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id ";
    $result = mysqli_query($conn, $sql);

    header("location: userDetails.php");
} 
