<?php

require_once "../model/Vehicule.php";
require_once "../libs/ImageManager.php";

class VehiculeController
{

    public function ajouter()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!$_GET) {
                $vehicule  = new vehicule();

                if ($_FILES['photo']['size'] == 0) {
                    $vehicule->create($_POST, 'vtc_vehicule');
                } else {
                    $image = new ImageManager($_FILES['photo']);
                    if ($image == null) {
                        echo $image->GetError();
                    } else {
                        $image->moveImageToFolder();
                        $dataArray = array(
                            'marque' => $_POST['marque'],
                            'modele' => $_POST['modele'],
                            'couleur' => $_POST['couleur'],
                            'immatriculation' => $_POST['immatriculation'],
                            'photo' => $image->getImageInfo()['uniqueName']
                        );

                        $vehicule->create($dataArray, "vtc_vehicule");
                    }
                }
            }
        }

        require_once "../view/ajout_vehicule.html";
    }


    public function afficher()
    {
        $vehicule  = new vehicule();
        return $vehicule->read("vtc_vehicule");
    }

    public function editer($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_GET) {
                $vehicule  = new vehicule();
                if ($_FILES['photo']['size'] == 0) {
                    return $vehicule->edit($_POST, $id, "vtc_vehicule");
                } else {
                    $image = new ImageManager($_FILES['photo']);
                    if ($image == null) {
                        echo $image->GetError();
                    } else {
                        $image->moveImageToFolder();
                        $dataArray = array(
                            'marque' => $_POST['marque'],
                            'modele' => $_POST['modele'],
                            'couleur' => $_POST['couleur'],
                            'immatriculation' => $_POST['immatriculation'],
                            'photo' => $image->getImageInfo()['uniqueName']
                        );

                        return $vehicule->edit($dataArray, $id, "vtc_vehicule");
                    }
                }
            }
        }
        require_once "../view/editer_vehicule.php";
    }

    public function remove($id)
    {

        if ($_GET['action'] == "delete") {
            $vehicule  = new vehicule();
            return $vehicule->delete($id, 'vtc_vehicule');
        }
    }
}
