<!DOCTYPE html>
<?php 
session_start();
?>
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
                            <li><a href="../">Accueil</a></li>
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
                <div class="row">
                    <div class="col-2">
                        <h1>Voici Tout nos Produits à Votre Disposition!</h1>
                        <p>LowHifi dispose d'un grand nombre de produit, chacun se trouvant dans différente catégories qui ont été préalablement filtré pour vous! Il est donc désormais beaucoup plus simple de réaliser ses achats sur notre site.</p>
                        <a href="#lcd" class="btn">&darr; Voir &darr;</a>
                    </div>
                    <div class="col-2">
                        <img src="../src/img/product.png" alt="Television"/>
                    </div>
                </div>
                <br /><br />
            </div>
        </div>

        <section class="filter-container">
            <ul>
                <li class="list active" data-filter="All">Tous</li>
                <li class="list" data-filter="TeleviseurLCD">Téléviseur LCD</li>
                <li class="list" data-filter="TeleviseurPlasma">Téléviseur Plasma</li>
                <li class="list" data-filter="HifiMini">Hifi Mini</li>
                <li class="list" data-filter="HifiCompose">Hifi Composée</li>
                <li class="list" data-filter="Amplificateur">Amplificateur</li>
                <li class="list" data-filter="LecteurDVD">Lecteur DVD</li>
            </ul>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        
        <div class="itemBox TeleviseurLCD">
            <div class="categories" id="TV0">
                <div class="small-container">
                    <h2 class="title">Téléviseur LCD</h2>
                    <div class="row">

                        <?php
                        
                        $req = $db->query('SELECT * FROM produit where produit.NumCat = "TV0" ');
                        
                        while($donnees = $req->fetch()) {
                            
                            echo '<div class="col-4">';
                            echo '<a href=./product-info.php?numprod='. $donnees['NumProd']. '>';
                            echo '<img src="../src/img/Produit/'.$donnees['ImgSrc'].'"/>';
                            echo '<h4>'.$donnees['NomProd'].'</h4>';
                            echo '</a>';
                            echo '</div>';

                        }
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="itemBox TeleviseurPlasma">       
            <div class="categories" id="TV1">
                <div class="small-container">
                    <h2 class="title">Téléviseur Plasma</h2>
                    <div class="row">
                    
                        <?php
                        
                        $req = $db->query('SELECT * FROM produit where produit.NumCat = "TV1" ');
                        
                        while($donnees = $req->fetch()) {
                            
                            echo '<div class="col-4" >';
                            echo '<a href=./product-info.php?numprod='. $donnees['NumProd']. '>';
                            echo '<img src="../src/img/Produit/'.$donnees['ImgSrc'].'"/>';
                            echo '<h4>'.$donnees['NomProd'].'</h4>';
                            echo '</a>';
                            echo '</div>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="itemBox HifiMini">
            <div class="categories" id="CH0">
                <div class="small-container">
                    <h2 class="title">Chaîne Hifi - Mini</h2>
                    <div class="row">
                    
                        <?php
                        
                        $req = $db->query('SELECT * FROM produit where produit.NumCat = "CH0"');
                        
                        while($donnees = $req->fetch()) {

                            echo '<div class="col-4">';
                            echo '<a href=./product-info.php?numprod='. $donnees['NumProd']. '>';
                            echo '<img  src="../src/img/Produit/'.$donnees['ImgSrc'].'"/>';
                            echo '<h4>'.$donnees['NomProd'].'</h4>';
                            echo '</a>';
                            echo '</div>';

                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="itemBox HifiCompose">
            <div class="categories" id="CH1">
                <div class="small-container">
                    <h2 class="title">Chaîne Hifi - Composée</h2>
                    <div class="row">
                    
                        <?php
                        
                        $req = $db->query('SELECT * FROM produit where produit.NumCat = "CH1"');
                        
                        while($donnees = $req->fetch()) {
                            
                            echo '<div class="col-4">';
                            echo '<a href=./product-info.php?numprod='. $donnees['NumProd']. '>';
                            echo '<img src="../src/img/Produit/'.$donnees['ImgSrc'].'"/>';
                            echo '<h4>'.$donnees['NomProd'].'</h4>';
                            echo '</a>';
                            echo '</div>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="itemBox Amplificateur">
            <div class="categories" id="AMP0">
                <div class="small-container">
                    <h2 class="title">Ampli Home Cinéma</h2>
                    <div class="row">
                    
                        <?php
                        
                        $req = $db->query('SELECT * FROM produit where produit.NumCat = "AMP0"');
                        
                        while($donnees = $req->fetch()) {
                            
                            echo '<div class="col-4">';
                            echo '<a href=./product-info.php?numprod='. $donnees['NumProd']. '>';
                            echo '<img src="../src/img/Produit/'.$donnees['ImgSrc'].'"/>';
                            echo '<h4>'.$donnees['NomProd'].'</h4>';
                            echo '</a>';
                            echo '</div>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="itemBox LecteurDVD">
            <div class="categories" id="DVD0">
                <div class="small-container">
                    <h2 class="title">Lecteur DVD</h2>
                    <div class="row">
                    
                        <?php
                        
                        $req = $db->query('SELECT * FROM produit where produit.NumCat = "DVD0"');
                        
                        while($donnees = $req->fetch()) {
                            
                            echo '<div class="col-4">';
                            echo '<a href=./product-info.php?numprod='. $donnees['NumProd']. '>';
                            echo '<img src="../src/img/Produit/'.$donnees['ImgSrc'].'"/>';
                            echo '<h4>'.$donnees['NomProd'].'</h4>';
                            echo '</a>';
                            echo '</div>';
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('.list').click(function() {
                    const value = $(this).attr('data-filter');
                    if (value == 'All') {
                        $('.itemBox').show('1000');
                    } else {
                        $('.itemBox').not('.' +value).hide('1000');
                        $('.itemBox').filter('.' +value).show('1000');
                    }
                })
                $('.list').click(function(){
                    $(this).addClass('active').siblings().removeClass('active')
                })
            })
        </script>
       
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
    </body>
</html>