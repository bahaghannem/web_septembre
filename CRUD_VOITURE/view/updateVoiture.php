<?php
include '../controller/VoitureV.php';
include '../model/Voiture.php';
$errorMessage = "";

// create voiture
$voiture = null;
// create an instance of the controller
$voitureV = new voitureV();

if (
    isset($_POST["id_voiture"]) &&
    isset($_POST["marque"]) &&
    isset($_POST["annee"]) &&
    isset($_POST["couleur"]) &&
    isset($_POST["immatriculation"]) &&
    isset($_POST["prix_location"]) 
    
) {
    if (
        !empty($_POST['id_voiture']) &&
        !empty($_POST['marque']) &&
        !empty($_POST["annee"]) &&
        !empty($_POST["couleur"]) &&
        !empty($_POST["immatriculation"]) &&
        !empty($_POST["prix_location"]) 
        
    ) {
        $voiture = new voiture(
            $_POST['id_voiture'],
            ($_POST['marque']),
            ($_POST['annee']),
            ($_POST['couleur']),
            ($_POST['immatriculation']),
            ($_POST['prix_location'])
            
        );

        $voitureV->updateVoiture($voiture, $_POST['id_voiture']);

        header('Location: listeVoitures.php');
        exit();
    } else {
        $errorMessage = "Missing information";
    }
}
?>

<html lang="en">

<body>
    <button><a href="listeVoitures.php">Back to list</a></button>
    

    <?php
    if (isset($_POST['id_voiture'])) {
        $voiture = $voitureV->showVoiture($_POST['id_voiture']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_voiture">id_voiture:</label></td>
                    <td>
                        <input type="int" id="id_voiture" name="id_voiture" value="<?php echo $_POST['id_voiture']; ?>" readonly />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="marque">marque :</label></td>
                    <td>
                        <input type="text" id="marque" name="marque" value="<?php echo htmlspecialchars($voiture['marque']); ?>" />
                        <span id="erreurMarque" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="annee">annee:</label></td>
                    <td>
                        <input type="int" id="annee" name="annee" value="<?php echo htmlspecialchars($voiture['annee']); ?>" />
                        <span id="erreurannee" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="couleur">couleur :</label></td>
                    <td>
                        <input type="text" id="couleur" name="couleur" value="<?php echo htmlspecialchars($voiture['couleur']); ?>" />
                        <span id="erreurcouleur" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="immatriculation">immatriculation :</label></td>
                    <td>
                        <input type="text" id="immatriculation" name="immatriculation" value="<?php echo htmlspecialchars($voiture['immatriculation']); ?>" />
                        <span id="erreurImmatriculation" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix_location">prix_location:</label></td>
                    <td>
                        <input type="float" id="prix_location" name="prix_location" value="<?php echo htmlspecialchars($voiture['prix_location']); ?>" />
                        <span id="erreurprix" style="color: red"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="submit" value="Update" /></td>
                </tr>
            </table>
        </form>
    <?php
    } else {
        echo "Invalid request.";
    }
    ?>
</body>
</html>