<?php

/**
 * Description of appointments
 *
 * @author lmno002
 */
class appointments {

  public $id;
  public $dateHour;
  public $idPatients;

  public function __construct() {
    try {
      //$this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'robin', $passwordSql);
      $this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'robin', 'p[]7QD4j');
    } catch (PDOException $exc) {
      $sqlError = die('database is not available');
    }
  }

  public function registerNewAppoitment() {
    // requete sql
    // bug sur la méthode : ' corriger
    $insertPatientSql = 'INSERT INTO hospitalE2N.appoitments
                         (`dateHour`,`idPatients`)
                         VALUES
                         (UPPER(:dateHour),:idPatients)';
    // on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
    $statement = $this->dataBase->prepare($insertPatientSql);
    /* bindValue() vérifie la validité des parametres
     * bindValue($par1, $par2, $par3)
     * $par1 = marqueur nominatif;
     * $par2 = attribut de l'objet correspondant
     * $par3 = type de l'attribut
     */
    $statement->bindValue(':dateHour', $this->lastname, PDO::PARAM_STR);
    $statement->bindValue(':idPatients', $this->firstname, PDO::PARAM_STR);
    // la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
    return $statement->execute();
  }

  public function getPatientsList() {
    $request = 'SELECT `dateHour` AS `date`, `dateHour` AS `hour`, `firstname` '
            . 'FROM `appoitmets`';
    $statement = $this->dataBase->query($request);
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function makeAnAppoitment() {
    
  }
}
