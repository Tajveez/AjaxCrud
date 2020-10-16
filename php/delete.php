<?php
include("connection.php");

$id = $_POST['id'];
$query = 'DELETE FROM student
            WHERE stid = ?';
//prepare statement
$stmt = $connection->prepare($query);
$stmt->bindParam(1,$id);

$stmt->execute();

?>