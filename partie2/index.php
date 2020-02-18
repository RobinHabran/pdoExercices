<?php
include_once 'php/models/patients.php';
include_once 'php/controllers/ajoutPatientCtrl.php';
include_once 'php/controllers/appointmentsCtrl.php';
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
  <body class="text-center" cz-shortcut-listen="true">
    <?php include 'navbar.php'; ?>
    <header class="masthead" id="page-top">
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center ">
          <div class="col-lg-10 align-self-end">
            <h1 class="text-uppercase text-white font-weight-bold">H - Local Hostpital</h1>
            <hr class="divider my-4">
          </div>
        </div>
        <div class="row align-self-end link-row">
          <div class="col-lg-4 offset-lg-2 align-self-baseline">
            <p class="text-white font-weight-light mb-5">Vous êtes nouveau sur la plateforme?</p>
            <a class="btn-xl js-scroll-trigger" id="btnScrollRegister" href="ajoutPatient.php">Enregistrez un patient</a>
          </div>
          <div class="col-lg-4 align-self-baseline">
            <p class="text-white font-weight-light mb-5">Retrouvez la liste des patients</p>
            <a class="btn-xl js-scroll-trigger" id="btnScrollRegister" href="liste-patients.php">apercu des patients</a>
          </div>
        </div>
        <div class="row align-self-end link-row">
          <div class="col-lg-4 offset-lg-2 align-self-baseline">
            <p class="text-white font-weight-light mb-5">Enregistrez un rendez-vous</p>
            <a class="btn-xl js-scroll-trigger" id="btnScrollRegister" href="ajoutRendezvous.php">Prendre rendez-vous</a>
          </div>
          <div class="col-lg-4 align-self-baseline">
            <p class="text-white font-weight-light mb-5">Retrouvez la liste des rendez-vous</p>
            <a class="btn-xl js-scroll-trigger" id="btnScrollRegister" href="liste-rendezvous.php">Apercu des rendez-vous</a>
          </div>
        </div>
        
      </div>
    </header>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="assets/js/home.js" />
  </body>
</html>