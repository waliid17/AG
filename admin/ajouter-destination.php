<?php
$connection = new mysqli("localhost", "root", "", "AG");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
echo "oui";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "oui";

    $nom = $_POST['DestinationName'];
    $Description = $_POST['DestinationDescription'];
    $Price = $_POST['DestinationPrice'];

    $destinationImage = $_FILES['DestinationImage'];

    $uploadDirectory = 'images/';
    $uploadedFileName = $uploadDirectory . basename($destinationImage['name']);
    $image = basename($destinationImage['name']);
    if (move_uploaded_file($destinationImage['tmp_name'], $uploadedFileName)) {

        echo "File uploaded successfully!";
    } else {

        echo "Error uploading file.";
    }

    $query = "INSERT INTO `destinations` (`nom`, `description`, `prix`, `image`) VALUES ('$nom', '$Description', $Price, '$image');";
    mysqli_query($connection, $query);
    header('Location: admin-destination.php');
    exit;
}

?>