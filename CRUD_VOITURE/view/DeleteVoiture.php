<?php
include '../controller/VoitureV.php';
$voiture=new voitureV();
$voiture->deleteVoiture($_GET['id_voiture']);
header('location:listeVoitures.php');

?>