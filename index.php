<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamana-Travel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <!-- header  -->
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
            ?>
        </div>
    </header>
    <section>
        <div class="home">
            <h1>welcome to</h1><br><br>
            <img src="images/hamana (9).png" alt="">
            <div>
                <p>Explorez le monde </p>
                <h3>Voyagez au-delà des frontières, découvrez l'inexploré.</h3>
            </div>
        </div>
    </section><br><br>
    <section id="services">
        <h1 class="section_title">Nos Destinations</h1><br><br>
        <section>
            <div class="container">
                <div class="row">
                    <!-- 1st product -->
                    <div class="col">
                        <div class="imgContainer">
                            <img src="./images/paris.png" alt="image" />
                        </div>
                        <div class="title">
                            <h2>Paris</h2>
                            <p>$120.00</p>
                        </div>
                        <div class="para">
                            <p>
                                EXPLOREZ LE MONDE VOYAGEZ AU-DELÀ DES FRONTIÈRES, DÉCOUVREZ L'INEXPLORÉ.
                            </p>
                        </div>
                        <div class="footer2">

                            <a href="paris.html"><button>Travel now</button></a>

                        </div>
                    </div>

                    <!-- 2nd product -->
                    <div class="col">
                        <div class="imgContainer">
                            <img src="./images/bali.png" alt="image" />
                        </div>
                        <div class="title">
                            <h2>Bali</h2>
                            <p>$20.00</p>
                        </div>
                        <div class="para">
                            <p>
                                EXPLOREZ LE MONDE VOYAGEZ AU-DELÀ DES FRONTIÈRES, DÉCOUVREZ L'INEXPLORÉ.
                            </p>
                        </div>
                        <div class="footer2">
                            <div class="button-container">
                                <button>Travel now</button>
                            </div>
                        </div>
                    </div>

                    <!-- 3rd product -->
                    <div class="col">
                        <div class="imgContainer">
                            <img src="./images/england.png" alt="image" />
                        </div>
                        <div class="title">
                            <h2>England</h2>
                            <p>$19.23</p>
                        </div>
                        <div class="para">
                            <p>
                                EXPLOREZ LE MONDE VOYAGEZ AU-DELÀ DES FRONTIÈRES, DÉCOUVREZ L'INEXPLORÉ.
                            </p>
                        </div>
                        <div class="footer2">
                            <div class="button-container">
                                <button>Travel now</button>
                            </div>
                        </div>
                    </div>

                    <!-- 4th product -->
                    <div class="col">
                        <div class="imgContainer">
                            <img src="images/dubai.png">
                        </div>
                        <div class="title">
                            <h2>Dubai</h2>
                            <p>$28.78</p>
                        </div>
                        <div class="para">
                            <p>
                                EXPLOREZ LE MONDE VOYAGEZ AU-DELÀ DES FRONTIÈRES, DÉCOUVREZ L'INEXPLORÉ.
                            </p>
                        </div>
                        <div class="footer2">
                            <div class="button-container">
                                <button>Travel now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section><br><br>

    <section id="contact">

        <h1 class="section_title">About us</h1>
        <div class="about">
            <div class="about-text">
                <h1>Explorez tous les tours du monde avec nous.</h1>
            </div>
            <img src="images/about-banner.png" width="756" height="842" loading="lazy" alt="" class="w-100">
        </div>
    </section><br><br>

    <!-- section contact -->

    <section id="contact">
        <h1 class="section_title">Notre Adresse</h1>
        <div class="localisation_contact_div">
            <div id="lo" class="localisation">
                <h3>Notre Adresse</h3><br><br>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4522.291985245553!2d2.9517072100229504!3d36.72872514577083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fafea13b4d45b%3A0xac8934488ed4ad85!2sr%C3%A9sidence%20universitaire%203%20Ouled%20Fayet!5e0!3m2!1sfr!2sdz!4v1699637508648!5m2!1sfr!2sdz"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>" width="600" height="450" style="border:0;"
                allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="form_contact">
                <h3>Envoyer un message</h3>
                <form action="#">
                    <input type="text" placeholder="Nom">
                    <input type="email" placeholder="Adresse Mail">
                    <input type="text" placeholder="Objet">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </section><br><br>
    <a href="#" class="scroll-to-top-button">↑</a>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our services</a></li>
                        <li><a href="#">privacy policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>get help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer>
        <p>Hamana-Travel Copyright 2023 </p>
    </footer>


</body>

<script>
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        var body = document.body;
        var scrollTopButton = document.querySelector('.scroll-to-top-button');
        const header = document.querySelector('header');
        if (document.body.scrollTop > 800 || document.documentElement.scrollTop > 800) {
            body.classList.add('scrolled');
            header.classList.add('scrolled');
        } else {
            body.classList.remove('scrolled');
            header.classList.remove('scrolled');
        }

    }
</script>
<script>
    document.getElementById('button-pitcho').addEventListener('click', function () {
        var targetDiv = document.getElementById('pitcho');
        targetDiv.classList.toggle('Showpitcho');
    });

    document.getElementById('x-button').addEventListener('click', function () {
        var targetDiv = document.getElementById('pitcho');
        targetDiv.classList.toggle('Showpitcho');
    });
</script>

</html>