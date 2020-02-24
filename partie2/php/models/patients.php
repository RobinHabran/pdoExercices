<?php

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
  public $searchTyped;
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

  public function searchPatient() {
    $request = 'SELECT * FROM patients'
            . ' WHERE'
            . ' (`firstname` LIKE \'%lebogoss%\')'
            . ' OR'
            . ' (`lastname` LIKE \'%lebogoss%\')';
    $statement = $this->dataBase->query($request);
    return $statement->fetchAll(PDO::FETCH_OBJ);
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

  public function getPatientsList() {
    $request = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`,\'%d/%m/%Y\') AS `birthdate` '
            . 'FROM `patients`';
    $statement = $this->dataBase->query($request);
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  /**
   * la méthode renvoi le nombre de patient existant dans la base de donnée, dont toutes les informations d'inscription correspondent. 
   * case(0) : aucun patient qui match
   * case(n>0) : n patients qui matchent
   * @return object
   */
  public function checkIfPatientExists() {
    $requestToCheckPatient = 'SELECT COUNT(`id`) AS `patientExist` FROM `patients` WHERE `lastname`=:lastname'
            . ' AND `firstname`=:firstname AND `birthdate`=:birthdate'
            . ' AND `phone`=:phone AND `mail`=:mail';

    $request = $this->dataBase->prepare($requestToCheckPatient);

    $request->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $request->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $request->bindValue(':mail', $this->mail, PDO::PARAM_STR);

    $request->execute();

    return $request->fetch(PDO::FETCH_OBJ);
  }

  public function getPatientProfile() {
    $request = 'SELECT `id`, `firstname`, `lastname`,`birthdate` AS `birthdateSql`, DATE_FORMAT(`birthdate`,\'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
            . 'FROM `patients` '
            . 'WHERE `id`= :id';
    //marquer nominatif (:nom_attribut) => permet de prévenir les injections sql
    $statement = $this->dataBase->prepare($request);
    //j'attribue au marqueur nominatif id la valeur de l'attribut de mon objet id
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    //PDO::PARAM_INT = on donne le type de valeur en paramètre (date c'est en string, seule exception),
    //on type notre valeur, on veut un INT car on récupère l'id, qui est unique... SECURITE
    $statement->execute();
    // je teste ma requête, je teste que je reçois mes données via ma méthode puis affichage
    return $statement->fetch(PDO::FETCH_OBJ);
  }

  public function checkIfPatientExistsById() {
    $request = 'SELECT COUNT(`id`) AS `exists` '
            . 'FROM `patients` '
            . 'WHERE `id` = :id';
    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
  }

  public function updateProfilePatient() {
    $request = 'UPDATE `patients` '
            . 'SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail '
            . 'WHERE `id` = :id';
    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
    $statement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
    $statement->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
    $statement->bindValue(':phone', $this->phone, PDO::PARAM_STR);
    $statement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $statement->execute();
  }

  public function deletePatient() {
    $request = 'DELETE FROM `patients`'
            . ' WHERE `id` = :id';
    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $statement->execute();
  }

}
