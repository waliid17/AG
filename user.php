<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="profile"> test </div>

    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        echo "id is set: $id ";
        $connection = new mysqli("localhost", "root", "", "AG");
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $query = "SELECT `email`,`first-name`,`last-name` FROM `utilisateur` WHERE id=$id";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "first name: " . $row["first-name"] . " last name: " . $row["last-name"] . " email " . $row["email"];
            $firstname = $row["first-name"];
        }
    } else {
        echo "roh takhdem compte ";
    }
    ?><br>
    <h1>
        <?= $firstname ?>
    </h1>

</body>

</html>