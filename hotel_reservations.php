<?php
// Database connection details
$connection = new mysqli("localhost", "root", "", "AG");

// Check for a successful connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST["visitor_first_name"];
    $last_name = $_POST["visitor_last_name"];
    $email = $_POST["visitor_email"];
    $phone = $_POST["visitor_phone"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $total_adults = $_POST["total_adults"];
    $total_children = $_POST["total_children"];
    $room_preference = $_POST["room_preference"];

    // Insert data into the database
    $stmt = $connection->prepare("INSERT INTO hotel_reservations (visitor_first_name, visitor_last_name, visitor_email, visitor_phone, checkin, checkout, total_adults, total_children, room_preference) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if the statement is prepared successfully
    if ($stmt === false) {
        die("Error during prepare: " . $connection->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssssssiss", $first_name, $last_name, $email, $phone, $checkin, $checkout, $total_adults, $total_children, $room_preference);

    if ($stmt->execute()) {
        echo "Reservation successfully submitted!";
    } else {
        echo "Error during execution: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$connection->close();
?>