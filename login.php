<?php 

include('init.php');


if(isset($_SESSION['membre'])) {
    header('location:home.php');
}


if($_POST) {
        
    $r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
    
    if($r->rowCount() >=1) {
            $membre = $r->fetch(PDO::FETCH_ASSOC);
                
                if(password_verify($_POST['mdp'], $membre['mdp'])){

                    $content .='<p> MDP : OK</p>';
                    
                    $_SESSION['membre']['pseudo']= $membre['pseudo'];
                    $_SESSION['membre']['id_membre']= $membre['id_membre'];
                    $_SESSION['membre']['ranked']= $membre['ranked'];
                    $_SESSION['membre']['droite']= $membre['droite'];
                    $_SESSION['membre']['gauche']= $membre['gauche'];
                    $_SESSION['membre']['sauter']= $membre['sauter'];
                    $_SESSION['membre']['action']= $membre['action'];
                    $_SESSION['membre']['worldFinish']= $membre['worldFinish'];

                    header('location:home.php');
                    
                }else {
                    $content .= '<p>Mot de passe incorrect.</p>';
                }

            } else {
                $content.='<p>Compte inexistant</p>';
        }
        
}
 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style-login-home.css">
</head>

<body class="body">

<header class="header">
        <img src="image/bob1.png" alt="Bob" class="logo">
        <h1 class="title-header">LAST CALL</h1>
    </header>

    <section class="home-connexion">
        <h2 class="title-form">Connexion        
            <?php 
                // echo $membre['pseudo'];
                echo $content;
            ?>
        </h2>
        <form method="post" class="form">
            <input type="text" name="pseudo" id="pseudo" class="input" placeholder="Pseudo..." required>
            <input type="text" name="mdp" id="mdp" class="input" placeholder="Mot de passe..." required>
            <input type="submit" value="Se connecter" class="input connexion">
        </form>
        <button class="btn-inscription"><a href="register.php">S'inscrire</a></button>
    </section>

</body>

</html>

