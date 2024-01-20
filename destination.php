<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>paris</title>
  <link rel="stylesheet" href="paris.css">
</head>

<body>

  <?php
  $nom = $_GET["nom"];
  ?>
  <header>
    <a href="index.php"><button class="button">
        <div class="button-box">
          <span class="button-elem">
            <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z">
              </path>
            </svg>
          </span>
          <span class="button-elem">
            <svg viewBox="0 0 46 40">
              <path
                d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z">
              </path>
            </svg>
          </span>
        </div>
      </button></a>
  </header><br><br>
  <h1>Reservation vers
    <?= $nom ?>
  </h1>
  <form id="volForm" action="reservation_vol.php" method="post">
    <div class="content">
      <section>
        <div id="VolFormContainer">
          <h2>Réservation de Vol</h2>

          <div class="elem-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
          </div>
          <div class="elem-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
          </div>
          <div class="elem-group">
            <label for="dob">Date de naissance</label>
            <input type="date" id="dob" name="Date de naissance" required>
          </div>
          <div class="elem-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="elem-group">
            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone">
          </div>
          <div class="elem-group">
            <label for="ville_depart">Ville de départ :</label>
            <input type="text" id="ville_depart" name="ville_depart" required>
          </div>
          <div class="elem-group inlined">
            <label for="checkin-date">Date de départ</label>
            <input type="date" id="Date_de_depart" name="Date_de_departt" required>
          </div>
          <div class="elem-group inlined">
            <label for="checkout-date">Date de Retour</label>
            <input type="date" id="Date_de_Retour" name="Date_de_Retour" required>
          </div><br><br>
          <div class="elem-group inlined">
            <label for="heure_depart">Heure de départ :</label>
            <input type="time" id="heure_depart" name="heure_depart" required>
          </div>
          <div class="elem-group inlined">
            <label for="classe">Classe :</label>
            <select id="classe" name="classe">
              <option value="economique">Économique</option>
              <option value="affaires">Affaires</option>
              <option value="premiere">Première classe</option>
            </select>
          </div>
          <div class="elem-group hotel-reservation">
            <label>Réserver un hôtel :</label>
            <div class="radio-group">
              <input type="radio" id="hotel_oui" name="reserver_hotel" value="oui">
              <label for="hotel_oui">Oui</label>

              <input type="radio" id="hotel_non" name="reserver_hotel" value="non">
              <label for="hotel_non">Non</label>
            </div>
          </div>
          <button type="submit" name="Réserve" value="Réserve" id="reserveBtn" style="display:none;">Réservez</button>
          <script>
            function afficherReserve() {
              document.getElementById('reserveBtn').style.display = 'none';
              document.getElementById('hotelbtn').style.display = 'block';
            }

            function nonafficherReserve() {
              document.getElementById('reserveBtn').style.display = 'inline-block';
              document.getElementById('hotelbtn').style.display = 'none';
              nonafficherhotel();
            }

            document.addEventListener('DOMContentLoaded', function () {
              var ouiRadio = document.getElementById('hotel_oui');
              var nonRadio = document.getElementById('hotel_non');

              ouiRadio.addEventListener('click', afficherReserve);
              nonRadio.addEventListener('click', nonafficherReserve);
            });
          </script>
          <button name="Réserve" value="Réserve" id="hotelbtn" style="display:none;" onclick="afficherhotel()">Réservez
            votre
            hotel</button>


      </section>
      <section>
        <section>
          <div id="hotels" style="display: none;">
            <div class="container">
              <div class="row">
                <?php
                $connection = new mysqli("localhost", "root", "", "AG");
                $query = "SELECT * FROM `hotels` limit 4";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    $nom = $row["nom"];
                    $description = $row["description"];
                    $image = $row["image"];
                    $prix_adulte = $row["prix_adulte"];
                    $prix_enfants = $row["prix_enfants"];
                    $etoiles = $row["etoiles"];
                    $id = $row["id"];
                    ?>
                    <div class="col travel-section">
                      <div class="imgContainer">
                        <img src="./images/<?= $image ?>" alt="image" />
                      </div>
                      <div class="footer2">
                        <!-- Add an onclick attribute to the button to trigger the scrolling and show the form -->
                        <a href="javascript:void(0);" onclick="scrollToTravelSection('hotel <?= $nom ?>');"><button
                            class="travel-button">Réserve</button></a>
                      </div>
                    </div>
                    <?php
                  }
                }
                ?>
              </div>
            </div>

          </div>
          <br><br>
        </section><br><br>
        <!-- Your hidden hotel booking form goes here with a unique id -->
        <div id="bookingFormContainer" style="display: none;">
          <h1 class="Hotel-name"></h1>
          <h2>réservation d'hôtel</h2>
          <!-- <form id="bookingForm" action="hotel_reservations.php" method="post">-->

          <div class="elem-group inlined">
            <label for="checkin-date">Check in</label>
            <input type="date" id="checkin-date" name="checkin">
          </div>
          <div class="elem-group inlined">
            <label for="checkout-date">Check out</label>
            <input type="date" id="checkout-date" name="checkout">
          </div><br><br>
          <div class="elem-group inlined">
            <label for="adult">Adults</label>
            <input type="number" id="adult" name="total_adults" min="1">
          </div>
          <div class="elem-group inlined">
            <label for="child">Enfants</label>
            <input type="number" id="child" name="total_children" min="0">
          </div>
          <div class="elem-group inlined">
            <label for="Nombre_de_nuits">Nombre de nuits</label>
            <input type="number" id="Nombre_de_nuits" name="Nombre_de_nuits" min="1">
          </div>
          <div class="elem-group">
            <label for="categorie-de-chambre">Categorie de chambre</label>
            <select id="Categorie_de_chambre" name="Categorie_de_chambre">
              <option value="connecting">Chambre simple</option>
              <option value="connecting">Chambre Double Deluxe</option>
              <option value="adjoining">Chambre Double Economique</option>
              <option value="adjacent">Chambre Double Classique</option>
              <option value="adjacent">Chambre Double Confort</option>
              <option value="adjacent">Chambre Triple Economique</option>
            </select>
          </div>
          <hr>
          <button type="submit" name="submitButton" value="book">Réservez</button>

        </div>
  </form>

  <!-- JavaScript to handle the scrolling and show the form -->
  <script>
    function scrollToTravelSection(inputText) {

      // Get the booking form container by its id
      var bookingFormContainer = document.getElementById('bookingFormContainer');

      // Scroll to the parent container


      // Remove any old h1 elements with the class "Hotel-name"
      var oldHeading = bookingFormContainer.querySelector('.Hotel-name');
      if (oldHeading) {
        oldHeading.remove();
      }

      // Create a new h1 element with the class "Hotel-name" and the input text
      var newHeading = document.createElement('h1');
      newHeading.className = 'Hotel-name';
      newHeading.textContent = inputText;

      // Add the new h1 element as the first child of the booking form container
      if (bookingFormContainer) {
        bookingFormContainer.style.display = 'block';
        bookingFormContainer.insertBefore(newHeading, bookingFormContainer.firstChild);
      }
      if (bookingFormContainer) {
        bookingFormContainer.scrollIntoView({ behavior: 'smooth' });
      }
    }
    function afficherhotel() {
      var Hotels = document.getElementById('hotels');
      var bookingFormContainer = document.getElementById('bookingFormContainer');
      if (Hotels) {
        Hotels.style.display = 'block';
      }
      var requiredFields = ['first-name', 'last-name', 'checkin-date', 'checkout-date', 'adult', 'Nombre de nuit(s)', 'categorie-de-chambre'];

      requiredFields.forEach(function (fieldId) {
        var inputField = document.getElementById(fieldId);
        if (inputField) {
          inputField.setAttribute('required', 'required');
        }
      });

    }
    function nonafficherhotel() {

      var Hotels = document.getElementById('hotels');
      var bookingFormContainer = document.getElementById('bookingFormContainer');
      if (Hotels) {
        Hotels.style.display = 'none';
        bookingFormContainer.style.display = 'none';
      }
      var fieldsToRemoveRequired = ['first-name', 'last-name', 'checkin-date', 'checkout-date', 'adult', 'child', 'Nombre de nuit(s)', 'categorie-de-chambre'];

      fieldsToRemoveRequired.forEach(function (fieldId) {
        var inputField = document.getElementById(fieldId);
        if (inputField) {
          inputField.removeAttribute('required');
        }
      });

    }
  </script>


  </section>
  </div>
  <footer>
    <p>Hamana-Travel Copyright 2023 </p>
  </footer>
</body>

</html>