<?php
$connection = new mysqli("localhost", "root", "", "AG");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $connection->real_escape_string($_POST["name"]);
    $email = $connection->real_escape_string($_POST["email"]);
    $subject = $connection->real_escape_string($_POST["subject"]);
    $message = $connection->real_escape_string($_POST["message"]);
    $insert_query = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($connection->query($insert_query) === TRUE) {
        echo "Your message has been received ";
    } else {
        echo "Error inserting data into the database: " . $connection->error;
    }
    $connection->close();
}
?>
<?php
$connection = new mysqli("localhost", "root", "", "AG");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$select_query = "SELECT * FROM contact_messages";
$result = $connection->query($select_query);

if ($result->num_rows > 0) {
    $messages = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $messages = array();
}

$connection->close();
?>