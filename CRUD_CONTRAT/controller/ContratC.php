<?php
require '../config.php';
class contratC
{
    public function listeContrats()
    {
        $sql = "SELECT * FROM contrat ";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteContrat($id_contrat)
    {
        $sql = "DELETE FROM contrat WHERE id_contrat = :id_contrat";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_contrat', $id_contrat);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function addContrat($contrat)
    {
        $sql = "INSERT INTO contrat
        VALUES (:id_contrat ,:id_voiture, :id_client, :dateDebut, :dateFin, :montant )";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_contrat' => $contrat->getid_contrat(),
                'id_voiture' => $contrat->getid_voiture(),
                'id_client' => $contrat->getid_client(),
                'dateDebut' => $contrat->getdateDebut(),
                ':dateFin' => $contrat->getdateFin(),
                'montant' => $contrat->getmontant(),
               
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showContrat($id_contrat)
    {
        $sql = "SELECT * from contrat where id_contrat = $id_contrat";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $contrat = $query->fetch();
            return $contrat;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updateContrat($contrat, $id_contrat)
    {   
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE contrat SET 
                    id_voiture = :id_voiture, 
                    id_client = :id_client,
                    dateDebut = :dateDebut,
                    dateFin= :dateFin, 
                    montant = :montant
                    
                WHERE id_contrat= :id_contrat'
            );
            
            $query->execute([
                'id_contrat' => $id_contrat,
                'id_voiture' => $contrat->getid_voiture(),
                'id_client' => $contrat->getid_client(),
                'dateDebut' => $contrat->getdateDebut(),
                'dateFin' => $contrat->getdateFin(),
                'montant' => $contrat->getmontant(),
                
                
            ]);
            
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}