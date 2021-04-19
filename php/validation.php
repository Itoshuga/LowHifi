<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../src/img/cart.svg" />
        <title>LowHifi - Accueil</title>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo-container">
                        <h2 class="logo">LowHifi</h2>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="#">Accueil</a></li>
                            <li><a href="product.php">Produits</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <?php 
                                //Connexion/Inscription 
                                include 'database.php';//Inclusion de la bdd
                                global $db;
            
                                if(isset($_SESSION['MailCli']) and $_SESSION['MdpCli']) //Si la Session pseudo et mdp n'est pas nul alors CONNEXION
                                {               
                                    echo'<li><a href="profile.php">Profil</a></li>';

                                    if (isset($_SESSION['MailCli']) and $_SESSION['MdpCli'] and $_SESSION['RoleCli'] == 1) {
                                        echo'<li><a href="admin/index.php">Dashboard</a></li>';
                                    }

                                    echo'<li><a href="disconnect.php">Deconnexion</a></li>';
                                }
                                else {
                                    echo'<li><a href="account.php">Compte</a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                    <a href="cart.php"><img src="../src/img/cart.png" alt="Panier" width="30px" height="30px"/></a>
                </div>
            </div>

            <!--     ××××× Header [End] Zone ×××××    -->

            <div class="success-page">
            
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../src/img/invoice.png" alt="Image Facture"/>
                        </div>

                        <div class="col-2">
                            <h3 class="facture-title">Votre Facture est prête!</h3>
                            <p class="facture-paragraph">Madame, Monsieur<br/>Nous vous remercions de votre commande et esperons que le contenu vous apportera toute satisfaction.<br/>Si vous souhaitez une information sur cette commande, <br/>Nous vous invitons à cliquer ci-dessous pour obtenir toute les informations nécessaire. <br/>Nous vous remercions de votre confiance, à très bientôt.</p>
                            
                            <?php
                                $Com = $db->query('SELECT MAX(NumCom) AS Com FROM commande'); // Récupère la dernière commande
                                while($donnees = $Com->fetch())
                                {
                                    $NumCom = $donnees['Com'];
                                }
                            ?>

                            <a href="facture.php?id=<?php echo $NumCom; ?>" class="btn">Facture &#8594</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--     ××××× Footer       Zone ×××××    -->

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>Contact</h3>
                        <ul>
                            <li>+33 7 16 54 12 23</li>
                            <li>lowhifi@contact.fr</li>
                            <li>5 Rue de l'Audiovisuel</li>
                            <li>@LowHifi_</li>
                        </ul>
                    </div>
                    <div class="footer-col-2">
                        <h3>Lien Utile</h3>
                        <ul>
                            <li>Coupons</li>
                            <li>Blog Spot</li>
                            <li>Policy Return</li>
                            <li>S'affilier</li>
                        </ul>
                    </div>
                    <div class="footer-col-3">
                        <h3>Réseaux Sociaux</h3>
                        <ul>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Instagram</li>
                            <li>YouTube</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script>
        
            var LoginForm = document.getElementById("LoginForm");
            var RegForm = document.getElementById("RegForm");
            var Indicateur = document.getElementById("Indicateur")

                function register() {
                    RegForm.style.transform = "translateX(0px)";
                    LoginForm.style.transform = "translateX(0px)";
                    Indicateur.style.transform = "translateX(110px)"
                }

                function login() {
                    RegForm.style.transform = "translateX(300px)";
                    LoginForm.style.transform = "translateX(300px)";
                    Indicateur.style.transform = "translateX(5px)"
                }

        </script>

    </body>
</html>