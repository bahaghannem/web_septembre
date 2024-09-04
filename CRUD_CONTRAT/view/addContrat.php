<?php
include '../controller/ContratC.php';
include '../model/Contrat.php';
$contrat = NULL;
$contratC= new contratC();

if (
    isset($_POST['id_contrat']) && isset($_POST['id_voiture']) && isset($_POST['id_client']) && isset($_POST['dateDebut']) && isset($_POST['dateFin']) && isset($_POST['montant']) )
 {
    if (!empty($_POST['id_contrat']) && !empty($_POST['id_voiture']) && !empty($_POST['id_client']) && !empty($_POST['dateDebut']) && !empty($_POST['dateFin']) && !empty($_POST['montant'])) {
        $contrat = new contrat($_POST['id_contrat'], $_POST['id_voiture'], $_POST['id_client'], $_POST['dateDebut'], $_POST['dateFin'], $_POST['montant']);
        $contratC->addContrat($contrat);
        header('location:listeContrats.php');
    } else {
        $error = "Informations manquantes";
    }
}
?>

<html>
<head>
    <title>contrat</title>
</head>
<body>
    <a href="listeContrats.php">Retour à la liste</a>

    <form action="" method="POST">
        <h1>ajouter un contrat</h1>
        <input type="int" placeholder="id_contrat" id="id_contrat" name="id_contrat">
        <input type="int" placeholder="id_voiture" id="id_voiture" name="id_voiture">
        <input type="int" placeholder="id_client" id="id_client" name="id_client">
        <input type="date" placeholder="dateDebut" id="dateDebut" name="dateDebut">
        <input type="date" placeholder="dateFin" id="dateFin" name="dateFin">
        <input type="float" placeholder="montant" id="montant" name="montant">
        

        <button type="submit">ajouter</button>
    </form>

   
</body>
</html>