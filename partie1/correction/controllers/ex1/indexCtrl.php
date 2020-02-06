<?php
/* instanciation de l'objet client */
$clients = new clients();
/* récupère le retour de la méthode de l'objet client */
$clientsList = $clients->getUserListOrderByLastname();
