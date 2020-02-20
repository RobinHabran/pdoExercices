<?php
include_once 'php/models/patients.php';
include_once 'php/models/checkForm.php';
include_once 'php/controllers/ajoutPatientCtrl.php';
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
    <!-- titre d'onglet -->
    <title>H - Cabinet Médical</title>
  </head>
  <body cz-shortcut-listen="true">
    <?php include 'navbar.php'; ?>
    <!-- form patient Section -->
    <div id="container">
      <section class="page-section" id="patient">
        <div class="container" id="containerPatient">
          <div class="row h-100 justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
              <h1 id="h1-list-patient" class="text-uppercase text-white font-weight-bold">H - Local Hostpital</h1>
              <hr class="divider my-4">
            </div>
            <div class="col-lg-8 align-self-baseline ">
              <div class="row h-100 justify-content-center text-center rowLink">
                <div class="col-lg-6 align-self-baseline">
                  <p class="text-white font-weight-light mb-5">Voir la liste des patients</p>
                  <a class="btn-xl" id="btnBack" href="liste-patients.php">Liste des patients</a>
                </div>
                <div class="col-lg-6 align-self-baseline">
                  <p class="text-white font-weight-light mb-5">Voir la liste des rendez-vous</p>
                  <a class="btn-xl js-scroll-trigger" id="btnScrollRegister" href="listeRendezvous.php.php">Liste des rendez-vous</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div id="formPatient">
                <h2 class="text-white mt-0">Enregistrez vous comme patient</h2>
                <p class="text-white-50 mb-4">Renseignez vos informations personnelles afin de vous enregistrer</p>
                <?php if (isset($_POST['registerPatient']) && (count($formError) == 0) && (!isset($insertError))) { ?>
                  <div class="col-12 validationRegisterSuccess">
                    <p>Votre compte a été enregistré avec succès</p>
                  </div>
                <?php } else {
                  if (isset($insertError)) {
                    ?><div class="feedback valid-feedback patientExist"><?= $insertError ?></div><?php }
              ?>
                  <form action="#" method="POST">
                    <fieldset>
                      <legend>Patient</legend>
                      <!--  lastname  -->
                      <div class="form-group text-left">
                        <label for="lastname">Nom de famille</label>
                        <input type="text" class="form-control <?= (empty($formError['lastname']) ? 'is-valid' : 'is-invalid') ?>" name="lastname" id="lastname" placeholder="Dupond" value="<?= (!empty($_POST['lastname']) ? $_POST['lastname'] : '') ?>">
                        <?php if (isset($_POST['registerPatient']) && !empty($_POST['firstname'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
  <?php if (isset($formError['lastname'])) { ?><div class="feedback invalid-feedback"><?= $formError['lastname'] ?></div><?php } ?>
                      </div>
                      <!--  firtname  -->
                      <div class="form-group text-left">
                        <label for="firstname">Prénom</label>
                        <input type="text" class="form-control <?= (empty($formError['firstname']) ? 'is-valid' : 'is-invalid') ?>" name="firstname" id="firstname" placeholder="Jean" value="<?= (!empty($_POST['firstname']) ? $_POST['firstname'] : '') ?>">
                        <?php if (isset($_POST['registerPatient']) && !empty($_POST['firstname'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
  <?php if (isset($formError['firstname'])) { ?><div class="feedback invalid-feedback"><?= $formError['firstname'] ?></div><?php } ?>
                      </div>
                      <!--  birthdate  -->
                      <div class="form-group text-left">
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" class="form-control <?= (empty($formError['birthdate']) ? 'is-valid' : 'is-invalid') ?>" name="birthdate" id="birthdate" value="<?= (!empty($_POST['birthdate']) ? $_POST['birthdate'] : '') ?>">
                        <?php if (isset($_POST['registerPatient']) && !empty($_POST['birthdate']) && empty($formError['birthdate'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
  <?php if (isset($formError['birthdate'])) { ?><div class="feedback invalid-feedback"><?= $formError['birthdate'] ?></div><?php } ?>
                      </div>
                      <!--  numéro de téléphone  -->
                      <div class="form-group text-left">
                        <label for="phone">Tél.</label>
                        <input type="text" class="form-control <?= (empty($formError['phone']) ? 'is-valid' : (isset($_POST['phone']) ? 'is-invalid' : '')) ?>" name="phone" id="phone" placeholder="06 25 63 49 75" value="<?= (!empty($_POST['phone']) ? $_POST['phone'] : '') ?>">
                        <?php if (isset($_POST['registerPatient']) && !empty($_POST['phone']) && empty($formError['phone'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
  <?php if (isset($formError['phone'])) { ?><div class="feedback invalid-feedback"><?= $formError['phone'] ?></div><?php } ?>
                      </div>
                      <!--  e-mail  -->
                      <div class="form-group text-left">
                        <label for="mail">E-mail</label>
                        <input type="mail" class="form-control <?= (empty($formError['mail']) ? 'is-valid' : 'is-invalid') ?>" name="mail" id="mail" aria-describedby="mailHelp" placeholder="jb.dupond@gmail.com" value="<?= (!empty($_POST['mail']) ? $_POST['mail'] : '') ?>">
                        <?php if (isset($_POST['registerPatient']) && !empty($_POST['mail']) && empty($formError['mail'])) { ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
  <?php if (isset($formError['mail'])) { ?><div class="feedback invalid-feedback"><?= $formError['mail'] ?></div><?php } ?>
                        <small id="mailHelp" class="form-text">Vous seul aurez vu de votre e-mail.</small>
                      </div>
                      <div class="row justify-content-end">
                        <input type="submit" class="btn btn-success" id="registerPatient" name="registerPatient" py-5 value="S'enregistrer" />
                      </div>
                    </fieldset>
                  </form>
<?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="assets/js/home.js" />
  </body>
</html>