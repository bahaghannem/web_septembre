<?php
include '../controller/utilisateurU.php';
$c=new utilisateurU();
$tab=$c->listeUtilisateurs();
?>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title> liste utilisateurs </title>
     
    </head>

<a href="addUtilisateur.php">ajouter utilisateur</a>
</center>
<section class="utilisateur">
            <div class="utilisateur-list">
              <h1> liste utilisateurs</h1>
              <table class="table" border="1" align="center" width="70%" >
                <thead>
                  <tr>
                    <th>id_utilisateur</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>role</th>
                    <th>update</th>
                    <th>delete</th>
                    
                  </tr>
                </thead>
                </div>
          </section>
<tr>
    <?php foreach($tab as $utilisateur)
    {
        ?>
        <td><?php echo $utilisateur['id_utilisateur'];?> </td> 
        <td><?php echo $utilisateur['nom'];?> </td> 
        <td><?php echo $utilisateur['prenom'];?> </td>  
        <td><?php echo $utilisateur['email'];?> </td> 
        <td><?php echo $utilisateur['role'];?> </td> 
        
        <td align="center">
                <form method="POST" action="updateUtilisateur.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $utilisateur['id_utilisateur']; ?> name="id_utilisateur">
                </form>
            </td>

            <td><a href="DeleteUtilisateur.php?id_utilisateur=<?php echo $utilisateur['id_utilisateur']?>">delete</a></td>
    </tr>
    <?php
    }?>
    
</table>
</html>