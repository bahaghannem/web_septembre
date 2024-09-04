<?php
class voiture {
    private $id_voiture;
    private $marque;
    private $annee;
    private $couleur;
    private $immatriculation;
    private $prix_location;
   
    
    public function __construct($id_voiture, $marque, $annee, $couleur, $immatriculation, $prix_location ) {
        $this->id_voiture = $id_voiture;
        $this->marque = $marque;
        $this->annee = $annee;
        $this->couleur = $couleur;
        $this->immatriculation = $immatriculation;
        $this->prix_location = $prix_location;
        
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
    
    public function getmarque()
    {
        return $this->marque;
    }
    public function setmarque($marque)
    {
        $this->marque= $marque;

        return $this;
    }
    
    public function getannee()
    {
        return $this->annee;
    }
    public function setannee($annee)
    {
        $this->annee= $annee;

        return $this;
    }
 
    
    public function getcouleur()
    {
        return $this->couleur;
    }
    public function setcouleur($couleur)
    {
        $this->couleur= $couleur;

        return $this;
    }
    public function getimmatriculation()
    {
        return $this->immatriculation;
    }
    public function setimmatriculation($immatriculation)
    {
        $this->immatriculation= $immatriculation;

        return $this;
    }
    public function getprix_location()
    {
        return $this->prix_location;
    }
    public function setprix_location($prix_location)
    {
        $this->prix_location= $prix_location;

        return $this;
    }
    
   
}
?>