<?php
include '../controller/utilisateurU.php';
$utilisateurU = new utilisateurU();

if (isset($_GET['id_utilisateur']) && !empty($_GET['id_utilisateur'])) {
    $id_utilisateur = $_GET['id_utilisateur'];
    if ($utilisateurU->deleteUtilisateur($id_utilisateur)) {
        header('location:listeUtilisateurs.php');
    } else {
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
} else {
    echo "Error: id_utilisateur parameter is missing.";
}
?>