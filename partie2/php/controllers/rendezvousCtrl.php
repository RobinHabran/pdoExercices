<?php

if (!empty($_GET['id'])) {
  //ne pas oublier d'instancier l'objet
  $appointment = new appointments;

//on réassigne notre attribut id ci-dessous
  if (preg_match('/^[0-9]+$/', $_GET['id'])) {
    $appointment->id = htmlspecialchars($_GET['id']);
    $appointmentCount = $appointment->checkIfappointmentExistsById();
    if ($appointmentCount->exists == 1) {
      // update appointment
      // on verifie que le bouton submit a été clické
      if (isset($_POST['updateappointment'])) {
        // instanciation des objets nécéssaires
        $formError = array();
        $regex = new checkForm();

        foreach ($_POST as $postName => $value) {
          if ($postName != 'updateappointment') {
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
            }
          }
        }
        // insertion des données
        // si le tableau d'erreur est vide alors il n'y a pas d'erreur dédectée dans la valeur des input
        if (count($formError) == 0) {
          // vérification si le appointment existe
          $isappointmentExist = $appointment->checkIfappointmentExists();
          if (!$isappointmentExist->appointmentExist) {
            // cas où le appointment n'existe pas encore en base de donnée
            // alors j'appel la méthode qui envoi les valeur dans la bd
            $appointmentUpdate = $appointment->updateAppointment();
          }
        }
      }
      $appointmentProfile = $appointment->getappointmentProfile();
    } else {
      header('location:liste-appointments.php');
      exit;
    }
  } else {
    header('location:liste-appointments.php');
    exit;
  }
} else {
  header('location:liste-appointments.php');
  exit;
}


