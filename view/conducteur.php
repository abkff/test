<?php
//ob_start permet la mise en mémoire de la sortie pour éviter les erreurs de lors de la redirection par un header location 
ob_start();
require_once "header.php";
//récupération de la class ConducteurController et création de l'instance conducteur
require_once "../controller/ConducteurController.php";
$conducteur = new ConducteurController();
//récupération et affichage des info conducteur
$conduc = $conducteur->afficher();
include "afficher_conducteur.php";
//boucle de selection ajouter/editer/supprimer conducteur
if ($_GET) {
    if ($_GET['action'] == 'edit') {
        $conducteur->editer($_GET['id']);
    } elseif ($_GET['action'] == 'delete') {
        $conducteur->remove($_GET['id']);
    }
} else {
    $conducteur->ajouter();
}
require_once "footer.html";
//envoie la mémoire , la vide et la desactive
ob_end_flush();
