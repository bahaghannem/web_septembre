<?php
class contrat {
    private $id_contrat;
    private $id_voiture;
    private $id_client;
    private $dateDebut;
    private $dateFin;
    private $montant;

    
    public function __construct($id_contrat,$id_voiture, $id_client, $dateDebut, $dateFin, $montant ) {
        $this->id_contrat = $id_contrat;
        $this->id_voiture = $id_voiture;
        $this->id_client = $id_client;
        $this->dateDebut= $dateDebut;
        $this->dateFin = $dateFin;
        $this->montant = $montant;
        
        
    }


    public function getid_contrat()
    {
        return $this->id_contrat;
    }
    public function setid_contrat($id_contrat)
    {
        $this->id_contrat= $id_contrat;

        return $this;
    }
    
    public function getid_voiture()
    {
        return $this->id_voiture;
    }
    public function setid_voiture($id_voiture)
    {
        $this->id_voiture= $id_voiture;

        return $this;
    }
    
    public function getid_client()
    {
        return $this->id_client;
    }
    public function setid_client($id_client)
    {
        $this->id_client= $id_client;

        return $this;
    }
    
    public function getdateDebut()
    {
        return $this->dateDebut;
    }
    public function setdateDebut($dateDebut)
    {
        $this->dateDebut= $dateDebut;

        return $this;
    }
 
    
    public function getdateFin()
    {
        return $this->dateFin;
    }
    public function setdateFin($dateFin)
    {
        $this->dateFin= $dateFin;

        return $this;
    }
    public function getmontant()
    {
        return $this->montant;
    }
    public function setmontant($montant)
    {
        $this->montant= $montant;

        return $this;
    }
   
    
   
}
?>