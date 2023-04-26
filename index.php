<?php 
require('connexion.db.php');

$insertOeuvreInfos = $bd->query("SELECT * FROM oeuvre");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>index</title>
</head>
<body>

<div class="container mt-2 mb-5">
	
	<?php 

$insertOeuvreInfos = $bd->query('SELECT * FROM oeuvre, artiste, categorie WHERE oeuvre.idArtistes=artiste.idArtistes AND oeuvre.idCategorie=categorie.idCategorie');

	 ?>
    <table class="table table striped mt-3">
       <thead class="table-dark">
        <tr>
        <th class="text-center fw-bold">Oeuvre</th>
        <th class="text-center fw-bold">Auteur</th>
        <th class="text-center fw-bold">Année</th>
        <th class="text-center fw-bold">Catégorie</th>
        <th class="text-center fw-bold">Actions</th>
        </tr>
      </thead>
<?php 
while($donnees = $insertOeuvreInfos->fetch()){
?>
        <tr>
            <td class="text-center fw-bold"><?=  $donnees['description'] ?></td>
            <td class="text-center fw-bold"><?=  $donnees['nom'].''.$donnees['prenom']?></td>
            <td class="text-center fw-bold"><?=  $donnees['annee'] ?></td>
            <td class="text-center fw-bold"><?=  $donnees['nomCategorie'] ?></td>
            <td><a class="btn btn-primary" href="modifier.php?idOeuvre=<?= $donnees['idOeuvre'];?>">Modifier</a></td>
            <td><a class="btn btn-danger" href="supprimer.php?idOeuvre=<?= $donnees['idOeuvre'];?>">Supprimer</a></td>
        </tr>
<?php
}
?>
</table>
</div>
</body>
</html>