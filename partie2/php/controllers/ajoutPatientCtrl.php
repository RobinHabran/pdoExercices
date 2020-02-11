<?php

$formError = array();
//fin déclaration des variables
// on verifie que le bouton submit a été clické
if (isset($_POST['registerPatient'])){
  $patient = new patient();
  $regex = new checkForm();
  

  foreach($_POST as $postName => $value){
    if($postName != 'registerPatient'){
      $regex->postName = $postName; 
      $regex->value = $value;
      // appel de la méthode checkPostValue de la class checkForm
      if(!$regex->checkPostValue()){
        $formError[$postName] = $regex->error;
      }
    }
  }
  
  // insertion des données
  if (count($formError) == 0) {
    $checkIfPatientExists = $patient->checkIfPatientExists();
    if (!$regex->checkPostValue()) {
      $patient->patientExists();
      $patient->registerNewPatient();
    }else{
      $insertError = 'Vous avez déja un compte sur notre plateforme';
    }
  }
}