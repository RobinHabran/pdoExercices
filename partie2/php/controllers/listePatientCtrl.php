<?php

$patients = new patient();

if (isset($_POST['deletePatient'])) {
  if ($_POST['deletePatient']) {
    $patients->id = $_POST['deletePatient'];
    $patients->deletePatient();
  }
}

$patientsList = $patients->getPatientsList();
