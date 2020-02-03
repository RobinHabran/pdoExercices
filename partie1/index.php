<?php
include_once '../assets/php/ctrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="../assets/css/index.css" />
        <title>pdo</title>
    </head>
    <body>
      <div id="banner">
        
      </div>
      <h1>Programmation orientée objet PHP</h1>
      <h2>Partie 1</h2>
      <h3>Exercice 1 :</h3>
      
        <?php 
        if(isset($sqlError)){
          ?><p><?=$sqlError; ?></p><?php
        } else {
          ?><ul><?php
          // affichage en objet des résultats de la requete client
          while($dataClients = $requeteClients->fetch(PDO::FETCH_OBJ)){
            ?><li><?=$dataClients->lastName, ' ', $dataClients->firstName;?></li><?php
          }
          ?></ul><?php
        }
        ?>
      </p>
    </body>
</html>