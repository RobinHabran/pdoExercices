<?php

$patients = new patient();

$rowsPerPage = (is_int($_POST['rowsPerPage'])) ? htmlspecialchars($_POST['rowsPerPage']) : 10;

$paginationNumberPage = $patients->countPaginationNumberPage($rowsPerPage);
if (isset($_GET['page'])) {
  $currentPage = htmlspecialchars(intval($_GET['page']));
} else {
  $currentPage = 1;
}
$offsetPage = ($currentPage - 1) * $rowsPerPage;

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
