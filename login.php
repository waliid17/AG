<?php
$connection = new mysqli("localhost", "root", "", "AG");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$password = $_POST['password'];
$email = $_POST['email'];

$query = "SELECT `email`,`password`,id FROM `utilisateur` WHERE email='$email'";
$result = $connection->query($query);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
        header("Location: index.php");
        session_start();

        $_SESSION['user_id'] = $row['id'];
    } else {
        echo "mdps ralet";
    }
} else {
    echo "roh takhdem compte ";
}