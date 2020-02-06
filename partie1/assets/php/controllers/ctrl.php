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

// Ex3 : Afficher les 20 premiers clients.
// requete sql
$requeteClientsLimitSql = 'SELECT UPPER(`lastName`) AS lastname,`firstName` FROM `clients` ORDER BY `lastName` LIMIT 20';
// on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
$dataClientsLimit = $dataBase->query($requeteClientsLimitSql);
// la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
$listClientsLimit = $dataClientsLimit->fetchAll(PDO::FETCH_OBJ);

// Ex4 : Afficher les clients qui possèdent une carte de fidélité.
// requete sql
$requeteClientsCardSql = 'SELECT UPPER(`lastName`) AS `lastname`,`firstName`'
                       . 'FROM' 
                       .      '`clients`'
                       .      'INNER JOIN `cards` on `clients`.`cardNumber` = `cards`.`cardNumber`'
                       .      'INNER JOIN `cardTypes` on `cards`.`cardTypesId` = `cardTypes`.`id`'
                       .  'WHERE' 
                       .      '`cardTypes`.`type` = "Fidélité"' 
                       .  'ORDER BY `lastName`';
// on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
$dataClientsCard = $dataBase->query($requeteClientsCardSql);
// la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
$listClientsCard = $dataClientsCard->fetchAll(PDO::FETCH_OBJ);

// Ex5 : Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
// requete sql
$requeteClientsMSql = 'SELECT UPPER(`lastName`) AS lastname,`firstName` FROM `clients` WHERE `lastname` LIKE "M%" ORDER BY `lastName`';
// on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
$dataClientsM = $dataBase->query($requeteClientsMSql);
// la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
$listClientsM = $dataClientsM->fetchAll(PDO::FETCH_OBJ);

// Ex6 : Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure.Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure..
// requete sql
$requeteShowsSql = 'SELECT `title` AS `show`, `performer` AS `by`, DATE_FORMAT(`date`,\'%d/%m/%Y\') AS `on`, `startTime` AS `at` FROM `shows` ORDER BY `title` ASC;';
// on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
$dataShows = $dataBase->query($requeteShowsSql);
// la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
$listShows = $dataShows->fetchAll(PDO::FETCH_OBJ);

// Ex 7 : Afficher tous les clients
// requete sql
$requeteClientsFullSql = 'SELECT'
                      . ' UPPER(`lastName`) AS `lastname`,'
                      . ' `clients`.`firstName`,'
                      . ' DATE_FORMAT(`clients`.`birthDate`,"%d/%m/%Y") AS `birthDate`,'
                      . ' IF(`clients`.`card` = 1,`cardTypes`.`type`, "NO CARD") AS `ownsCard`,'
                      . ' IF(`clients`.`card` = 1,`clients`.`cardNumber`, "") AS `cardNumber`'
                  . ' FROM'
                      . ' `clients`'
                      . ' LEFT JOIN `cards` on `clients`.`cardNumber` = `cards`.`cardNumber`'
                      . ' LEFT JOIN `cardTypes` on `cards`.`cardTypesId` = `cardTypes`.`id`'
                  . ' ORDER BY'
                       .' `lastName`';
// on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
$dataClientsFull = $dataBase->query($requeteClientsFullSql);
// la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
$listClientsFull = $dataClientsFull->fetchAll(PDO::FETCH_OBJ);

