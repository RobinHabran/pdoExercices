<?php

try {
  $dataBase = new PDO('mysql:host=localhost;dbname=colyseum','robin','p[]7QD4j');
} catch (PDOException $exc) {
  $sqlError = 'database is not available';
}

$requeteClientsSql = 'SELECT `lastName`,`firstName` FROM `clients` ORDER BY `lastName`';
$requeteClients = $dataBase->query($requeteClientsSql);




