<?php

$host = "localhost";
$dbname = "TP_minichat";
$root = "root";
$password = "";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect($host, $root, $password, $dbname);



// Line for displaying error from MySQL
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!$link) {
    echo "Not connected to server";
}

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>