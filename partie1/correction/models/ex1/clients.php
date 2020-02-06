<?php
include_once '../assets/php/controllers/.password.php';
/* modele client  */
/**
 * Description of clients
 *
 * @author lmno002
 */
class clients {

  public $id = 0;
  public $lastname = '';
  public $firstname = '';
  public $birthDate = '1900-12-31';
  public $card = false;
  public $cardNumber = '';
  
  private $dataBase = NULL;
  
  /**
   * la méthode construit l'objet client représentant la table clients
   */
  public function __construct() {
    try {
      $this->dataBase = new PDO('mysql:host=localhost;dbname=colyseum', 'robin', $passwordSql);
    } catch (PDOException $exc) {
      $sqlError = die('database is not available');
    }
  }
  
  /**
   * la méthode retourne la liste des clients
   * 
   * @return array
   */
  public function getUserListOrderByLastname() {
    // requete sql
    $requeteClientsSql = 'SELECT UPPER(`lastName`) AS lastname,`firstName` FROM `clients` ORDER BY `lastName`';
    // on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
    $dataClients = $this->dataBase->query($requeteClientsSql);
    // la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
    return $dataClients->fetchAll(PDO::FETCH_OBJ);
  }
}
