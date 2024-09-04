<?php
class utilisateur {
    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $role;
    
    public function __construct($id_utilisateur, $nom, $prenom,$email, $mdp,$role) {
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->role = $role;
    }
    
    public function getid_utilisateur()
    {
        return $this->id_utilisateur;
    }
    public function setid_p($id_utilisateur)
    {
        $this->id_utilisateur= $id_utilisateur;

        return $this;
    }
    
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom= $nom;

        return $this;
    }
    
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom= $prenom;

        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email= $email;

        return $this;
    }
    public function getMotDePasse()
    {
        return $this->mdp;
    }
    public function setMotDePasse($mdp)
    {
        $this->mdp= $mdp;

        return $this;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role= $role;

        return $this;
    }
}
?>