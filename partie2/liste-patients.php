<?php
include_once 'php/models/patients.php';
include_once 'php/controllers/listePatientCtrl.php';
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
          <div class="col-lg-10 align-self-end">
            <h1 id="h1-list-patient" class="text-uppercase text-white font-weight-bold">H - Local Hostpital</h1>
            <hr class="divider my-4">
          </div>
          <div class="col-lg-8 align-self-baseline ">
            <div class="row h-100 justify-content-center text-center rowLink">
              <div class="col-lg-6 align-self-baseline">
                <p class="text-white font-weight-light mb-5">Vous souhaitez vous enregistrer?</p>
                <a class="btn-xl js-scroll-trigger" id="btnScrollRegister" href="ajoutPatient.php">Enregistrez un patient</a>
              </div>
              <div class="col-lg-6 align-self-baseline">
                <p class="text-white font-weight-light mb-5">Voir la liste des rendez-vous</p>
                <a class="btn-xl" id="btnBack" href="listeRendezvous.php">Liste des rendez-vous</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row h-100 justify-content-center">=
          <div class="col-lg-10 align-self-baseline justify-content-center table-responsive">
            <div class="row h-100 headerForm">
              <div class="col-lg-6 align-self-baseline titleHeadForm">
                <h2 id="h2-list-patient"><strong>Liste des patients</strong></h2>
                <p class="text-white font-weight-light mb-2 text-left">Retrouvez la liste des patients</p>
              </div>
              <div class="col-lg-6 align-self-baseline searchHeadForm">
                <form  action="#" method="POST" id="searchForm">
                  <label for="searchPatientInput">Rechercher un patient</label>
                  <input type="text" placeholder="Jean BENOIT" name="searchPatientInput" id="searchPatientInput" </>
                  <button title="rechercher" type="submit" name="searchPatient" value="" id="searchPatient" class="fa fa-search btn btn-success"></button>
                </form>
              </div>
            </div>
            <table class="tableaux table-striped">
              <tr>
                <th>Nom </th> 
                <th>Prénom </th> 
                <th>Date de naissance </th>  
                <th>Infos</th>
                <th>Supprimer</th>
              </tr>
              <?php
              foreach ($patientsList as $patient) {
              ?>
              <tr>
                <td><?= $patient->lastname ?></td>
                <td><?= $patient->firstname ?></td>
                <td><?= $patient->birthdate ?></td>
                <td> <a href="profil-patient.php?id=<?= $patient->id ?>"><i class="fas fa-plus btn btn-success"></i></a> </td>
              <form action="#" method="POST">
                <td>
                  <button type="submit" name="deletePatient" value="<?= $patient->id ?>" id="deletePatient" class="fas fa-trash-alt btn btn-danger"></button>
                </td>
              </form>
              </tr>
              <?php
              }
              ?>
            </table>
          </div>
        </div>
      </div>
    </header>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>