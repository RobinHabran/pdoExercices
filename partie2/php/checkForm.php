<?php
/**
 * objet pour verif de regex
 *
 * @author lmno002
 */
class checkForm {
  private $name = '/^[a-zéèà \-]+$/i';
  private $dateSql = '^((?:19|20)(?:[\d]{2}))-((?:[0][\d])|(?:[1][0-2]))-((?:(0|1|2)[\d])|(?:[3][0-1]))$';
  private $cellNumber = '/^([0]|[\+][3]{2})([\s]?[\d][\s]?){9}$/i';
  private $email = '/^(.*)([@]{1})(.*)([.]{1})([a-z]{2,})$/i';
  public $postName = '';
  public $value = '';
  public $valueType = '';
  public $error='';
  
  public function __construct() {
    $this->postName = 'none';
    $this->value = '';
    $this->valueType = 'noType';
    $this->error = 'noValue';
    return true;
  }
  /**
   * fonction qui compare la valeur du post avec la regex correspondante à son type
   * @return boolean
   */
  private function compareRegexWithPost(){
    
    /*
     * probleme de value
     */
    $this->value = $_POST[$this->postName];
    return preg_match($this->getCorrespondantRegexWithPost(), $this->value);
  }
  
  /**
   * méthode qui affilie à la variable valueType son type en fonction de sa valeur
   */
  private function affectValueType(){
    if($this->postName == 'firstname') $this->valueType = 'name';
    if($this->postName == 'lastname') $this->valueType = 'name';
    if($this->postName == 'birthDate') $this->valueType = 'date';
    if($this->postName == 'cellNumber') $this->valueType = 'cellNumber';
    if($this->postName == 'email') $this->valueType = 'email';
    return true;
  }

  /**
   * méthode qui selectionne la regex adaptée selon le type de la value
   * @return string
   */
  private function getCorrespondantRegexWithPost(){
    $this->affectValueType();
    if($this->valueType == 'name'){
      $regex = $this->name;
    }
    if($this->valueType == 'date'){
      $regex = $this->dateSql;
    }
    if($this->valueType == 'cellNumber'){
      $regex = $this->cellNumber;
    }
    if($this->valueType == 'email'){
      $regex = $this->email;
    }
    return $regex;
  }
  
    public function checkPostValue(){
      $isValid = false;
    if (!empty($this->value)) { 
      // comparaison de valeur avec la regex
      if ($this->compareRegexWithPost()) {
        // 'htmlspecialchars()' remplace le balisage par leur valeur en html. ex: '<script>' devient '&lt script &gt'
        $this->value = htmlspecialchars($this->value);
        $isValid = true;
      } else { // cas d'erreur non respect de la syntaxe
        // cas du firstname et lastname
        if($this->valueType == 'name') $this->error = 'Veuillez n\'indiquer que des lettres majuscules et minuscules';
        // cas du date
        if($this->valueType == 'date') $this->error = 'Veuillez inserer une date';
        // cas du cellNumber
        if($this->valueType == 'cellNumber') $this->error = 'Veuillez n\'inserer que des chiffres. Aucun autre caractère est autorisé';
        // cas du email
        if($this->valueType == 'email') $this->error = 'Veillez à ce que votre mail soit de la forme xxx@yyy.com';
      }
    //} elseif (empty($this->value)) { // cas d'erreur firstname && lastname champ vide
    } else { // cas d'erreur firstname && lastname champ vide
      // cas du lastname
      if($this->postName == 'lastname') $this->error = 'Veuillez indiquer votre nom';
      // cas du firstname
      if($this->postName == 'firstname') $this->error = 'Veuillez indiquer votre prénom';
      // cas du date
      if($this->postName == 'birthDate') $this->error = 'Veuillez inserer votre date de naissance';
      // cas du cellNumber
      if($this->postName == 'cellNumber') $this->error = 'Veuillez n\'inserer que des chiffres';
      // cas du email
      if($this->postName == 'email') $this->error = 'Veillez à ce que votre mail soit de la forme xxx@yyy.com';
    }
    //if($this->value != '') $formError[$this->value] = $this->error;
    return $isValid;  
  }
}
