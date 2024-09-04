<?php
include '../controller/ContratC.php';
$c=new contratC();
$tab=$c->listeContrats();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <center>
  <title> liste Contrats </title>
  </center>
</head>
<body>
  <center>
    <a href="addContrat.php">ajouter un contrat</a>
  </center>
       <center>
      <h1> liste contrats </h1>
</center>
      <table class="table" border="1" align="center" width="70%" >
        <thead>
          <tr>
            <th>id_contrat</th>
            <th>id_voiture</th>
            <th>id_client</th>
            <th>dateDebut</th>
            <th>dateFin</th>
            <th>montant</th>
          
            
            <th>update</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($tab as $contrat) { ?>
            <tr>
              <td><?php echo $contrat['id_contrat'];?></td>
              <td><?php echo $contrat['id_voiture'];?></td>
              <td><?php echo $contrat['id_client'];?></td>
              <td><?php echo $contrat['dateDebut'];?></td>
              <td><?php echo $contrat['dateFin'];?></td>
              <td><?php echo $contrat['montant'];?></td>
              
              <td align="center">
                <form method="POST" action="updateContrat.php">
                  <input type="submit" name="update" value="Update">
                  <input type="hidden" value="<?php echo $contrat['id_contrat']; ?>" name="id_contrat">
                </form>
              </td>
              <td><a href="DeleteContrat.php?id_contrat=<?php echo $contrat['id_contrat']?>">delete</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
  
</body>
</html>