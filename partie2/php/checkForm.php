<?php

/**
 * objet pour verif de regex
 *
 * @author lmno002
 */
class checkForm {
  private $name = '/^[A-Z][a-zéèà \-]+$/i';
  private $birthDate = '^((?:19|20)(?:[\d]{2}))-((?:[0][\d])|(?:[1][0-2]))-((?:(0|1|2)[\d])|(?:[3][0-1]))$';
  private $cellNumber = '/^([0]|[\+][3]{2})([\s]?[\d][\s]?){9}$/i';
  private $email = '/^(.*)([@]{1})(.*)([.]{1})([a-z]{2,})$/i';
  public $value = '';
  public $error='';
  /**
   * Prend le type de vérification :
   *  __name pour une nom ou prénom
   * @var string 
   */
  public $valueType='';
  
  public function __construct() {
    
  }
  /**
   * fonction qui compare la valeur du post avec la regex correspondante à son type
   * @return boolean
   */
  private function compareRegexWithPost(){
    return preg_match($valeur, $regex);
  }
  
  private function getCorrespondantRegexWithPost(){
    
  }
          
  private function getTypeOfPost(){
    return gettype($this->value);
  }
  
  public function checkPostValue(){
    if (!empty($this->value)) { // cas d'erreur firstname && lastname champ vide
    // comparaison de valeur avec la regex
    if () {
      // 'htmlspecialchars()' remplace le balisage par leur valeur en html. ex: '<script>' devient '&lt script &gt'
      $patient->birthDate = htmlspecialchars($this->value);
    } else { // cas d'erreur non respect de la syntaxe
      $this->error = 'Veuillez indiquer un nom ne contenant que des lettres majuscules et miuscules';
    }
  } elseif (empty($this->value)) {
    $this->error = 'Veuillez renseigner votre nom';
  }
    
  }
}
