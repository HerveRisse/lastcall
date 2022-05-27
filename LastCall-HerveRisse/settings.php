<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link  rel="stylesheet" href="reset.css">
        <link  rel="stylesheet" href="style-setting.css">
        <title>controle</title>
    </head>
<?php
    include ("init.php");
    $pseudoMembreSetting = $_SESSION['membre']['pseudo'];
    $RCP = $pdo -> query("SELECT droite FROM membre WHERE pseudo = '$pseudoMembreSetting' ");
    $rightControlPlayer = $RCP->fetch(PDO::FETCH_ASSOC);

    $LCP = $pdo -> query("SELECT gauche FROM membre WHERE pseudo = '$pseudoMembreSetting' ");
    $leftControlPlayer = $LCP->fetch(PDO::FETCH_ASSOC);

    $JCP = $pdo -> query("SELECT sauter FROM membre WHERE pseudo = '$pseudoMembreSetting' ");
    $jumpControlPlayer = $JCP->fetch(PDO::FETCH_ASSOC);

    $ACP = $pdo -> query("SELECT action FROM membre WHERE pseudo = '$pseudoMembreSetting' ");
    $actionControlPlayer = $ACP->fetch(PDO::FETCH_ASSOC);

    if (isset($_SESSION['membre']['pseudo'])) {
        # code...
    
?>
    <body>
        <main>
                <h2 class="title-header">Controle</h2>
                <form method="get">

                    <input type="text" name="droite" placeholder="Touche droite" required >
                    <input type="text" name="gauche" placeholder="Touche gauche" required >
                    <input type="text" name="sauter" placeholder="Touche sauter (si vous vouler assigné espace tapée : space) " required >
                    <input type="text" name="action" placeholder="Touche action" required >
                    <input type="submit" value = "appliquer">
                </form>
                <div class="actual">
                    <h3>touches actuelle</h3>
                    <ul>
                        <li>droite :<?php echo $rightControlPlayer['droite']?></li>
                        <li>gauche :<?php echo $leftControlPlayer['gauche']?><li>
                        <li>sauter :<?php echo $jumpControlPlayer['sauter']?></li>
                        <li>action :<?php echo $actionControlPlayer['action']?></li>
                    </ul>
                </div>
        </main>
    </body>
    <?php

$keyRight;
$keyLeft;
$keyUp;
$keyAction;
if($_GET){

    $keyRight = $_GET['droite'];
    $keyLeft = $_GET['gauche'];
    $keyUp = $_GET['sauter'];
    $keyAction = $_GET['action'];
       
    
    $pdo->exec("UPDATE membre SET droite='$keyRight', gauche='$keyLeft', sauter='$keyUp', action='$keyAction' WHERE pseudo = '$pseudoMembreSetting' ");
    header('Location: home.php');
}
}
else{
    header('Location: index.php');
}
?>

</html>
