<?php
$connection = new mysqli("localhost", "root", "", "AG");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if required fields are set
    if (
        isset($_POST["nom"], $_POST["prenom"], $_POST["Date_de_naissance"], $_POST["email"], $_POST["telephone"],
        $_POST["ville_depart"], $_POST["Date_de_departt"], $_POST["Date_de_Retour"], $_POST["heure_depart"], $_POST["classe"], $_POST["reserver_hotel"])
    ) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $dob = $_POST["Date_de_naissance"];
        $email = $_POST["email"];
        $telephone = $_POST["telephone"];
        $ville_depart = $_POST["ville_depart"];
        $date_depart = $_POST["Date_de_departt"];
        $date_retour = $_POST["Date_de_Retour"];
        $heure_depart = $_POST["heure_depart"];
        $classe = $_POST["classe"];
        $reponse = $_POST["reserver_hotel"];

        // Flight Reservation Insertion
        $stmt = $connection->prepare("INSERT INTO reservation_vol (nom, prenom, date_naissance, email, telephone, ville_depart, date_depart, date_retour, heure_depart, classe) 
                                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssssss", $nom, $prenom, $dob, $email, $telephone, $ville_depart, $date_depart, $date_retour, $heure_depart, $classe);

        if ($stmt->execute()) {
            echo "Réservation du vol réussie.<br>";
        } else {
            echo "Flight Error: " . $stmt->error . "<br>";
        }

        $stmt->close();

        // Hotel Reservation Insertion
        if ($reponse == "oui") {
            $checkin = $_POST["checkin"];
            $checkout = $_POST["checkout"];
            $adults = $_POST["total_adults"];
            $enfants = $_POST["total_children"];
            $nombre_de_nuits = $_POST["Nombre_de_nuits"];
            $categorie_de_chambre = $_POST["Categorie_de_chambre"];

            $stmt = $connection->prepare("INSERT INTO hotel_reservations (checkin, checkout, total_adults, total_children, Nombre_de_nuits, Categorie_de_chambre ) 
            VALUES (?, ?, ?, ?, ?, ?)");

            $stmt->bind_param("ssssss", $checkin, $checkout, $adults, $enfants, $nombre_de_nuits, $categorie_de_chambre);

            if ($stmt->execute()) {
                echo "Réservation à l'hôtel réussie.<br>";
            } else {
                echo "Hotel Error: " . $stmt->error . "<br>";
            }

            $stmt->close();
        }
    } else {
        echo "Error: Required fields not set.";
    }
}

$connection->close();
?>