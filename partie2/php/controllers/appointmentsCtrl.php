<?php

$formError = array();
//fin déclaration des variables
// on verifie que le bouton submit a été clické
if (isset($_POST['registerAppointments'])) {
  // instanciation des objets nécéssaires
  $patient = new patient();
  $appointment = new appointments();
  $regexPatient = new checkForm();
  $regexAppointmentDate = new checkForm();
  $regexAppointmentHour = new checkForm();

  // vérification de validité de la date rentrée par l'user
  $regexAppointmentDate->postName = 'date';
  $regexAppointmentDate->value = $_POST['date'];
  if (!$regexAppointmentDate->checkPostValue()) {
    $formError[$regexAppointmentDate->postName] = $regexAppointmentDate->error;
  } else {
    // assignation de la valeur de l'attribut de l'objet de la regex dans l'objet patient
    $appointment->date = $regexAppointmentDate->value;
  }

  // vérification de validité de la date rentrée par l'user
  $regexAppointmentHour->postName = 'hourAppointments';
  $regexAppointmentHour->value = $_POST['hourAppointments'];
  if (!$regexAppointmentHour->checkPostValue()) {
    $formError[$regexAppointmentHour->postName] = $regexAppointmentHour->error;
  } else {
    // assignation de la valeur de l'attribut de l'objet de la regex dans l'objet patient
    $appointment->hour = $regexAppointmentHour->value;
  }

  // vérification de validité du patient rentrée par l'user
  $regexPatient->postName = 'patientId';
  (!empty($_POST['patientId']) ? $regexPatient->value = $_POST['patientId'] : '');
  if (!$regexPatient->checkPostValue()) {
    // assignation au array des erreurs l'erreur dédiée stockée dans l'objet regex
    $formError['patient'] = $regexPatient->error;
  } else {
    // assignation de la valeur de l'attribut de l'objet de la regex dans l'objet patient
    $patient->value = $regexPatient->value;
  }

  // insertion des données
  // si le tableau d'erreur est vide alors il n'y a pas d'erreur dédectée dans la valeur des input
  if (count($formError) == 0) {
    // On vérifie que le rendez-vous n'existe pas déjà dans la bdd
    $exists = $appointment->checkIfAppointmentExists();
    if ($exists->checkIfAppointmentExists == 0) {
      /* Si la méthode d'ajout de rdv renvoie true on affiche un message
       * de réussite dans la vue et on cache le formulaire */
      $appointment->registerNewAppointment();
    } else {
      $formError['appointments'] = 'Vous avez déjà un rendez-vous de programmé pour ce créneau';
    }
  }
}