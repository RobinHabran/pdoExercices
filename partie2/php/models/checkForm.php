<?php

/**
 * objet pour verif de regex
 *
 * @author lmno002
 */
class checkForm {

  private $name = '/^[a-zéèà \-]+$/i';
  private $dateSql = '/^((?:19|20)(?:[\d]{2}))-((?:[0][\d])|(?:[1][0-2]))-((?:(0|1|2)[\d])|(?:[3][0-1]))$/';
  private $hourAppointments = '/^(([0][89])|([1][0-9]))[:]([0-4][05])$/';
  private $phone = '/^([0]|[\+][3]{2})([\s]?[\d][\s]?){9}$/i';
  private $mail = '/^(.*)([@]{1})(.*)([.]{1})([a-z]{2,})$/i';
  private $number = '/^[\d]+$/';
  public $postName = '';
  public $value = '';
  public $valueType = '';
  public $error = '';

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
  private function compareRegexWithPost() {
    // assignation 
    $this->value = $_POST[$this->postName];
    $resultCorrespondantRegex = $this->getCorrespondantRegexWithPost();
    if ($resultCorrespondantRegex != 'error') {
      $regexCorrespond = preg_match($resultCorrespondantRegex, $this->value);
    } else {
      // -1 = int erreur
      $regexCorrespond = -1;
    }
    return $regexCorrespond;
  }

  /**
   * méthode qui affilie à la variable valueType son type en fonction de sa valeur
   */
  private function affectValueType() {
    $validationAffectValue = false;
    if ($this->postName == 'firstname') {
      $this->valueType = 'name';
      $validationAffectValue = true;
    } elseif ($this->postName == 'lastname') {
      $this->valueType = 'name';
      $validationAffectValue = true;
    } elseif ($this->postName == 'birthdate' || $this->postName == 'date') {
      $this->valueType = 'date';
      $validationAffectValue = true;
    } elseif ($this->postName == 'hourAppointments') {
      $this->valueType = 'hourAppointments';
      $validationAffectValue = true;
    } elseif ($this->postName == 'phone') {
      $this->valueType = 'phone';
      $validationAffectValue = true;
    } elseif ($this->postName == 'mail') {
      $this->valueType = 'mail';
      $validationAffectValue = true;
    } elseif ($this->postName == 'id' || $this->postName == 'idPatients') {
      $this->valueType = 'id';
      $validationAffectValue = true;
    }
    return $validationAffectValue;
  }

  /**
   * méthode qui selectionne la regex adaptée selon le type de la value
   * @return string
   */
  private function getCorrespondantRegexWithPost() {
    $noErrorValueType = $this->affectValueType();
    if ($noErrorValueType) {
      if ($this->valueType == 'name') {
        $regex = $this->name;
      } elseif ($this->valueType == 'date') {
        $regex = $this->dateSql;
      } elseif ($this->valueType == 'hourAppointments') {
        $regex = $this->hourAppointments;
      } elseif ($this->valueType == 'phone') {
        $regex = $this->phone;
      } elseif ($this->valueType == 'mail') {
        $regex = $this->mail;
      } elseif ($this->valueType == 'id') {
        $regex = $this->number;
      }
    } else {
      $regex = 'error';
    }
    return $regex;
  }

  public function checkPostValue() {
    $isValid = false;
    if (!empty($this->value)) {
      // comparaison de valeur avec la regex
      $compareRegexWithPostResult = $this->compareRegexWithPost();
      if ($compareRegexWithPostResult == -1) {
        $this->error = 'msgPerso';
      } elseif ($compareRegexWithPostResult) {
        // 'htmlspecialchars()' remplace le balisage par leur valeur en html. ex: '<script>' devient '&lt script &gt'
        $this->value = htmlspecialchars($this->value);
        $isValid = true;
      } else { // cas d'erreur non respect de la syntaxe
        // cas du firstname et lastname
        if ($this->valueType == 'name') {
          $this->error = 'Veuillez n\'indiquer que des lettres majuscules et minuscules';
        }
        if ($this->valueType == 'hourAppointments') {
          $this->error = 'Veuillez inserer une heure de la forme 14:45';
        }
        // cas du date
        elseif ($this->valueType == 'date') {
          $this->error = 'Veuillez inserer une date de la forme 31/12/1990';
        }
        // cas du numéro de tel
        elseif ($this->valueType == 'phone') {
          $this->error = 'Veuillez n\'inserer que des chiffres. Aucun autre caractère est autorisé';
        }
        // cas du email
        elseif ($this->valueType == 'mail') {
          $this->error = 'Veillez à ce que votre mail soit de la forme xxx@yyy.com';
        }
        // cas de l'id
        elseif ($this->valueType == 'id') {
          $this->error = 'Veuillez renseigner un ID valide';
        }
      }
      //} elseif (empty($this->value)) { // cas d'erreur firstname && lastname champ vide
    } else { // cas d'erreur firstname && lastname champ vide
      // cas du lastname
      if ($this->postName == 'lastname') {
        $this->error = 'Veuillez renseigner votre nom';
      }
      // cas du firstname
      elseif ($this->postName == 'firstname') {
        $this->error = 'Veuillez renseigner votre prénom';
        // cas de l'heure de rdv
      } elseif ($this->postName == 'hourAppointments') {
        $this->error = 'Veuillez renseigner une heure de rendez-vous';
      }
      // cas du date
      elseif ($this->postName == 'date') {
        $this->error = 'Veuillez renseigner une date de rendez-vous';
      }
      // cas du date
      elseif ($this->postName == 'birthdate') {
        $this->error = 'Veuillez renseigner votre date de naissance';
      }
      // cas du cellNumber
      elseif ($this->postName == 'phone') {
        $this->error = 'Veuillez renseigner votre numéro de tél.';
      }
      // cas du email
      elseif ($this->postName == 'mail') {
        $this->error = 'Veillez renseigner votre e-mail';
        // cas de l'id
      } elseif ($this->postName == 'id' || $this->postName == 'patientId') {
        $this->error = 'msgPerso';
      }
    }
    //if($this->value != '') $formError[$this->value] = $this->error;
    return $isValid;
  }

}
