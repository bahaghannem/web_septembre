<?php
include '../controller/VoitureV.php';
$c=new voitureV();
$tab=$c->listeVoitures();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title> liste voitures </title>
  
</head>
<body>
  <center>
    <a href="addVoiture.php">ajouter une voiture</a>
  </center>
       <center>
      <h1> liste voitures </h1>
</center>
      <table class="table" border="1" align="center" width="70%" >
        <thead>
          <tr>
            <th>id_voiture</th>
            <th>marque</th>
            <th>annee</th>
            <th>couleur</th>
            <th>immatriculation</th>
            <th>prix_location</th>
            
            <th>update</th>
            <th>delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($tab as $voiture) { ?>
            <tr>
              <td><?php echo $voiture['id_voiture'];?></td>
              <td><?php echo $voiture['marque'];?></td>
              <td><?php echo $voiture['annee'];?></td>
              <td><?php echo $voiture['couleur'];?></td>
              <td><?php echo $voiture['immatriculation'];?></td>
              <td><?php echo $voiture['prix_location'];?></td>
              
              <td align="center">
                <form method="POST" action="updateVoiture.php">
                  <input type="submit" name="update" value="Update">
                  <input type="hidden" value="<?php echo $voiture['id_voiture']; ?>" name="id_voiture">
                </form>
              </td>
              <td><a href="DeleteVoiture.php?id_voiture=<?php echo $voiture['id_voiture']?>">delete</a></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
   
</body>
</html>