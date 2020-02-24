<?php

/**
 * Description of appointments
 *
 * @author lmno002
 */
class appointments {

  public $id = 0;
  public $dateHour = '1900-12-31 12:30:00';
  public $date = '1900-12-31';
  public $hour = '12:30:00';
  public $idPatients = 0;
  public $dataBase = null;

  public function __construct() {
    try {
      //$this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'robin', $passwordSql);
      $this->dataBase = new PDO('mysql:host=localhost;dbname=hospitalE2N', 'robin', 'p[]7QD4j');
    } catch (PDOException $exc) {
      $sqlError = die('database is not available');
    }
  }

  /**
   * la méthode concatène la date et l'heure rentrée par l'user
   * afin d'être à la bonne forme dans la base de donnée
   * @return string
   */
  private function concatenation() {
    return $this->date . ' ' . $this->hour;
  }

  public function registerNewAppointment() {
    // requete sql
    // bug sur la méthode : ' corriger
    $insertPatientSql = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) '
            . ' VALUES (:dateHour, :idPatients)';
    // on fait appel à la méthode 'query' à qui on donne la requete sql qui nous retourne une instance d'objet PDOstatement
    $statement = $this->dataBase->prepare($insertPatientSql);
    $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
    $statement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
    // la méthode 'fetchAll(PDO::FETCH_OBJ)' retourne un tableau d'objet des resultats de la requete sql
    return $statement->execute();
  }

  public function getAppointmentList() {
    $request = 'SELECT  `lastname`, `firstname`, DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`dateHour`, \'%Hh%i\')  AS `hour`, `idPatients`, `appointments`.`id` AS `idAppointment` '
            . ' FROM `appointments`'
            . ' LEFT JOIN `patients`'
            . ' ON `patients`.`id` = `appointments`.`idPatients`'
            . ' GROUP BY `appointments`.`id`'
            . ' ORDER BY `appointments`.`dateHour`';
    $statement = $this->dataBase->query($request);
    return $statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function getAppointment() {
    $request = 'SELECT  `lastname`, `firstname`, DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`dateHour`, \'%Hh%i\')  AS `hour` '
            . ' FROM `appointments`'
            . ' LEFT JOIN `patients`'
            . ' ON `patients`.`id` = `appointments`.`idPatients`'
            . ' WHERE `id`= :id'
            . ' GROUP BY `appointments`.`dateHour`'
            . ' ORDER BY `appointments`.`dateHour`';
    $statement = $this->dataBase->query($request);
    return $statement->fetch(PDO::FETCH_OBJ);
  }

  public function getInfoAppointment() {
    $request = 'SELECT  `lastname`, `firstname`, DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT(`dateHour`, \'%Hh%i\')  AS `hour` '
            . ' FROM `appointments`'
            . ' LEFT JOIN `patients`'
            . ' ON `patients`.`id` = `appointments`.`idPatients`'
            . ' GROUP BY `appointments`.`dateHour`'
            . ' ORDER BY `appointments`.`dateHour`';
    $statement = $this->dataBase->query($request);
    return $statement->fetch(PDO::FETCH_OBJ);
  }

  public function checkIfAppointmentExistsById() {
    $request = 'SELECT DATE_FORMAT(`appointments`.`dateHour`, \'%Y-%m-%d\') AS `sqlDate`, DATE_FORMAT(`appointments`.`dateHour`, \'%d/%m/%Y\') AS `frenchDate`, DATE_FORMAT(`appointments`.`dateHour`, \'%H:%i\') AS `hour`, `patients`.`lastname`, `patients`.`firstname`, `patients`.`phone`, `patients`.`mail`, DATE_FORMAT(`patients`.`birthdate`, \'%d/%m/%Y\') AS `frenchBirthdate` '
            . ' FROM `appointments` '
            . ' INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id` '
            . ' WHERE `appointments`.`id` = :id';
    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
  }

  public function checkIfAppointmentExists() {
    $this->dateHour = $this->concatenation();
    $request = 'SELECT COUNT(`id`) AS `checkIfAppointmentExists` '
            . 'FROM `appointments` '
            . 'WHERE `dateHour` = :dateHour '
            . 'AND `idPatients` = :idPatients';

    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
    $statement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
  }

  public function updateAppointment() {
    $this->dateHour = $this->concatenation();
    $request = 'UPDATE `appointments`'
            . ' SET `dateHour` = :dateHour'
            . ' WHERE `id` = :id';
    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $statement->execute();
  }
  
  public function deleteAppointment() {
    $request = 'DELETE FROM `appointments`'
             . ' WHERE `id` = :id';
    $statement = $this->dataBase->prepare($request);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $statement->execute();
  }

}
