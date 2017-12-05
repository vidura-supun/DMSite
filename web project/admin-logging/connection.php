<?php

$host="localhost";
$username="root";
$password="";
$database="Vipath";

$myConn = mysqli_connect($host, $username, $password,$database);

if (!$myConn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "<p>");
}

 ?>
