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
            </div>

            <!--     ××××× Header [End] Zone ×××××    -->


            <div class="dashboard">
                <div class="dash-container">
                    <div class="title remove">
                        <h1 style="margin-top: 15vh; transform: translateY(15%);">Panel d'Administration d'InfoTools</h1>
                        <p>Centre de Gestion des Clients, Produits, Commandes..</p>
                    </div>

                    <div class="block">
                        <div class="row">
                            <div class="col-3">
                                <div class="card" style="width: 400px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Clients</h5>
                                        <h6 class="card-subtitle">Ajout / Modification / Suppression</h6>
                                        <div class="card-text">Accès au panneau de gestion des diffèrents client inscrit sur le site.</div>
                                        <br/>
                                        <a href="./client.php" class="card-link">Accéder à la Page</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card" style="width: 400px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Produits</h5>
                                        <h6 class="card-subtitle">Ajout / Modification / Suppression</h6>
                                        <div class="card-text">Accès au panneau de gestion des diffèrents produits présent dans la base de données.</div>
                                        <br/>
                                        <a href="produit.php" class="card-link">Accéder à la Page</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card" style="width: 400px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Commandes</h5>
                                        <h6 class="card-subtitle">Ajout / Modification / Suppression</h6>
                                        <div class="card-text">Accès au panneau de gestion des diffèrentes commandes effectué par les clients.</div>
                                        <br/>
                                        <a href="command.php" class="card-link">Accéder à la Page</a>
                                    </div>
                                </div>
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
    </body>
</html>