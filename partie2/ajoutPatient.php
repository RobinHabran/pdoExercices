<?php
include_once 'php/controllers/index.php';
include_once 'php/models/patients.php';
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
            <div class="col-lg-8">
              <div id="formPatiet">
                <h2 class="text-white mt-0">Enregistrez vous comme patient</h2>
                <p class="text-white-50 mb-4">Renseignez vos informations personnelles afin de vous enregistrer</p>
                <form >
                  <fieldset>
                    <legend>Patient</legend>
                    <!--  lastname  -->
                    <div class="form-group has-success">
                      <label for="inputLastname">Nom</label>
                      <input type="text" class="form-control is-valid" id="inputLastname" placeholder="Jean" value="">
                      <div class="feedback valid-feedback">Champ renseigné avec succès</div>
                    </div>
                    <!--  firtname  -->
                    <div class="form-group has-danger">
                      <label for="inputCellNumber">Prénom</label>
                      <input type="text" class="form-control is-invalid" id="inputCellNumber" placeholder="Dupond" value="">
                      <div class="feedback invalid-feedback">Veuillez renseigner ce champ</div>
                    </div>
                    <!--  birthDate  -->
                    <div class="form-group">
                      <label for="birthDate">Date de naissance</label>
                      <input type="date" class="form-control" id="birthDate" value="">
                    </div>
                    <!--  numéro de téléphone  -->
                    <div class="form-group">
                      <label for="inputCellPhone">Tél.</label>
                      <input type="text" class="form-control" id="inputCellPhone" placeholder="06 25 63 49 75" value="">
                    </div>
                    <!--  e-mail  -->
                    <div class="form-group">
                      <label for="exampleInputEmail">E-mail</label>
                      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="jb.dupond@gmail.com" value="">
                      <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="d-flex align-items-end">
                      <input type="submit" class="btn btn-success" py-5 value="Submit" />
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>