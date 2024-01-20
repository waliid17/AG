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
    $query = "DELETE FROM hotels WHERE `hotels`.`id` = $id";
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
                    <th>etoiles</th>
                    <th>Prix adulte</th>
                    <th>Prix enfants</th>
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

                $stmt = $connection->prepare("SELECT * FROM `hotels`");
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $nom = $row["nom"];
                        $description = $row["description"];
                        $etoiles = $row["etoiles"];
                        $prix_adulte = $row["prix_adulte"];
                        $prix_enfants = $row["prix_enfants"];
                        $image = $row["image"];
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
                                <?= $etoiles ?>
                            </td>
                            <td>
                                <?= $prix_adulte ?>
                            </td>
                            <td>
                                <?= $prix_enfants ?>
                            </td>
                            <td><img src="images/<?= $image ?>" alt="Image de l'hotel 1"></td>
                            <td>
                                <form method="post" action="admin-hotels.php?id=<?= $id ?>">
                                    <button type="submit" name="submit" value="Supprimer">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "pas d'hotel";
                }
                ?>
            </tbody>
        </table>
        <?php
        $connection = new mysqli("localhost", "root", "", "AG");

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $action = isset($_POST['submit']) ? $_POST['submit'] : "pas daction";
        if ($action == "ajouter") {
            // Check if all required fields are set
            if (
                isset($_POST['hotelName'], $_POST['hotelDescription'], $_POST['adultePrice'], $_POST['enfantsPrice'], $_POST['hoteletoiles'], $_FILES['hotelImage'])
            ) {
                $nom = $_POST['hotelName'];
                $Description = $_POST['hotelDescription'];
                $adultePrice = floatval($_POST['adultePrice']);
                $enfantsPrice = floatval($_POST['enfantsPrice']);
                $hoteletoiles = $_POST['hoteletoiles'];
                $hotelImage = $_FILES['hotelImage'];

                $uploadDirectory = 'images/';
                $uploadedFileName = $uploadDirectory . basename($hotelImage['name']);
                $image = basename($hotelImage['name']);

                if (move_uploaded_file($hotelImage['tmp_name'], $uploadedFileName)) {
                    echo "File uploaded successfully!";
                } else {
                    echo "Error uploading file.";
                }

                $stmt = $connection->prepare("INSERT INTO hotels (nom, description, prix_adulte, prix_enfants, etoiles,Image) VALUES (?, ?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die('Error in SQL query: ' . $connection->error);
                }

                $stmt->bind_param("ssddis", $nom, $Description, $adultePrice, $enfantsPrice, $hoteletoiles, $image);
                $stmt->execute();
                $stmt->close();
            }
        }
        ?>

        <form id="hotels" action="admin-hotels" method="POST" enctype="multipart/form-data">
            <label for="hotelName">Nom:</label>
            <input type="text" id="hotelName" name="hotelName" required>

            <label for="hotelDescription">Description:</label>
            <input type="text" id="hotelDescription" name="hotelDescription" required>

            <label for="adultePrice">Prix adulte:</label>
            <input type="text" id="adultePrice" name="adultePrice" required>

            <label for="enfantsPrice">Prix enfants:</label>
            <input type="text" id="enfantsPrice" name="enfantsPrice" required>

            <label for="hoteletoiles">Etoiles:</label>
            <input type="text" id="hoteletoiles" name="hoteletoiles" required>

            <label for="hotelImage">Image:</label>
            <input type="file" id="hotelImage" name="hotelImage" accept="image/*" required>

            <input type="submit" value="ajouter" name="submit">
        </form>

</body>

</html>

</div>
<footer>
    <p>Trusted-Travel Copyright 2023 </p>
</footer>
</body>

</html>