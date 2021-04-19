<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="src/img/cart.svg" />
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
                            <li><a href="php/product.php">Produits</a></li>
                            <li><a href="php/contact.php">Contact</a></li>
                            <?php 
                                //Connexion/Inscription 
                                include 'php/database.php';//Inclusion de la bdd
                                global $db;
            
                                if(isset($_SESSION['MailCli']) and $_SESSION['MdpCli']) //Si la Session pseudo et mdp n'est pas nul alors CONNEXION
                                {               
                                    echo'<li><a href="profile.php">Profil</a></li>';

                                    if (isset($_SESSION['MailCli']) and $_SESSION['MdpCli'] and $_SESSION['RoleCli'] == 1) {
                                        echo'<li><a href="php/admin/index.php">Dashboard</a></li>';
                                    }

                                    echo'<li><a href="php/disconnect.php">Deconnexion</a></li>';
                                }
                                else {
                                    echo'<li><a href="php/account.php">Compte</a></li>';
                                }
                            ?>
                        </ul>
                    </nav>
                    <a href="php/cart.php"><img src="src/img/cart.png" alt="Panier" width="30px" height="30px"/></a>
                </div>
                <div class="row">
                    <div class="col-2">
                        <h1>Donnez un Nouveau Style à votre Materiel!</h1>
                        <p>Le prix n'est pas toujours une question de grandeur. C'est une question de cohérence. LowHifi vous propose les meilleurs prix du marché pour une qualité plus qu'optimal.</p>
                        <a href="php/product.php" class="btn">Explorer &#8594</a>
                    </div>
                    <div class="col-2">
                        <img src="src/img/index.png" alt="Television"/>
                    </div>
                </div>
                <br /><br />
            </div>
        </div>
        <div class="categories">
            <div class="small-container">
                <h2 class="title">Catégories</h2>
                <div class="row">
                    <?php
                    
                    $req = $db->query('SELECT NumCat, ImgCat, LibCat FROM categorie');
                    while($donnees = $req->fetch()) {
                        echo '<div class="col-3">';
                        echo '<a href="php/product.php#'.$donnees['NumCat'].'"><p class="text-visibility">';
                        echo '<img class="image-cat" src="src/img/Categorie/'.$donnees['ImgCat'].'" title="'.$donnees['LibCat'].'"/>';
                        echo '<span>'.$donnees['LibCat'].'</span>';
                        echo '</p></a>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="small-container">
            <h2 class="title">Produit Recommandé</h2>
            <div class="row">
               
                <?php
                
                $req = $db->query('SELECT NomProd, PrixProd, ImgSrc FROM produit ORDER BY RAND() LIMIT 4');
                while($donnees = $req->fetch()) {
                    echo '<div class="col-4">';
                    echo '<img style="width: 14em;" src="src/img/Produit/'.$donnees['ImgSrc'].'" alt="'.$donnees['NomProd'].'"/>';
                    echo '<h4>'.$donnees['NomProd'].'</h4>';
                    echo '<p>'.$donnees['PrixProd'].' €</p>';
                    echo '</div>';
                }
                ?>

            </div>
        </div>
        <hr style="width: 33%; margin-left: 33%; margin-top: 3%;">
        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <img src="src/img/logo/samsung-logo.png" alt="Hifi PHILIPS"/>
                    </div>
                    <div class="col-5">
                        <img src="src/img/logo/sony-logo.png" alt="Hifi PHILIPS"/>
                    </div>
                    <div class="col-5">
                        <img src="src/img/logo/brandt-logo.png" alt="Hifi PHILIPS"/>
                    </div>
                    <div class="col-5">
                        <img src="src/img/logo/LG-logo.png" alt="Hifi PHILIPS"/>
                    </div>
                    <div class="col-5">
                        <img src="src/img/logo/philips-logo.png" alt="Hifi PHILIPS"/>
                    </div>
                </div>
            </div>
        </div>
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