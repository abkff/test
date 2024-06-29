<?php
require_once "iCRUD.php";
require_once "Connection.php";

class Vehicule extends Connection implements iCRUD
{
    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;
    private $photo;

    public function getmarque()
    {
        return $this->marque;
    }

    public function getmodele()
    {
        return $this->modele;
    }
    public function getcouleur()
    {
        return $this->couleur;
    }
    public function getimmatriculation()
    {
        return $this->immatriculation;
    }
    public function getPhoto()
    {
        return $this->photo;
    }

    public function setmarque($marque)
    {
        return $this->marque = $marque;
    }

    public function setmodele($modele)
    {
        return $this->modele = $modele;
    }
    public function setcouleur($couleur)
    {
        return $this->couleur = $couleur;
    }
    public function setimmatriculation($immatriculation)
    {
        return $this->immatriculation = $immatriculation;
    }
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }


    public function __toString()
    {
        return $this->getmarque() . " " . $this->getmodele();
    }
    public function create($donnees, $table)
    {
        $db = Connection::getConnect();

        $champs = "";
        $valeurs = "";

        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice;
            if($indice == "immatriculation"){
                $valeur = strtoupper($valeur);
            }
            $valeurs .= ($valeurs ? "," : "") . "'$valeur'";
        }

        $sql = $db->prepare("INSERT INTO $table ($champs)  VALUES ($valeurs)");
        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }

    public function read($table)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT * FROM $table");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function edit($donnees, $id, $table)
    {
        $db = Connection::getConnect();
        $champs = "";
        foreach ($donnees as $indice => $valeur) {
            $champs .= ($champs ? "," : "") . $indice . "=" . "'$valeur'";
        }

        $sql = $db->prepare("UPDATE $table SET $champs WHERE id=$id");

        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }
    public function delete($id, $table)
    {
        $db = Connection::getConnect();

        $sql = $db->prepare("delete from $table where id=$id");

        if ($sql->execute()) {
            //REDIRECTION SUR LA MM PAGE
            header('Location:' . $_SERVER['PHP_SELF']);
        }
    }

    public function readVehiculeLibre()
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT vtc_vehicule.*
        FROM vtc_vehicule
        LEFT JOIN vtc_association ON vtc_vehicule.id = vtc_association.vehicule
        WHERE vtc_association.vehicule IS NULL;");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editVehiculeLibre($id)
    {
        $db = Connection::getConnect();
        $sql = $db->prepare("SELECT vtc_vehicule.*
        FROM vtc_vehicule
        LEFT JOIN vtc_association ON vtc_vehicule.id = vtc_association.vehicule
        WHERE vtc_association.vehicule IS NULL OR vtc_vehicule.id=$id;");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
