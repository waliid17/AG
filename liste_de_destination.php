<?php
$connection = new mysqli("localhost", "root", "", "AG");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $connection->prepare("SELECT * FROM `destinations`"
}
