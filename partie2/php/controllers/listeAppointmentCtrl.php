<?php

$appointment = new appointments();

if (isset($_POST['deleteAppointment'])) {
  $appointment->id = $_POST['deleteAppointment'];
  $appointment->deleteAppointment();
}

$appointmentList = $appointment->getAppointmentList();

