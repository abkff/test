<?php
//ob_start permet la mise en mémoire de la sortie pour éviter les erreurs de lors de la redirection par un header location 
ob_start();
require_once "header.php";
//récupération de la class VehiculeController et création de l'instance vehicule
require_once "../controller/VehiculeController.php";
$vehicule = new VehiculeController();
//récupération et affichage des info voiture
$voiture = $vehicule->afficher();
include "../view/afficher_vehicule.php";
//boucle de selection ajouter/editer/supprimer vehicule
if ($_GET) {
    if ($_GET['action'] == 'edit') {
        $vehicule->editer($_GET['id']);
    } elseif ($_GET['action'] == 'delete') {
        $vehicule->remove($_GET['id']);
    }
} else {
    $vehicule->ajouter();
}
require_once "footer.html";
//envoie la mémoire , la vide et la desactive
ob_end_flush();
