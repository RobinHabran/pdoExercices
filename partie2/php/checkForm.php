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
  public $value = '';
  public $valueType = '';
  public $error='';
  
  public function __construct() {
    
  }
  /**
   * fonction qui compare la valeur du post avec la regex correspondante à son type
   * @return boolean
   */
  private function compareRegexWithPost(){
    return preg_match($this->value, $this->getCorrespondantRegexWithPost());
  }
  
  /**
   * méthode qui selectionne la regex adaptée selon le type de la value
   * @return string
   */
  private function getCorrespondantRegexWithPost(){
    if($this->valueType == 'date'){
      $regex = $this->dateSql;
    }
    if($this->valueType == 'name'){
      $regex = $this->name;
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
    if (!empty($this->value)) { // cas d'erreur firstname && lastname champ vide
    // comparaison de valeur avec la regex
    if ($this->compareRegexWithPost()) {
      // 'htmlspecialchars()' remplace le balisage par leur valeur en html. ex: '<script>' devient '&lt script &gt'
      $this->value = htmlspecialchars($this->value);
    } else { // cas d'erreur non respect de la syntaxe
      $this->error = 'Veuillez indiquer un nom ne contenant que des lettres majuscules et miuscules';
    }
  } elseif (empty($this->value)) {
    $this->error = 'Veuillez renseigner votre nom';
  }
    
  }
}
