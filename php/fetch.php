<?php
include("connection.php");
$output = array();
// $query = '';
$query = 'SELECT * FROM student';
// if(isset($_POST[order])){
// $query .='';
// }

$statement = $connection->prepare($query);
$statement->execute();
$output = $statement->fetchAll();
echo json_encode($output);
?>