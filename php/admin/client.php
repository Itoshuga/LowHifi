<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                            <li><a href="../../index.php">Accueil</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="admin-area" style="width:1280px; margin: auto;">

                    <div class="admin">

                    <?php
                    
                    include '../database.php';
                    global $db;

                    $req = $db->query('SELECT * FROM client');
                    while($donnees = $req->fetch()) {
                        echo '<div class="card" style="width: 18rem; display: inline-block; margin: 15px;">';
                            echo '<div class="card-body">';
                                echo '<h5 class="card-title">' .$donnees['NomCli']. ' ' .$donnees['PrenomCli']. '</h5>';
                                echo '<h6 class="card-subtitle mb-2 text-muted">Numéro du Client : ' .$donnees['NumCli']. '</h6>';
                                echo '<p class="card-text">Adresse : ' .$donnees['AdrCli']. ' <br/> Ville : ' .$donnees['CPCLi']. ' ' .$donnees['VilleCli']. '</p>';
                                echo '<p class="card-text">Mail : '.$donnees['MailCli'].'</p>';
                                echo '<a href="user/update.php?id=' .$donnees['NumCli'].'" class="card-link">Modifier</a>';
                                echo '<a href="user/delete.php?id=' .$donnees['NumCli'].'" class="card-link">Supprimer</a>';
                            echo '</div>';
                        echo '</div>';
                    }

                    ?>

                    </div>

                </div>


            </div>

            <!--     ××××× Header [End] Zone ×××××    -->

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
    </body>
</html>