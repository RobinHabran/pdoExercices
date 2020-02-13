<?php

$formError = array();
//fin déclaration des variables
// on verifie que le bouton submit a été clické
if (isset($_POST['registerPatient'])){
  // instanciation des objets nécéssaires
  $patient = new patient();
  $regex = new checkForm();
  

  foreach($_POST as $postName => $value){
    if($postName != 'registerPatient'){
      // j'assigne ma valeur $postname correspondant au name de l'input à l'attribut $regex->postName
      $regex->postName = $postName; 
      // j'assigne ma valeur $value correspondant au name de l'input à l'attribut $regex->postName
      $regex->value = $value;
      // test si la valeur respecte la syntaxe de la regex
      if(!$regex->checkPostValue()){
        // assignation au array des erreurs l'erreur dédiée stockée dans l'objet regex
        $formError[$postName] = $regex->error;
      }else{
        // assignation de la valeur de l'attribut de l'objet de la regex dans l'objet patient
        $patient->$postName = $regex->value;
      }
    }
  }
  // insertion des données
  // si le tableau d'erreur est vide alors il n'y a pas d'erreur dédectée dans la valeur des input
  if (count($formError) == 0) {
    // vérification si le patient existe
    $isPatientExist = $patient->checkIfPatientExists();
    if(!$isPatientExist->patientExist){
      // cas où le patient n'existe pas encore en base de donnée
      // alors j'appel la méthode qui envoi les valeur dans la bd
      $patient->registerNewPatient();
    }else{
      /**
       * Il ne rentre pas dans le if !!
       */
      // cas où le patient existe déjà
      $insertError = 'Vous avez déja un compte sur notre plateforme';
    }
  }
}