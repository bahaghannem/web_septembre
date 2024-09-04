<?php
require '../config.php';
class utilisateurU
{
    public function listeUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteUtilisateur($id_utilisateur)
{
    if (!is_numeric($id_utilisateur) || $id_utilisateur <= 0) {
        throw new Exception("Invalid id_utilisateur value: " . $id_utilisateur);
    }

    $sql = "DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id_utilisateur', $id_utilisateur);

    try {
        $result = $req->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}

    public function addUtilisateur($utilisateur)
    {
        $sql = "INSERT INTO utilisateur 
        VALUES (:id_utilisateur, :nom,  :prenom, :email, :mdp , :role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_utilisateur' => $utilisateur->getid_utilisateur(),
                'nom' => $utilisateur->getNom(), 
                'prenom' => $utilisateur->getPrenom(),
                'email' => $utilisateur->getEmail(),
                'mdp' => $utilisateur->getMotDePasse(),
                'role' => $utilisateur->getRole(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showUtilisateur($id_utilisateur)
    {
        $sql = "SELECT * from utilisateur where id_utilisateur = $id_utilisateur";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $utilisateur = $query->fetch();
            return $utilisateur;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updateUtilisateur($utilisateur, $id_utilisateur)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateur SET 
                nom = :nom, 
                prenom = :prenom,
                email = :email, 
                mdp = :mdp,
                role = :role
            WHERE id_utilisateur= :id_utilisateur'
        );
        
        $query->execute([
            'id_utilisateur' => $id_utilisateur,
            'nom' => $utilisateur->getNom(),
            'prenom' => $utilisateur->getPrenom(),
            'email' => $utilisateur->getEmail(),
            'mdp' => $utilisateur->getMotDePasse(),
            'role' => $utilisateur->getRole()
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
}