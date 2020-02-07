<?php

//fin déclaration des variables
// on verifie que le bouton submit a été clické
if (isset($_POST['registerPatient'])){

  $patient = new patient();
  $regex = new regex();

  // on érifie que le champ 'firstname' et 'lastname' n'est pas vide
  if (!empty($_POST['firstname'])) { // cas d'erreur firstname && lastname champ vide
    // comparaison de valeur avec la regex$param
    if (preg_match($regex->name, $_POST['firstname'])) {
      // 'htmlspecialchars()' remplace le balisage par leur valeur en html. ex: '<script>' devient '&lt script &gt'
      $patient->firstname = htmlspecialchars($_POST['firstname']);
    } else { // cas d'erreur non respect de la syntaxe
      $formError['firstname'] = 'Veuillez indiquer un prénom ne contenant que des lettres majuscules et miuscules';
    }
  } elseif (empty($_POST['firstname'])) {
    $formError['firstname'] = 'Veuillez renseigner votre prénom';
  }
  // on érifie que le champ 'lastname' n'est pas vide
  if (!empty($_POST['lastname'])) { // cas d'erreur firstname && lastname champ vide
    // comparaison de valeur avec la regex
    if (preg_match($regex->name, $_POST['lastname'])) {
      // 'htmlspecialchars()' remplace le balisage par leur valeur en html. ex: '<script>' devient '&lt script &gt'
      $patient->lastname = htmlspecialchars($_POST['lastname']);
    } else { // cas d'erreur non respect de la syntaxe
      $formError['lastname'] = 'Veuillez indiquer un nom ne contenant que des lettres majuscules et miuscules';
    }
  } elseif (empty($_POST['lastname'])) {
    $formError['firstname'] = 'Veuillez renseigner votre nom';
  }
  // on érifie que le champ 'lastname' n'est pas vide
  $checkForm = new checkForm();
  $checkForm->
  // insertion des données
  if (count($formError) == 0) {
    $checkIfPatientExists = $patient->checkIfPatientExists();
    if (!checkIfPatientExists()) {
      $patient->patientExists();
      $patient->registerNewPatient();
    }else{
      $insertError = 'Vous avez déja un compte sur notre plateforme';
    }
  }
}