<?php
// Configuration
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';
$db_name = 'northwind';

// Create Connection
$mysql = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

// Check Connection
if (!$mysql) {
    die ("Connection Failed : " . mysqli_connect_error());
}
// echo "Connection Successfully";
// mysqli_close($mysql);