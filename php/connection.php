<?php
///////////////////// PDO Connection /////////////////////

$connection = new PDO('mysql:host=localhost;dbname=testdb',"root","");

///////////////////// Mysqli Connection /////////////////////

$db_name = "testdb";
$mysql_username = "root";
$mysql_password = "";
$server_name = "localhost";
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password,$db_name);

?>