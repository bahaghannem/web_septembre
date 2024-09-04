<?php
include '../controller/ContratC.php';
$contrat=new contratC();
$contrat->deleteContrat($_GET['id_contrat']);
header('location:listeContrats.php');

?>