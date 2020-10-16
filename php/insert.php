<?php
include("connection.php");

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$contact = $_REQUEST['contact'];
// echo $name.' '.$email.' '.$contact;

// $query = 'INSERT into student '.$name.','.$email.','.$contact;
// if(isset($_POST[order])){
// $query .='';
// }

// $statement = $connection->prepare('INSERT into student (stname, stemail, stcontact) VALUES (username, email, contact)');
// $result = $statement->execute(array(
//     'username' => $name,
//     'email' => $email,
//     'contact' => $contact
// ));

// $output = $statement->fetchAll();

// if(!empty($result)){
//     echo "data inserted";
// }
// else{
//     echo "cannot enter the data";
// }

///////////////////////// PDO Insert not working //////////////////////////////

///////////////////////// Trying Mysqli way //////////////////////////////

$sql = "INSERT INTO student (stname, stemail, stcontact)
VALUES ('$name', '$email', '$contact')";

if (mysqli_query($conn, $sql)) {
    echo "Data inserted";
}else{
    echo "Cannot insert the data";
}
?>