<?php

$patients = new patient();

// pagination
$rowsPerPage = (isset($_REQUEST['rowsPerPage']) && preg_match('/^[\d]+$/', $_REQUEST['rowsPerPage'])) ? htmlspecialchars($_REQUEST['rowsPerPage']) : 10;
$paginationNumberPage = $patients->countPaginationNumberPage($rowsPerPage);
$paginationNumberPage['numberPages'] = ceil($paginationNumberPage['numberPages']);

if (isset($_REQUEST['page']) && preg_match('/^[\d]+$/', $_REQUEST['page'])) {
  if ($_REQUEST['page'] < 1) {
    $currentPage = 1;
  } elseif ($_REQUEST['page'] > $paginationNumberPage['numberPages']) {
    $currentPage = $paginationNumberPage['numberPages'];
  } else {
    $currentPage = htmlspecialchars($_REQUEST['page']);
  }
} else {
  $currentPage = 1;
}
$offsetPage = ($currentPage - 1) * $rowsPerPage;

// suppression patient
if (isset($_POST['deletePatient'])) {
  if ($_POST['deletePatient']) {
    $patients->id = $_POST['deletePatient'];
    $patients->deletePatient();
  }
}

// Recherche d'un patient 
if (isset($_POST['searchPatient'])) {
  if (!empty($_POST['searchPatientInput'])) {
    $searchArray = array();
    $searchArray['lastname'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $searchArray['firstname'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $searchArray['phone'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $searchArray['mail'] = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $patientsList = $patients->getPatientsList($offsetPage, $rowsPerPage, $searchArray);
  } else {
    $patientsList = $patients->getPatientsList($offsetPage, $rowsPerPage);
  }
} else {
  $patientsList = $patients->getPatientsList($offsetPage, $rowsPerPage);
}
