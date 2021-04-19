<?php
session_start();
include_once("cart-function.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}

echo '<?xml version="1.0" encoding="utf-8"?>';

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
            </div>

            <!--     ××××× Header [End] Zone ×××××    -->

            <div class="small-container cart-page">
                <div class="container-top">
                    <form method="post">
                        <table>
                            <tr>
                                <td>Produit :</td>
                                <td>Quantité :</td>
                                <td>Prix Unitaire :</td>
                                <td>Action :</td>
                            </tr>
                            <?php
                                if (creationPanier())
                                {
                                $nbArticles=count($_SESSION['panier']['libelleProduit']);
                                if ($nbArticles <= 0)
                                echo "<tr><td>Votre panier est vide </td></tr>";
                                else
                                {
                                    for ($i=0 ;$i < $nbArticles ; $i++)
                                    {
                                        echo "<tr>";
                                        echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                                        echo "<td><input class=\"qte\" type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                                        echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])." €</td>";
                                        echo "<td><a href=\"".htmlspecialchars("cart.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Retirer</a></td>";
                                        echo "</tr>";
                                    }

                                    echo "<tr><td colspan=\"2\"> </td>";
                                    echo "<td colspan=\"2\">";
                                    echo "Total : ".MontantGlobal(). " €";
                                    echo "</td></tr>";

                                    echo "<tr><td colspan=\"4\">";
                                    echo "<input class=\"refresh\" type=\"submit\" value=\"Rafraichir\"/>";
                                    echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
                                    echo '<div class="button-container">';
                                        echo '<a href="product.php">Continuer mes Achats</a>';
                                        echo '<input class="button-commande" type="submit" id="Commander" name="Commander" value="Commander"/>';
                                    echo '</div>';
                                    echo "</td></tr>";
                                    }
                                }
                            ?>
                        </table>
                    </form>
                    <?php
                        date_default_timezone_set('Europe/Paris');
                        $date = date('Y-m-d');
                        $a = $_SESSION['NumCli'];

                        if(isset($_POST['Commander']))
                        {
                            extract($_POST);
                            global $db;
                            $q = $db->prepare("INSERT INTO commande(NumCli, DateCom) VALUES('$a', '$date')"); //Ajoute une commande en fonction du client
                            $q->execute([
                                'NumCli' => $a,
                                'DateCom' => $date
                            ]);
                            
                            
                            $Com = $db->query('SELECT MAX(NumCom) AS Com FROM commande'); // Récupère la dernière commande
                            while($donnees = $Com->fetch())
                            {
                                $NumCom = $donnees['Com'];
                                for ($f=0; $f < compterArticles(); $f++) //Boucle permettant de compter le nombre d'articles
                                {
                                    $numprod = $db->query('SELECT NumProd, QteProd, NomProd FROM produit WHERE NomProd = "'.libProd()[$f].'"');//Récupère le NumProd en fonction du libelléProd
                                    while($donnees = $numprod->fetch())
                                    {
                                        if($donnees['QteProd'] >= qteProd()[$f] && $donnees['QteProd'] >= 0)
                                        {
                                            $numprod2 = $donnees['NumProd'];
                                            $q = $db->prepare("INSERT INTO composer(NumCom,NumProd,QteCom) VALUES('$NumCom','$numprod2','".qteProd()[$f]."')");//Ajoute les données d'une commande dans la table Composer
                                            $q->execute([
                                                'NumCom' => $NumCom,
                                                'NumProd' => $numprod2,
                                                'QteCom' => qteProd()[$f]
                                            ]); 
                                            $Approvisionnement = $db->prepare('UPDATE produit SET QteProd = QteProd - "'.qteProd()[$f].'" WHERE NumProd = "'.$numprod2.'"');
                                            $Approvisionnement->execute([]);

                                            header('Location:validation.php?id='.$NumCom.'');
                                        }
                                        else
                                        {
                                        echo "Vous ne pouvez pas commander plus de ".$donnees['QteProd']." ".$donnees['NomProd']." ! <br>";
                                        }
                                    }
                                }
                            }
                        }                  
                    ?>
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