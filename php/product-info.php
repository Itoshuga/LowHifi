<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/style.css">
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
                
                <?php

                    $NumProd = $_GET['numprod'];
                    $Req = $db->prepare('SELECT * FROM produit inner join categorie on produit.NumCat = categorie.NumCat WHERE NumProd = "' .$NumProd. '"' );
                    $Req->execute(array($NumProd));
                    $data = $Req->fetch();

                    echo '<div class="row">';
                        echo '<div class="col-2">';
                            echo '<h2>Information sur <em>' .$data['LibCat']. ' ' .$data['NomProd']. '</em></h2><br/>';
                            echo '<p><b>Numéro du Produit :</b> ' .$data['NumProd']. '<br/><b>Nom du Produit :</b> ' .$data['NomProd']. '<br/><b>Prix :</b> ' .$data['PrixProd']. '.00 €<br/><b>Quantité :</b> ' .$data['QteProd']. '<br/><b>Caractéristique :</b> ' .$data['Caracteristiques']. '<br/><b>Couleur :</b> ' .$data['Couleur']. '<br/><b>Dimensions :</b> ' .$data['Longueur']. 'cm × ' .$data['Largeur']. 'cm × ' .$data['Profondeur']. 'cm<br/><b>Poids :</b> ' .$data['Poids']. 'kg</p>';
                            
                            if($data['QteProd'] == 0) {
                                echo '<br/>';
                                echo '<p>⚠️ <b><i>Le Produit est en momentanément indisponible suite à un trop grand nombre de commande.</i></b></p>';
                            } else {
                                echo '<a href="cart.php?action=ajout&amp;l=' .$data['NomProd']. '&amp;q=1&amp;p=' .$data['PrixProd'].'; " class="btn">Ajouter au Panier</a>';
                            }
                        
                            echo '</div>';
                        echo '<div class="col-2">';
                            echo '<img src="../src/img/Produit/'.$data['ImgSrc'].'" alt="'.$data['NomProd'].'" width="100%"/>';
                        echo '</div>';
                    echo '</div>';
                
                ?>

                <br /><br />
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