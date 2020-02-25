<?php

$patients = new patient();

if (isset($_POST['deletePatient'])) {
  if ($_POST['deletePatient']) {
    $patients->id = $_POST['deletePatient'];
    $patients->deletePatient();
  }
}

// Méthode numéro 1 :
// Recherche d'un patient 
//if (isset($_POST['searchPatient'])) {
//  if (!empty($_POST['searchPatientInput'])) {
//    $patients->lastname = $patients->firstname = $patients->mail = $patients->phone = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
//    $patientList = $patients->searchPatient();
//  }
//} else {
//  $patientsList = $patients->getPatientsList();
//}
// Méthode numéro 2:
// Recherche d'un patient 
if (isset($_POST['searchPatient'])) {
  if (!empty($_POST['searchPatientInput'])) {
    $searchArray = array();
    $searchArray['lastname'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $searchArray['firstname'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $searchArray['phone'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $searchArray['mail'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $patientsList = $patients->getPatientsList($searchArray);
  } else {
    $patientsList = $patients->getPatientsList();
  }
} else {
  $patientsList = $patients->getPatientsList();
}