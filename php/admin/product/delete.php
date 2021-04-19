<?php
    require '../database.php';
 
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
    $db = Database::connect();
    $req = $db->query("SELECT * FROM produit WHERE NumProd = ?");

    if(!empty($_POST)) {
        $errors = array();
        $id = checkInput($_POST['id']);
        $statement = $db->prepare("DELETE FROM produit WHERE NumProd = ?");
        $statement->execute(array($id));
        header("Location: ../index.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../css/admin.css">
        <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="shortcut icon" href="../src/img/cart.svg" />
        <title>LowHifi - Accueil</title>
    </head>
    <body>
        <div class="header">
            <div class="container admin">
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

                <div class="admin-area">
                    <div class="suppression">
                        <?php 
                            if(!empty($_GET['numProd'])) 
                            {
                                $numProd = checkInput($_GET['numProd']);
                            }
                            $req = $db->query("SELECT * FROM produit where NumProd = $numProd");
                            while($donnees = $req->fetch()){
                                echo '<div class="card" style="width: 18rem; display: inline-block; margin: 15px;">';
                                echo '<div class="card-body">';
                                    echo '<h5 class="card-title">Suppression d\'un Compte</h5>';
                                    echo '<h6 class="card-subtitle mb-2 text-muted">' .$donnees['NomProd']. '</h6>';
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    
                    <form class="form" action="delete.php" role="form" method="post">
                        <input type="hidden" name="numProd" value="<?php echo $numProd;?>"/>
                        <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                        <div class="form-actions" style="text-align: center;">
                            <button type="submit" class="btn btn-warning">Oui</button>
                            <a class="btn btn-default" href="../index.php">Non</a>
                        </div>
                    </form>
                </div>

            </div>

            <!--     ××××× Header [End] Zone ×××××    -->

    </body>
</html>

