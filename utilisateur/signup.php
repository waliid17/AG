<?php 
$connection = new mysqli("localhost", "root" , "" , "AG");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$password = $_POST['password'];
$email = $_POST['email'];

$query= "INSERT INTO `utilisateur` (`first-name`, `last-name`, `email`, `password`)
                          VALUES ('$firstname', '$lastname', '$email', '$password')";
$result = $connection->query($query);      