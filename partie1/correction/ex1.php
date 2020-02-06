<?php
phpinfo();
include_once 'controllers/ex1/indexCtrl.php';
include_once 'models/ex1/clients.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="assets/css/index.css" />
        <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
        <title>pdo</title>
    </head>
    <body>
      <div id="container">
        </div>
        <h1>Programmation orientée objet PHP</h1>
        <h2>Partie 1</h2>
        <div id="answerEx1">
          <h3>Exercice 1 :</h3>
          <p>Afficher tous les clients.</p>
          <?php 
          if(isset($sqlError)){
            ?><p><?=$sqlError; ?></p><?php
          } else {
            ?><table><?php
            // affichage en objet des résultats de la requete client
            foreach($listClients as $clients){
              ?><th><?=$clients->lastname; ?> <?=$clients->firstName; ?></th><?php
            }
            ?></table><?php
          }
          ?>
        </div>
      </div>
    </body>
</html>