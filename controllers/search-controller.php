<?php

//Model de la classe app.utilisateur
class Utilisateur extends Modele {
   
    public $id;
    public $identifiant;
    public $prenom;
    public $nom;
        
    private $table = 'app.utilisateur';
    
    public function fetchByIdentifiant() {

        if($this->identifiant != NULL || $this->identifiant != '')
        {
            $sql="SELECT * FROM ".$this->table." WHERE identifiant='".$this->identifiant."'";
            
            $result = $this->executerRequete($sql);
            $obj = $result->fetch(PDO::FETCH_OBJ);

            if($obj)
            {
                $this->id = $obj->idutilisateur;
                $this->prenom = $obj->prenom;
                $this->nom = $obj->nom;
                return $this;
            }
            else
            {
                return NULL;
            }
        }
        return NULL;
    }
    
    public function create()
    {
        if($this->identifiant != NULL)
        {
            $sql="INSERT INTO ".$this->table." (identifiant, prenom, nom) "
                . " VALUES ("
                . "'".$this->identifiant."',"
                . "'".$this->prenom."',"
                . "'".$this->nom."'"
                . ") RETURNING idutilisateur,identifiant, prenom, nom ";
            $result = $this->executerRequete($sql);
            if($result)
            {
                $obj = $result->fetch(PDO::FETCH_OBJ);
                $this->id = $obj->idutilisateur;
                $this->identifiant = $obj->identifiant;
                $this->prenom = $obj->prenom;
                $this->nom = $obj->nom;
                return $this;
            }
        }
        return NULL;
    }
}


?>