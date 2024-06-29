<?php

require_once '../model/Association.php';
require_once '../model/Conducteur.php';
require_once '../model/Vehicule.php';

class AdminController
{

    public function afficherConducteurs()
    {
        $conducteurInstance = new Conducteur();

        return $conducteurInstance->read("vtc_conducteur");

    }

    public function afficherVehicules()
    {
        $vehiculeInstance = new Vehicule();

        return $vehiculeInstance->read("vtc_vehicule");
    }

    public function afficherAssociation()
    {
        $associationInstance = new Association();

        return $associationInstance->read("vtc_association");
    }

    public function afficherVehiculeLibre()
    {
        $vehiculeInstance = new Vehicule();

        //en attente d'implementation
        //return array
        $vehiculeLibre = $vehiculeInstance->readVehiculeLibre();

        return $vehiculeLibre;

    }

    public function afficherConducteurLibre()
    {
        $conducteurInstance = new Conducteur();

        //en attente d'implementation
        //return array
        $conducteurLibre = $conducteurInstance->readConducteurLibre();

        return $conducteurLibre;
    }
}