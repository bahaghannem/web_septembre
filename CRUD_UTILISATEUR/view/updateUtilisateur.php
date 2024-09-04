<?php
include '../controller/utilisateurU.php';
include '../model/utilisateur.php';
$error = "";

// create client
$utilisateur= null;
// create an instance of the controller
$utilisateurU= new utilisateurU();

if (
    isset($_POST["id_utilisateur"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["mdp"]) &&
    isset($_POST["role"])

) {
    if (
        !empty($_POST['id_utilisateur']) &&
        !empty($_POST['nom']) &&
        !empty($_POST['prenom']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["mdp"]) &&
        !empty($_POST["role"])
    ) {
        $utilisateur = new utilisateur(
            $_POST['id_utilisateur'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['mdp'],
            $_POST['role']
        );

        $utilisateurU->updateUtilisateur($utilisateur, $_POST['id_utilisateur']);

        header('Location: listeUtilisateurs.php');
        exit();
    } else {
        $error = "Missing information";
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listeUtilisateurs.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_utilisateur'])) {
        $utilisateur = $utilisateurU->showUtilisateur($_POST['id_utilisateur']);
    ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="id_utilisateur">id_utilisateur:</label></td>
                    <td>
                        <input type="int" id="id_utilisateur" name="id_utilisateur" value="<?php echo $_POST['id_utilisateur'] ?>" readonly />
                        <span id="erreurid_utilisateur" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $utilisateur['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><label for="prenom">prenom :</label></td>
                    <td>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $utilisateur['prenom'] ?>" />
                        <span id="erreurPrenom" style="color: red"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><label for="email">email :</label></td>
                    <td>
                        <input type="text" id="email" name="email" value="<?php echo $utilisateur['email'] ?>" />
                        <span id="erreurEmail" style="color: red"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><label for="mdp">mdp:</label></td>
                    <td>
                        <input type="text" id="mdp" name="mdp" value="<?php echo $utilisateur['mdp'] ?>" />
                        <span id="erreurMotDePasse" style="color red"></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="role">role:</label></td>
                    <td>
                        <input type="text" id="role" name="role" value="<?php echo $utilisateur['role'] ?>" />
                        <span id="erreurRole" style="color red"></span>
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