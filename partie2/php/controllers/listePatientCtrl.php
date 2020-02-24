<?php

$patients = new patient();

if (isset($_POST['deletePatient'])) {
  if ($_POST['deletePatient']) {
    $patients->id = $_POST['deletePatient'];
    $patients->deletePatient();
  }
}

if (isset($_POST['searchPatient'])) {
  if (!empty($_POST['searchPatientInput'])) {
    $patients->lastname = $patients->firstname = $patients->mail = $patients->phone = '%' . htmlspecialchars($_POST['searchPatientInput']) . '%';
    $patientList = $patients->searchPatient();
  }
} else {
  $patientsList = $patients->getPatientsList();
}
