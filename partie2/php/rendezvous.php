<?php
include_once 'php/models/patients.php';
include_once 'php/models/checkForm.php';
include_once 'php/controllers/profilPatientCtrl.php';

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
      <div class="container ">
        <div class="row h-100 justify-content-center text-center">
          <div class="col-lg-8 align-self-end">
            <h1 id="h1-list-patient" class="text-uppercase text-white font-weight-bold">H - Local Hostpital</h1>
            <hr class="divider my-4">
          </div>
          <div class="col-lg-8 align-self-baseline">
            <p class="text-white font-weight-light mb-5">Vous souhaitez vous enregistrer?</p>
            <a class="btn-xl js-scroll-trigger" id="btnScrollRegister" href="ajoutPatient.php">Enregistrez un patient</a>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-8 align-self-baseline justify-content-center">
            <h2 id="h2-list-patient"><strong>Informations</strong></h2>
            <p class="text-white font-weight-light mb-5 text-left">Retrouvez les informations d'un patient</p>
            <a class="btn-xl js-scroll-trigger mr-auto" id="btnBack" href="liste-patients.php">retour à la liste</a>
          </div>
          <div class="col-lg-8 align-self-baseline justify-content-center table-responsive">
            <table class="tableaux table-striped" id="infoPatienTable">
              <tr>
                <th>id</th>
                <th>Nom </th> 
                <th>Prénom </th> 
                <th>Date de naissance </th>  
                <th>Tél.</th>
                <th>E-mail</th>
              </tr>
              <tr>
                <td><?= $patientProfile->id ?></td>
                <td><?= $patientProfile->lastname ?></td>
                <td><?= $patientProfile->firstname ?></td>
                <td><?= $patientProfile->birthdate ?></td>
                <td><?= $patientProfile->phone ?></td>
                <td><?= $patientProfile->mail ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row h-100 justify-content-center">
          <div class="col-lg-4 align-self-baseline justify-content-center">
            <form action="#" method="POST">
              <fieldset>
                <legend>Patient</legend>
                <!--  lastname  -->
                <div class="form-group">
                  <label for="lastname">Nom de famille</label>
                  <input type="text" class="form-control <?= (empty($formError['lastname']) ? 'is-valid' : 'is-invalid') ?>" name="lastname" id="lastname" placeholder="Dupond" value="<?= (empty($_POST['lastname']) ? $patientProfile->lastname : $_POST['lastname']) ?>">
                  <?php if (isset($_POST['registerPatient']) && !empty($_POST['firstname'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                  <?php if (isset($formError['lastname'])) { ?><div class="feedback invalid-feedback"><?= $formError['lastname'] ?></div><?php } ?>
                </div>
                <!--  firtname  -->
                <div class="form-group">
                  <label for="firstname">Prénom</label>
                  <input type="text" class="form-control <?= (empty($formError['firstname']) ? 'is-valid' : 'is-invalid') ?>" name="firstname" id="firstname" placeholder="Jean" value="<?= (empty($_POST['firstname']) ? $patientProfile->firstname : $_POST['firstname']) ?>">
                  <?php if (isset($_POST['registerPatient']) && !empty($_POST['firstname'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                  <?php if (isset($formError['firstname'])) { ?><div class="feedback invalid-feedback"><?= $formError['firstname'] ?></div><?php } ?>
                </div>
                <!--  birthdate  -->
                <div class="form-group">
                  <label for="birthdate">Date de naissance</label>
                  <input type="date" class="form-control <?= (empty($formError['birthdate']) ? 'is-valid' : 'is-invalid') ?>" name="birthdate" id="birthdate" value="<?= (empty($_POST['birthdate']) ? $patientProfile->birthdateSql : $_POST['birthdate']) ?>">
                  <?php if (isset($_POST['registerPatient']) && !empty($_POST['birthdate']) && empty($formError['birthdate'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                  <?php if (isset($formError['birthdate'])) { ?><div class="feedback invalid-feedback"><?= $formError['birthdate'] ?></div><?php } ?>
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