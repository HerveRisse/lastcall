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
    <link rel="stylesheet" href="style-arcade.css">
    <link rel="stylesheet" href="style.css">
    <title>LAST CALL</title>
</head>

<body class="home-connecter">

<header class="header">
        <img src="image/bob2.png" alt="Bob" class="logo">
        <h1 class="title-header-home">LAST CALL</h1>
        <a class="backHome" href="home.php">Quitter</a>
    </header>

    <section>

        <ul class="list-monde">

            <li>
                <h3 class="nb-monde">Monde 1 :</h3>
                <h4 class="title-monde">Le sac</h4>
                <div><a href="game.php?nbMonde=1"><img src="image/arcade/monde1.png" alt="sac a main"></a></div>
                <p class="description-monde">Echappez-vous du sac le plus vite possible</p>
            </li>

            <li id="md2">
                <h3 class="nb-monde">Monde 2 :</h3>
                <h4 class="title-monde">La chambre</h4>
                <div><a href="game.php?nbMonde=2"><img src="image/arcade/monde2.png" alt="chambre"></a></div>
                <p class="description-monde">Parcourez la chambre et ses obstacles pour retrouver la prise</p>
            </li>

            <li id="md3">
                <h3 class="nb-monde">Monde 3 :</h3>
                <h4 class="title-monde">La cuisine</h4>
                <div><a href="game.php?nbMonde=3"><img src="image/arcade/monde3.png" alt="cuisine"></a></div>
                <p class="description-monde">Traversez la cuisine et ses ustensils pour retrouver la prise</p>
            </li>

            <li id="md4">
                <h3 class="nb-monde">Monde 4 :</h3>
                <h4 class="title-monde">Le salon</h4>
                <div><a href="game.php?nbMonde=4"><img src="image/arcade/monde4.png" alt="salon"></a></div>
                <p class="description-monde">Parcourez le salon et ses obstacles pour retrouver la prise</p>
            </li>

            <li id="md5">
                <h3 class="nb-monde">Monde 5</h3>
                <h4 class="title-monde">Le jardin</h4>
                <div><a href="game.php?nbMonde=5"><img src="image/arcade/monde5.png" alt="jardin"></a></div>
                <p class="description-monde">Venez prendre un bol d'air dans le jardin mais attention aux moustiques !</p>
            </li>

            <li id="md6">
                <h3 class="nb-monde">Monde 6</h3>
                <h4 class="title-monde">La salle de bain</h4>
                <div><a href="game.php?nbMonde=6"><img src="image/arcade/monde6.png" alt="salle de bain"></a></div>
                <p class="description-monde">Faite vous une nouvelle beautÃ©e dans la salle de bain mais ne tomber pas dans les toilettes !</p>
            </li>

            <li id="md7">
                <h3 class="nb-monde">Monde 7</h3>
                <h4 class="title-monde">Le garage</h4>
                <div><a href="game.php?nbMonde=7"><img src="image/arcade/monde7.png" alt="garage"></a></div>
                <p class="description-monde">Le boss final est la ! A vous la prise !</p>
            </li>

        </ul>

    </section>

</body>
</html>