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
      <div id="container">
        <div id="banner">
        </div>
        <h1>Programmation orientée objet PHP</h1>
        <h2>Partie 1</h2>
        <div id="answerEx1">
          <h3>Exercice 1 : Afficher tous les clients.</h3>
          <?php 
          if(isset($sqlError)){
            ?><p><?=$sqlError; ?></p><?php
          } else {
            ?><table><?php
            // affichage en objet des résultats de la requete client
            foreach($listClients as $clients){
              ?><th><?=$clients->lastname, ' ', $clients->firstName;?></th><?php
            }
            ?></table><?php
          }
          ?>
        </div>
        <hr>
        <div id="answerEx2">
          <h3>Exercice 2 : Afficher tous les types de spectacles possibles.</h3>
          <?php 
          if(isset($sqlError)){
            ?><p><?=$sqlError; ?></p><?php
          } else {
            ?><select><?php
            // affichage en objet des résultats de la requete client
            foreach($listShowTypes as $showTypes){
              ?><option><?=$showTypes->type; ?></option><?php
            }
            ?></select><?php
          }
          ?>
        </div>
      </div>
    </body>
</html>