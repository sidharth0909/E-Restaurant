<?php
$servername = "localhost"; //server
$username = "root"; //username
$password = ""; //password
$dbname = "food";  //database

/*
$servername = "sql110.epizy.com"; //server
$username = "epiz_33779662"; //username
$password = "0aPe7ZtnSU"; //password
$dbname = "epiz_33779662_food";  //database


*/

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}
$con = $db;

?>