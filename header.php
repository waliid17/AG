<link rel="stylesheet" href="style.css">
<header>
    <!-- menu responsive -->

    <div class="logo">
        <img src="images/hamana (3).png" alt="">
        <p><span>Trusted</span>-Travel</p>
    </div>
    <ul class="menu">
        <li><a href="#Accueil">Accueil</a></li>
        <li><a href="#Reservation d'hotel">Reservation d'hotel</a></li>
        <li><a href="#services">Nos Destinations</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="user">
        <?php
        session_start();
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $connection = new mysqli("localhost", "root", "", "AG");
            $query = "SELECT `first-name` FROM `utilisateur` WHERE id=$id";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $firstname = $row["first-name"];
            }
            echo " <a href='user.php'><button class='login_btn'> HI-$firstname</button></a>";
            echo '<a href="logout.php"><div class="logout"><img src="images/logout.png" alt=""></div></a>';
        } else {
            echo ' <a href="index2.html"><button class="login_btn"> LOGIN</button></a>
                <a href="index3.html"><button class="signup_btn"> SIGN UP</button></a>';
        }
        session_abort();
        ?>
    </div>
</header>