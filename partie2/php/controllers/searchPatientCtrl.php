<?php

if (isset($_POST['searchPatient'])) {

  $patient = new patient();
  
  $patient->searchTyped = htmlspecialchars($_POST['searchPatientInput']);

  $searchPatientList = $patient->searchPatient();
}