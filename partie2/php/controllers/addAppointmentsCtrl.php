<?php

$formError = array();
//fin déclaration des variables
// on verifie que le bouton submit a été clické
if (isset($_POST['registerAppointments'])) {
  // instanciation des objets nécéssaires
  $formError = array();
  $regex = new checkForm();
  $regexPatient = new checkForm();
  $patient = new patient();
  $appointment = new appointments();

  foreach ($_POST as $postName => $value) {
    if ($postName != 'registerAppointments') {
      // j'assigne ma valeur $postname correspondant au name de l'input à l'attribut $regex->postName
      $regex->postName = $postName;
      // j'assigne ma valeur $value correspondant au name de l'input à l'attribut $regex->postName
      $regex->value = $value;
      // test si la valeur respecte la syntaxe de la regex
      if (!$regex->checkPostValue()) {
        // assignation au array des erreurs l'erreur dédiée stockée dans l'objet regex
        $formError[$postName] = $regex->error;
      } else {
        // assignation de la valeur de l'attribut de l'objet de la regex dans l'objet appointment
        $appointment->$postName = $regex->value;
        if ($postName == 'date') {
          $appointment->date = $regex->value;
        } elseif ($postName == 'hourAppointments') {
          $appointment->hour = $regex->value;
        } elseif ($postName == 'idPatients') {
          $appointment->idPatients = $regex->value;
        }
      }
    }
  }
  // insertion des données
  // si le tableau d'erreur est vide alors il n'y a pas d'erreur dédectée dans la valeur des input
  if (count($formError) == 0) {
    // On vérifie que le rendez-vous n'existe pas déjà dans la bdd
    $appointmentInfo = $appointment->getInfoAppointment();
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