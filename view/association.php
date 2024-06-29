<?php
//ob_start permet la mise en mémoire de la sortie pour éviter les erreurs de lors de la redirection par un header location 
ob_start();
require_once "header.php";
//récupération de la class AssociationController et création de l'instance association
require_once "../controller/AssociationController.php";
//récupération et affichage des info d'association
$association = new AssociationController();
$asso = $association->afficher();
include "../view/afficher_association.php";
//boucle de selection ajouter/editer/supprimer association
if ($_GET) {
    if ($_GET['action'] == 'edit') {
        $association->editer($_GET['id'], $_GET['conducteur'], $_GET['vehicule']);
    } elseif ($_GET['action'] == 'delete') {
        $association->remove($_GET['id']);
    }
} else {
    $association->ajouter();
}
require_once "footer.html";
//envoie la mémoire , la vide et la desactive
ob_end_flush();
