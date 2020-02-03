<?php
include '.password.php';
try {
  $dataBase = new PDO('mysql:host=localhost;dbname=colyseum','robin',$passwordSql);
} catch (PDOException $exc) {
  $sqlError = die('database is not available');
}

// Ex1 : Afficher tous les clients.
// requete sql
$requeteClientsSql = 'SELECT UPPER(`lastName`) AS lastname,`firstName` FROM `clients` ORDER BY `lastName`';
// on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
$dataClients = $dataBase->query($requeteClientsSql);
// la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
$listClients = $dataClients->fetchAll(PDO::FETCH_OBJ);

// Ex2 : Afficher tous les types de spectacles possibles.
// requete sql
$requeteShowTypeSql = 'SELECT `type` FROM `showTypes` ORDER BY `type`';
// on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
$dataShowTypes = $dataBase->query($requeteShowTypeSql);
// la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
$listShowTypes = $dataShowTypes->fetchAll(PDO::FETCH_OBJ);