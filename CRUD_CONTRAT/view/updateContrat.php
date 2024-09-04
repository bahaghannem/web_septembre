<?php
include '../controller/ContratC.php';
include '../model/Contrat.php';
$errorMessage = "";

// create contrat
$contrat = null;
// create an instance of the controller
$contratC= new contratC();

if (
    isset($_POST["id_contrat"]) &&
    isset($_POST["id_voiture"]) &&
    isset($_POST["id_client"]) &&
    isset($_POST["dateDebut"]) &&
    isset($_POST["dateFin"]) &&
    isset($_POST["montant"]) 
    
) {
    if (
        !empty($_POST['id_contrat']) &&
        !empty($_POST['id_voiture']) &&
        !empty($_POST["id_client"]) &&
        !empty($_POST["dateDebut"]) &&
        !empty($_POST["dateFin"]) &&
        !empty($_POST["montant"]) 
        
    ) {
        $contrat = new contrat(
            $_POST['id_contrat'],
            ($_POST['id_voiture']),
            ($_POST['id_client']),
            ($_POST['dateDebut']),
            ($_POST['dateFin']),
            ($_POST['montant'])
            
        );

        $contratC->updateContrat($contrat, $_POST['id_contrat']);

        header('Location: listeContrats.php');
        exit();
    } else {
        $errorMessage = "Missing information";
    }
}
?>

<html lang="en">

<body>
    <button><a href="listeContrats.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $errorMessage; ?>
    </div>

    <?php
    if (isset($_POST['id_contrat'])) {
        $contrat = $contratC->showContrat($_POST['id_contrat']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_contrat">id_contrat:</label></td>
                    <td>
                        <input type="int" id="id_contrat" name="id_contrat" value="<?php echo $_POST['id_contrat']; ?>" readonly />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="id_voiture">id_voiture :</label></td>
                    <td>
                        <input type="int" id="id_voiture" name="id_voiture" value="<?php echo ($contrat['id_voiture']); ?>" />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="id_client">id_client:</label></td>
                    <td>
                        <input type="int" id="id_client" name="id_client" value="<?php echo ($contrat['id_client']); ?>" />
                        <span id="erreurid" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="dateDebut">dateDebut :</label></td>
                    <td>
                        <input type="date" id="dateDebut" name="dateDebut" value="<?php echo ($contrat['dateDebut']); ?>" />
                        <span id="erreurdate" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="dateFin">dateFin :</label></td>
                    <td>
                        <input type="date" id="dateFin" name="dateFin" value="<?php echo ($contrat['dateFin']); ?>" />
                        <span id="erreurdateFin" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="montant">montant:</label></td>
                    <td>
                        <input type="float" id="montant" name="montant" value="<?php echo ($contrat['montant']); ?>" />
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