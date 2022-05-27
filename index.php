<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style-index.css">
  <title>Last Call the game</title>
</head>
<body>

<?php
    include('init.php');
    if(isset($_SESSION['membre'])) {
  ?>
    <section class="outGameStream">
      <div class="containerTransUp">
          <div class="imgTrsUp">
            <img src="image/bob1.png">
          </div> 
      </div>

      <div class="containerChoix">
        <a class="main-btn" href="?action=deconnexion">Déconnexion</a>
        <a class="main-btn" href="home.php">Revenir au jeu</a>
      </div>

      <div class="containerTransDown">
          <div class="imgTrsDown">
            <img src="image/bob2.png">
          </div> 
      </div>
    </section>
<?php
 }   else {
?>
  <section class = "onGameStream">
    <h1>Last Call <span>the game</span></h1>

    <div class="container-link" >
        <a class="main-btn" href="register.php">Inscription</a>
        <a class="main-btn" href="login.php">Connexion</a>
    </div>
    <div class="bobPose1"><img src="image/bob1.png" alt="bob fais la pose"></div>
    <div class="bobPose2"><img src="image/bob2.png" alt="bob fais la pose"></div>
  </section>
    
<?php
         }
?>


  </body>
</html>