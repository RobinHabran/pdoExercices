<?php
include_once 'php/models/appointments.php';
include_once 'php/models/checkForm.php';
include_once 'php/controllers/appointment.php';
?>
<!doctype html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
    <!-- Icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- import Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <!-- css du projet -->
    <link rel="stylesheet" href="assets/css/home.css">
    <!-- js du projet -->
    <link rel="stylesheet" href="assets/js/home.js">
    <script src="https://kit.fontawesome.com/47162c995d.js" crossorigin="anonymous"></script>
    <!-- titre d'onglet -->
    <title>H - Cabinet Médical</title>
  </head>
  <body class="text-center" cz-shortcut-listen="true">
    <?php include 'navbar.php'; ?>
    <header class="masthead" id="page-top">
      <div class="container-fluid">
        <div class="row h-100 justify-content-center text-center">
          <div class="col-lg-10 align-self-end">
            <h1 id="h1-list-patient" class="text-uppercase text-white font-weight-bold">H - Local Hostpital</h1>
            <hr class="divider my-4">
          </div>
        </div>
        <div class="row h-100 justify-content-center text-center">
          <div class="col-lg-12 align-self-baseline justify-content-center">
            <p class="text-white font-weight-light mb-5 text-left">Retourner sur la liste des rendez-vous</p>
            <a class="btn-xl js-scroll-trigger mr-auto" id="btnBack" href="liste-patients.php">retour à la liste</a>
            <h2 id="h2-list-patient"><strong>Liste des rendez-vous</strong></h2>
            <p class="text-white font-weight-light mb-5 text-left">Retrouvez la liste des rendez-vous du patient</p>
            <div class="col-lg-8 align-self-baseline justify-content-center table-responsive">
              <table class="tableaux table-striped">
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Date</th> 
                  <th>Heure</th>
                </tr>
                <tr>
                  <td><?= $appointmentInfo->lastname ?></td>
                  <td><?= $appointmentInfo->firstname ?></td>
                  <td><?= $appointmentInfo->date ?></td>
                  <td><?= $appointmentInfo->hour ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="row h-100 justify-content-center">
          <div class="col-lg-8 align-self-baseline justify-content-center">
            <form action="#" method="POST">
              <fieldset>
                <legend>Patient</legend>
                <!--  date  -->
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" class="form-control <?= (empty($formError['date']) ? 'is-valid' : 'is-invalid') ?>" name="date" id="date" value="<?= (!empty($_POST['date']) ? $_POST['date'] : '') ?>">
                  <?php if (isset($_POST['registerAppointments']) && !empty($_POST['date'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                  <?php if (isset($formError['date'])) { ?><div class="feedback invalid-feedback"><?= $formError['date'] ?></div><?php } ?>
                </div>
                <!--  hourAppointments  -->
                <div class="form-group">
                  <label for="hourAppointments">Heure</label>
                  <input type="time" max="19:00" min="08:00" step=900 class="form-control <?= (empty($formError['hourAppointments']) ? 'is-valid' : 'is-invalid') ?>" name="hourAppointments" id="hourAppointments" value="<?= (!empty($_POST['hourAppointments']) ? $_POST['hourAppointments'] : '' ) ?>">
                  <?php if (isset($_POST['registerAppointments']) && !empty($_POST['hourAppointments']) && empty($formError['hourAppointments'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                  <?php if (isset($formError['hourAppointments'])) { ?><div class="feedback invalid-feedback"><?= $formError['hourAppointments'] ?></div><?php } ?>
                </div>
                <div class="d-flex align-items-end">
                  <input type="submit" class="btn btn-success" id="updateAppointment" name="updatePatient" py-5 value="valider" />
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </header>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>