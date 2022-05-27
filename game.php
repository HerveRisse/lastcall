<script type="text/javascript">
  var lvlOne = [];// Level design array
 
</script>

<?php

include('init.php');

// used protocol : http ou https ?
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') $url = "https://"; else $url = "http://";
  // host
  $url .= $_SERVER['HTTP_HOST'];
  // ressource location
  $url .= $_SERVER['REQUEST_URI'];
  // display current page URL
  
$urlContent= parse_url($url);
parse_str($urlContent['query'], $params);
$monde = $params['nbMonde'];


//custom keybord key

$pseudoMembre = $_SESSION['membre']['pseudo'];


$RCP = $pdo -> query("SELECT * FROM membre WHERE pseudo = '$pseudoMembre' ");
$controlPlayer = $RCP->fetch(PDO::FETCH_ASSOC);


//player progress

$PRG = $pdo -> query("SELECT worldFinish FROM membre WHERE pseudo = '$pseudoMembre' ");
$progress = $PRG->fetch(PDO::FETCH_ASSOC);
  ?>
<script type=text/javascript>
      console.log("<?php echo $progress['worldFinish']?>"); 
      var worldStage = <?php echo $monde?>
</script>



<script type="text/javascript">
    console.log(" touche droite : <?php echo $controlPlayer['droite']; ?>");
    console.log(" touche geuche : <?php echo $controlPlayer['gauche']; ?>");
    console.log(" touche sauter : <?php echo $controlPlayer['sauter']; ?>");
</script>
"

<?php

// recovery of selected world

switch ($monde) {

  // recovery of the world 1

  case '1':
      $a = $pdo -> query("SELECT content FROM tile WHERE idMonde = $monde AND idLevel = 1 ");
      while ($all_post = $a->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script type="text/javascript">
          lvlOne.push("<?php echo $all_post['content'];?>");
        </script>
        <?php
      }
      
    break;

      //recovery of the world 2

      case '2':
      $a = $pdo -> query("SELECT content FROM tile WHERE idMonde = $monde AND idLevel = 1 ");
      while ($all_post = $a->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script type="text/javascript">
          lvlOne.push("<?php echo $all_post['content'];?>");
        </script>
        <?php
      }
     
    break;

    //recovery of the world 3

    case '3':
      $a = $pdo -> query("SELECT content FROM tile WHERE idMonde = $monde AND idLevel = 1 ");
      while ($all_post = $a->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script type="text/javascript">
          lvlOne.push("<?php echo $all_post['content'];?>");
        </script>
        <?php
      }
      
    break;

      //recovery of the world 4

    case '4':
      $a = $pdo -> query("SELECT content FROM tile WHERE idMonde = $monde AND idLevel = 1 ");
      while ($all_post = $a->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script type="text/javascript">
          lvlOne.push("<?php echo $all_post['content'];?>");
        </script>
        <?php
      }
      
    break;

      //recovery of the world 5

    case '5':
      $a = $pdo -> query("SELECT content FROM tile WHERE idMonde = $monde AND idLevel = 1 ");
      while ($all_post = $a->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script type="text/javascript">
          lvlOne.push("<?php echo $all_post['content'];?>");
        </script>
        <?php
      }
      
    break;

    //recovery of the world 6

    case '6':
      $a = $pdo -> query("SELECT content FROM tile WHERE idMonde = $monde AND idLevel = 1 ");
      while ($all_post = $a->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script type="text/javascript">
          lvlOne.push("<?php echo $all_post['content'];?>");
        </script>
        <?php
      }
      
    break;

    //recovery of the world 7

    case '7':
      $a = $pdo -> query("SELECT content FROM tile WHERE idMonde = $monde AND idLevel = 1 ");
      while ($all_post = $a->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script type="text/javascript">
          lvlOne.push("<?php echo $all_post['content'];?>");
        </script>
        <?php
      }
      
    break;
    case '8':
  
      
    break;
  
  default:
    # code...
    break;
}
  ?>
  
   <script type="text/javascript">
        
     var maps =[
      lvlOne // only one Level for a world to the moment
     ] 
   </script>
    
  <?php

?>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>RingRingRun</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class=game-container>
     <div id="jump"></div>
    <script src="https://kaboomjs.com/lib/0.5.0/kaboom.js"></script>
    <script>
      //IMPORTANT: Make sure to use Kaboom version 0.5.0 for this game by adding the correct script tag in the HTML file.
      var actualMonde = <?php echo $monde; ?>

      let controlPlayer['gauche'] = "<?php echo $controlPlayer['gauche']; ?>"
      let controlPlayer['droite'] = "<?php echo $controlPlayer['droite']; ?>"
      let controlPlayer['saut'] = "<?php echo $controlPlayer['sauter']; ?>"
    </script>
    <script src="game.js"></script>
<div id = "menuInGame" class = "resume">
  <h3>resume</h3>
  <p>press P to play</p>
  <p>press ESC to Quit</p>
</div>
  </body>
</html>
