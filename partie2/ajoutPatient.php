<?php
include_once 'php/models/patients.php';
include_once 'php/checkForm.php';
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
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div id="formPatiet">
                <h2 class="text-white mt-0">Enregistrez vous comme patient</h2>
                <p class="text-white-50 mb-4">Renseignez vos informations personnelles afin de vous enregistrer</p>
                <?php if(isset($_POST['registerPatient']) && count($formError) == 0){ ?>
                <div class="col-lg-6">
                  <p>Votre compte a bien été enregistré.</p>
                </div>
                <?php }else{ 
                  if(isset($insertError)){ ?><div class="feedback valid-feedback"><?= $insertError ?></div><?php }
                ?>
                  <form action="#" method="POST">
                  <fieldset>
                    <legend>Patient</legend>
                    <!--  lastname  -->
                    <div class="form-group">
                      <label for="lastname">Nom</label>
                      <input type="text" class="form-control is-valid" name="lastname" id="lastname" placeholder="Jean" value="">
                      <?php if(isset($_POST['registerPatient']) && count($formError) == 0){ ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                      <?php if(isset($formError['firstname'])){ ?><div class="feedback invalid-feedback"><?= $formError['firstname'] ?></div><?php } ?>
                    </div>
                    <!--  firtname  -->
                    <div class="form-group has-danger">
                      <label for="firstname">Prénom</label>
                      <input type="text" class="form-control is-invalid" name="firstname" id="firstname" placeholder="Dupond" value="">
                      <?php if(isset($_POST['registerPatient']) && count($formError) == 0){ ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                      <?php if(isset($formError['lastname'])){ ?><div class="feedback invalid-feedback"><?= $formError['lastname'] ?></div><?php } ?>
                    </div>
                    <!--  birthDate  -->
                    <div class="form-group">
                      <label for="birthDate">Date de naissance</label>
                      <input type="date" class="form-control" name="birthDate" id="birthDate" value="">
                      <?php if(isset($_POST['registerPatient']) && count($formError) == 0){ ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                      <?php if(isset($formError['birthDate'])){ ?><div class="feedback invalid-feedback"><?= $formError['birthDate'] ?></div><?php } ?>
                    </div>
                    <!--  numéro de téléphone  -->
                    <div class="form-group">
                      <label for="cellNumber">Tél.</label>
                      <input type="text" class="form-control" name="cellNumber" id="cellNumber" placeholder="06 25 63 49 75" value="">
                      <?php if(isset($_POST['registerPatient']) && count($formError) == 0){ ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                      <?php if(isset($formError['cellNumber'])){ ?><div class="feedback invalid-feedback"><?= $formError['cellNumber'] ?></div><?php } ?>
                    </div>
                    <!--  e-mail  -->
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="jb.dupond@gmail.com" value="">
                      <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                      <?php if(isset($_POST['registerPatient']) && count($formError) == 0){ ?><div class="feedback valid-feedback">Champ renseigné avec succès</div><?php } ?>
                      <?php if(isset($formError['email'])){ ?><div class="feedback invalid-feedback"><?= $formError['email'] ?></div><?php } ?>
                    </div>
                    <div class="d-flex align-items-end">
                      <input type="submit" class="btn btn-success" id="registerPatient" name="registerPatient" py-5 value="S'enregistrer" />
                    </div>
                  </fieldset>
                </form>
                <?php }?>
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