<?php
include_once '../assets/php/ctrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="../assets/css/index.css" />
        <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
        <title>pdo</title>
    </head>
    <body>
      <div id="container">
        <div id="banner">
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
              ?><th><?=$clients->lastname, ' ', $clients->firstName;?></th><?php
            }
            ?></table><?php
          }
          ?>
        </div>
        <hr>
        <div id="answerEx2">
          <h3>Exercice 2 :</h3>
          <p>Afficher tous les types de spectacles possibles.</p>
            <?php
            // affichage en objet des résultats de la requete client
            foreach($listShowTypes as $showTypes){
              ?><button><?=$showTypes->type; ?></button><?php
            }
            ?>
          
        </div>
        <hr>
        <div id="answerEx3">
          <h3>Exercice 3 :</h3>
          <p>Afficher les 20 premiers clients.</p>
          <table>
            <?php
            // affichage en objet des résultats de la requete client
            foreach($listClientsLimit as $clientsLimit){
              ?><th><?=$clientsLimit->lastname . ' ' . $clientsLimit->firstName; ?></th><?php
            }
            ?>
          </table>
        </div>
        <hr>
        <div id="answerEx4">
          <h3>Exercice 4 :</h3>
          <p>N'afficher que les clients possédant une carte de fidélité.</p>
          <table>
            <?php
            // affichage en objet des résultats de la requete client
            foreach($listClientsCard as $clients){
              ?><th><?=$clients->lastname . ' ' . $clients->firstName; ?></th><?php
            }
            ?>
          </table>
        </div>
        <hr>
        <div id="answerEx5">
          <h3>Exercice 5 :</h3>
          <p>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".</p>
          <table>
            <?php
            // affichage en objet des résultats de la requete client
            foreach($listClientsM as $clients){
              ?><th><?= $clients->lastname . ' ' . $clients->firstName; ?></th><?php
            }
            ?>
          </table>
        </div>
        <div id="answerEx6">
          <h3>Exercice 6 : </h3>
          <p>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. 
            Trier les titres par ordre alphabétique. 
            Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.
          </p>
          <table>
            <?php
            // affichage en objet des résultats de la requete client
            foreach($listShows as $shows){
              ?><th><?= 'Spectable : ' . $shows->show . ' par ' . $shows->by . ', le ' . $shows->on . ' à ' . $shows->at ; ?></th><?php
            
              //date("d-m-Y", strtotime($shows->on))
            }
            ?>
          </table>
        </div>
      </div>
    </body>
</html>