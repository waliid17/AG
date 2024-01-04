<?php 
$connection = new mysqli("localhost", "root" , "" , "AG");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$password = $_POST['password'];
$email = $_POST['email'];

$query= "SELECT `email`,`password` FROM `utilisateur` WHERE email='$email'";
$result = $connection->query($query);      
if ($result->num_rows > 0) {
    $row = mysqli_fetch_row($result);
    if ($password==$row[1]){
        echo "mabrok 3lik";
    }   
    else{
        echo "mdps ralet";
    } 
}
else {
    echo "roh takhdem compte ";
}