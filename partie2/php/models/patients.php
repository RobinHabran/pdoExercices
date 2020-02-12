<?php
//include_once '../controllers/.password.php';

/**
 * Description of clients
 *
 * @author lmno002
 */
class patient {

  public $id = 0;
  public $lastname = '';
  public $firstname = '';
  public $birthdate = '1900-12-31';
  public $phone = '0123456789';
  public $mail = 'test@test.test';
  private $dataBase = NULL;

  /**
   * la méthode construit l'objet patient représentant la table patient en base de donnée
   */
  public function __construct() {
    try {
      //$this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'robin', $passwordSql);
      $this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'robin', 'p[]7QD4j');
    } catch (PDOException $exc) {
      $sqlError = die('database is not available');
    }
  }

  public function registerNewPatient() {
    // requete sql
    // bug sur la méthode : ' corriger
    $insertPatientSql = 'INSERT INTO hospitalE2N.patients
                         (`lastname`,`firstname`,`birthdate`,`phone`,`mail`)
                         VALUES
                         (UPPER(:lastname),:firstname,:birthdate,:phone,:mail)';
    // on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
    $statement = $this->dataBase->prepare($insertPatientSql);
    /* bindValue() vérifie la validité des parametres
     * bindValue($par1, $par2, $par3)
     * $par1 = marqueur nominatif;
     * $par2 = attribut de l'objet correspondant
     * $par3 = type de l'attribut
     */
    $statement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $statement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $statement->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    $statement->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $statement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    // la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
    return $statement->execute();
  }
  
  /**
   * la méthode renvoi le nombre de patient existant dans la base de donnée, dont toutes les informations d'inscription correspondent. 
   * case(0) : aucun patient qui match
   * case(n>0) : n patients qui matchent
   * @return object
   */
  public function checkIfPatientExists() {
    $request = 'SELECT COUNT(`id`)AS `patientExists` FROM `patients` WHERE `lastname`=:lastname '
            . 'AND `firstname`=:firstname '
            . 'AND `birthDate`=:birthDate '
            . 'AND `cellNumber`=:cellNumber '
            . 'AND `email`=:email';
    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $statement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $statement->bindValue(':birthDate', $this->birthdate, PDO::PARAM_STR);
    $statement->bindValue(':cellNumber', $this->phone, PDO::PARAM_STR);
    $statement->bindValue(':email', $this->mail, PDO::PARAM_STR);
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }
}
