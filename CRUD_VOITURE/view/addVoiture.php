<?php
include '../controller/VoitureV.php';
include '../model/Voiture.php';
$voiture = NULL;
$voitureV = new voitureV();

if (
    isset($_POST['id_voiture']) && isset($_POST['marque']) && isset($_POST['annee']) && isset($_POST['couleur']) && isset($_POST['immatriculation']) && isset($_POST['prix_location']) )
 {
    if (!empty($_POST['id_voiture']) && !empty($_POST['marque']) && !empty($_POST['annee']) && !empty($_POST['couleur']) && !empty($_POST['immatriculation']) && !empty($_POST['prix_location'])) {
        $voiture = new Voiture($_POST['id_voiture'], $_POST['marque'], $_POST['annee'], $_POST['couleur'], $_POST['immatriculation'], $_POST['prix_location']);
        $voitureV->addVoiture($voiture);
        header('location:listeVoitures.php');
    } else {
        $error = "Informations manquantes";
    }
}
?>

<html>
<head>
    <title>Voiture</title>
</head>
<body>
    <a href="listeVoitures.php">Retour à la liste</a>

    <form action="" method="POST">

        <h1>ajouter voiture</h1>
        <input type="int" placeholder="id_voiture" id="id_voiture" name="id_voiture">
        <input type="text" placeholder="marque" id="marque" name="marque">
        <input type="int" placeholder="annee" id="annee" name="annee">
        <input type="text" placeholder="couleur" id="couleur" name="couleur">
        <input type="text" placeholder="immatriculation" id="immatriculation" name="immatriculation">
        <input type="float" placeholder="prix_location" id="prix_location" name="prix_location">
        

        <button type="submit">ajouter</button>
    </form>

    
</body>
</html>