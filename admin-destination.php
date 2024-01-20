<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>International</title>
    <link rel="stylesheet" href="admin-destination.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<?php
$connection = new mysqli("localhost", "root", "", "AG");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$action = isset($_POST['submit']) ? $_POST['submit'] : "pas daction";
if ($action == "Supprimer") {
    $id = $_GET["id"];
    $query = "DELETE FROM destinations WHERE `destinations`.`id` = $id";
    $result = $connection->query($query);
}

?>

<body>
    <header>
        <div class="logo">

        </div>
    </header><br><br>

    <div class="content">

        <table id="DestinationTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Action</th> <!-- New column for buttons -->
                </tr>
            </thead>
            <tbody id="DestinationBody">
                <?php
                $connection = new mysqli("localhost", "root", "", "AG");
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }
                $query = "SELECT * FROM `destinations`";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $nom = $row["nom"];
                        $description = $row["description"];
                        $image = $row["image"];
                        $prix = $row["prix"];
                        $id = $row["id"];
                        ?>
                        <tr>
                            <td>
                                <?= $nom ?>
                            </td>
                            <td>
                                <?= $description ?>
                            </td>
                            <td>
                                <?= $prix ?>
                            </td>
                            <td><img src="images/<?= $image ?>" alt="Image du Destination 1"></td>
                            <td>
                                <form method="post" action="admin-destination.php?id=<?= $id ?>">
                                    <button type="submit" name="submit" value="Supprimer">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "pas de destination";
                }

                ?>
            </tbody>
        </table>

        <form id="Destinations" action="ajouter-destination.php" method="POST" enctype="multipart/form-data">
            <label for="Destinations">Nom:</label>
            <input type="text" id="DestinationName" name="DestinationName" required>

            <label for="DestinationDescription">Description:</label>
            <input type="text" id="DestinationDescription" name="DestinationDescription" required>

            <label for="DestinationPrice">Prix:</label>
            <input type="text" id="DestinationPrice" name="DestinationPrice" required>

            <label for="DestinationImage">Image:</label>
            <input type="file" id="DestinationImage" name="DestinationImage" accept="image/*" required>

            <input type="submit">
        </form>

</body>

</html>

</div>
<footer>
    <p>Hamana-Travel Copyright 2023 </p>
</footer>
</body>

</html>