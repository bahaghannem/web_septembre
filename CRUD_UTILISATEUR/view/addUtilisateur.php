<?php
include '../controller/utilisateurU.php';
include '../model/utilisateur.php';
$utilisateur = NULL;
$utilisateurU = new utilisateurU();

if (
    isset($_POST['id_utilisateur']) && isset($_POST['nom'])  && isset($_POST['prenom'])  && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['role'] )
) {
    if (!empty($_POST['id_utilisateur']) && !empty($_POST['nom'])  && !empty($_POST['prenom'])   && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['role'])) {
        $utilisateur = new utilisateur($_POST['id_utilisateur'], $_POST['nom'],  $_POST['prenom'],   $_POST['email'],$_POST['mdp'] , $_POST['role'] );
        $utilisateurU->addUtilisateur($utilisateur);
        header('location:listeUtilisateurs.php');
    } else {
        $error = "Informations manquantes";
    }
}

?>

<html>
<head>
    <meta charset="UTF-8">
    
    <title> utilisateur </title>
    
</head>
<body>
    <a href="listeUtilisateurs.php">Retour à la liste</a>
    <hr>

    <div class="container" id="container">
        <div class="form-container sign-up">
              <form action="" method="POST">
                <h1>Create Account</h1>
                <input type="text" placeholder="id_utilisateur" id="id_utilisateur" name="id_utilisateur">
                <input type="text" placeholder="nom" id="nom" name="nom">
                <input type="text" placeholder="prenom" id="prenom" name="prenom">
                <input type="email" placeholder="email" id="email" name="email">
                <input type="password" placeholder="mdp" id="mdp" name="mdp">
                <input type="text" placeholder="role" id="role" name="role">
                <button type="submit">Sign up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Sign In</h1>
                
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign in</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>bienvenue cher utilisateur!</h1>
                    <p>veuillez saisir vos informations </p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>