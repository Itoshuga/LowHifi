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
                            <li><a href="../index.php">Accueil</a></li>
                            <li><a href="product.php">Produits</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="account.php">Compte</a></li>
                        </ul>
                    </nav>
                    <a href="cart.php"><img src="../src/img/cart.png" alt="Panier" width="30px" height="30px"/></a>
                </div>
            </div>

            <!--     ××××× Header [End] Zone ×××××    -->

            <div class="account-page">
            <br/>
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="../src/img/index.png" alt="Television"/>
                        </div>
                        <div class="col-2">
                            <div class="form-container">
                                <div class="form-btn">
                                    <span onclick="login()">Connexion</span>
                                    <span onclick="register()">Inscription</span>
                                    <hr id="Indicateur">
                                </div>

                                <form id="LoginForm" method="POST">
                                    <input type="email" placeholder="e-Mail" name="LogMail"/>
                                    <input type="password" placeholder="Mot de Passe" name="LogPassword"/>
                                    <button type="submit" class="btn" id="FormLogin" name="connexion">Se Connecter</button>
                                    <a href="#">Mot de Passe Oublié</a>
                                </form>
                                <?php
                                    if(isset($_POST['connexion'])) {
                                        extract($_POST);

                                        include 'database.php';
                                        global $db;

                                        if(!empty($LogMail) && !empty($LogPassword)) {
                                            $q = $db->prepare("SELECT * FROM client WHERE MailCli = '$LogMail'");
                                            $q->execute(['MailCli' => $LogMail]);
                                            $result = $q->fetch();

                                            
                                            if($result == true) {                                
                                                //Le compte existe bien 
                                                $hashpassword = $result['MdpCli'];
                                            
                                                if(password_verify($LogPassword, $result['MdpCli'])) {
                                                    session_start();
                                                    $_SESSION['MailCli'] = $result['MailCli'];
                                                    $_SESSION['MdpCli'] = $result['MdpCli'];
                                                    $_SESSION['RoleCli'] = $result['RoleCli'];
                                                    $_SESSION['NumCli'] = $result['NumCli'];
                                                    
                                                    header('Location: ../index.php?id='.$_SESSION['NumCli']);
                                                    exit();
                                                } else {
                                                    echo '<div class="error">';
                                                    echo '<p>Mot de passe Incorrect.</p>';
                                                    echo '</div>';
                                                }
                                            } else {
                                                echo '<div class="error">';
                                                echo '<p>' .$LogMail. ' n\'existe pas.</p>';
                                                echo '</div>';
                                            }
                                        } else {
                                            echo '<div class="error">';
                                            echo '<p>Champs Incomplets</p>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>

                                <form id="RegForm" method="POST">
                                    <input type="text" placeholder="Nom" name="RegNom"/>
                                    <input type="text" placeholder="Prenom" name="RegPrenom"/>
                                    <input type="email" placeholder="e-Mail" name="RegMail"/>
                                    <input type="password" placeholder="Mot de Passe" name="RegPassword"/>
                                    <input type="password" placeholder="Confirmation Mot de Passe" name="RegPasswordType"/>
                                    <button type="submit" class="btn" id="FormRegister" name="inscription">S'Inscrire</button>
                                </form>
                                <?php
                                        if(isset($_POST['inscription'])){
                                            
                                            extract($_POST);
                                    
                                            if(!empty($RegPassword) && !empty($RegPasswordType) && !empty($RegMail)) {
                                                if($RegPassword == $RegPasswordType) {
                                                    $options = [
                                                        'cost' => 12,
                                                    ];
                                            
                                                    $hashpass = password_hash($RegPassword, PASSWORD_BCRYPT, $options);
                                            
                                                    include 'database.php';
                                                    global $db;
                                            
                                                    $c = $db->prepare("SELECT MailCli FROM client WHERE MailCli= '$RegMail'");
                                                    $c->execute(['MailCli' => $RegMail]);
                                                    $result = $c->rowCount();
                                            
                                                    if($result == 0) {
                                                        $q = $db->prepare("INSERT INTO client(NomCli, PrenomCli, MailCli, MdpCli) VALUES('$RegNom','$RegPrenom','$RegMail', '$hashpass')");
                                                        $q->execute([
                                                            'MailCli' => $RegMail,
                                                            'MdpCli' => $hashpass
                                                        ]);

                                                        echo '<div class="error">';
                                                        echo '<p>Compte Créé.</p>';
                                                        echo '</div>';

                                                    } else {
                                                        echo '<div class="error">';
                                                        echo '<p>Email déjà utilisé.</p>';
                                                        echo '</div>';
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
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