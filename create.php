<?php 
require('connexion.db.php');
if(isset($_POST['valider'])){

  echo $_POST['nom'], $_POST['description'], $_POST['annee'], $_POST['idArtistes'], $_POST['idCategorie'];

		$insertOeuvreInfos = $bd -> prepare ('INSERT INTO oeuvre (nom, description, annee, idArtistes, idCategorie) VALUES (?, ?, ?, ?, ?)');
		$insertOeuvreInfos ->execute(array($_POST['nom'], $_POST['description'], $_POST['annee'], $_POST['idArtistes'], $_POST['idCategorie']));

		$successMsg= "Enregistrement de l'oeuvre d'art effectuée"; 

}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="bootstrap.css" rel="stylesheet">

	<title>Create</title>
	
</head>
<body>
  <div class="container mt-5">
	<div class="container col-md-8">
<?php
		if(isset($successMsg)){
?>
<div class="alert alert-success" role="alert">
<?php echo $successMsg; }

elseif(isset($errorMsg)){
?>
<div class="alert alert-danger" role="alert">
<?php echo $errorMsg; ?>
</div> 
<?php } 
?>
   <h2 class="text-dark-50 fw-bold">Insertion d'une oeuvre d'art</h2></legend> 
   <form action="" method="POST">
    <div class="form-group mt-2">
      <label for="nom" class="text-dark-50 fw-bold">Nom:</label>
      <input type="text" class="form-control form-control-lg fw-bold" id="" placeholder="Entrer un nom" name="nom"> 
    </div>
     <div class="form-group mt-2">
      <label for="description" class="text-dark-50 fw-bold">Description:</label>
      <input type="text" class="form-control form-control-lg fw-bold" id="" placeholder="Entrer une description" name="description">
    </div>

    <div class="form-group mt-2">
      <label for="annee" class="text-dark-50 fw-bold">Année:</label>
      <input type="text" class="form-control form-control-lg fw-bold" id="" placeholder="Entrer une année" name="annee">
    </div>

     <div class="form-group mt-2">
      <label for="artiste" class="text-dark-50 fw-bold">Artiste:</label>
      <select name="idArtistes" id="" class="form-select form-select-lg">
      <option selected disabled value="">...</option>
      <?php 
      $insertInfosArtistes = $bd->query('SELECT * FROM artiste');

      while($artisteInfos = $insertInfosArtistes->fetch()){

        echo '<option value="'.$artisteInfos['idArtistes'].'">'.$artisteInfos['nom'].'
        '.$artisteInfos['prenom'].'</option>';
      }
     ?>

      </select>
    </div>

    <div class="form-group mt-2">
      <label for="categorie" class="text-dark-50 fw-bold">Catégorie:</label>
      <select name="idCategorie" id="" class="form-select form-select-lg">
      <option selected disabled value="">...</option>
      <?php 
      $insertInfosCategorie = $bd->query('SELECT * FROM categorie');

      while($categorieInfos = $insertInfosCategorie->fetch()){

        echo '<option value="'.$categorieInfos['idCategorie'].'">'.$categorieInfos['nomCategorie'].'</option>';
      }
?>
      </select>
    </div>
    <br>
<div class="form-group col-3">
    <button class="btn btn-primary" type="submit" name="valider">Enregistrer</button>
</div>
</form>
  
</div>
</body>
</html>