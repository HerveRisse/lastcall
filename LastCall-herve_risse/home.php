<?php 
include('init.php');
include('disconnect.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style-login-home.css">
    <title>LAST CALL</title>
</head>
<body class="home-connecter">
    
    <header class="header">
        <img src="image/bob2.png" alt="Bob" class="logo">
        <h1 class="title-header-home">LAST CALL</h1>
        <h2><?php echo "for you : " . $_SESSION['membre']['pseudo'];?></h2>
    </header>
    <section class="home-menu">
        <button class="btn-menu-home"><a href="arcade.php">New Game</a></button>
        <button class="btn-menu-home"><a href="leaderboard.php">Score</a></button>
        <button class="btn-menu-home"><a href="settings.php">Options</a></button>
    </section>
    
</body>
</html>