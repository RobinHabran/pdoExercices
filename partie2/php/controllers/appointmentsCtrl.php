<?php

$patient = new patient();
$patientList = $patient->getPatientsList();

if (!empty($_GET['id'])) {
  //ne pas oublier d'instancier l'objet
  $appointnement = new appointments();
//on réassigne notre attribut id ci-dessous parce que j'ai envie et puis c'est tout
  if (preg_match('/^[0-9]+$/', $_GET['id'])) {
    $patient->id = htmlspecialchars($_GET['id']);
    $patientCount = $patient->checkIfPatientExistsById();
    if ($patientCount->exists == 1) {
      $patientProfile = $patient->getPatientProfile();
    } else {
      header('location:liste-patients.php');
      exit;
    }
  } else {
    header('location:liste-patients.php');
    exit;
  }
} else {
  header('location:liste-patients.php');
  exit;
}  

