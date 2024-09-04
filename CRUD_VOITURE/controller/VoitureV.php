<?php
require '../config.php';
class voitureV
{
    public function listeVoitures()
    {
        $sql = "SELECT * FROM voiture ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteVoiture($id_voiture)
    {
        $sql = "DELETE FROM voiture WHERE id_voiture = :id_voiture";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_voiture', $id_voiture);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addVoiture($voiture)
    {
        $sql = "INSERT INTO voiture
        VALUES (:id_voiture, :marque, :annee, :couleur, :immatriculation, :prix_location )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_voiture' => $voiture->getid_voiture(),
                'marque' => $voiture->getmarque(),
                'annee' => $voiture->getannee(),
                'couleur' => $voiture->getcouleur(),
                'immatriculation' => $voiture->getimmatriculation(),
                'prix_location' => $voiture->getprix_location(),
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showVoiture($id_voiture)
    {
        $sql = "SELECT * from voiture where id_voiture = $id_voiture";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $voiture = $query->fetch();
            return $voiture;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updateVoiture($voiture, $id_voiture)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE voiture SET 
                    marque = :marque, 
                    annee = :annee,
                    couleur = :couleur,
                    immatriculation= :immatriculation, 
                    prix_location = :prix_location
                    
                WHERE id_voiture= :id_voiture'
            );
            
            $query->execute([
                'id_voiture' => $id_voiture,
                'marque' => $voiture->getmarque(),
                'annee' => $voiture->getannee(),
                'couleur' => $voiture->getcouleur(),
                'immatriculation' => $voiture->getimmatriculation(),
                'prix_location' => $voiture->getprix_location(),
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}