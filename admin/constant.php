<?php
// local server 
// $base_url = "http://localhost/blog/admin/";
// $conn = new mysqli('localhost','root','','blog');
// $site_url = "http://localhost/blog/";\


/*
// live server 
$base_url = "http://baglelo.com/apniteam11blog/admin/";
$site_url = "http://baglelo.com/apniteam11blog/";
$conn = new mysqli('localhost','u971773953_apniteam11','Apniteam11@123','u971773953_apniteam11');
// $conn = new mysqli('localhost', 'root', '', 'apniteam11');
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} else {
    // print_r($conn);
}*/

// live server 
$base_url = "http://apniteam11.in/admin/";
$site_url = "http://apniteam11.in";
$conn = new mysqli('localhost','u971773953_apniteam11','Apniteam11@123','u971773953_apniteam11');
// $conn = new mysqli('localhost', 'root', '', 'apniteam11');
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} else {
    // print_r($conn);
}


?>