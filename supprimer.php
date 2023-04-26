<?php 
require('connexion.db.php');

if(isset($_GET['idOeuvre'])){

	$getid = $_GET['idOeuvre'];
	$recupOeuvre = $bd->prepare('SELECT * FROM oeuvre WHERE idOeuvre = ?');
	$recupOeuvre->execute(array($getid));
	
    $deleteOeuvre = $bd->prepare('DELETE FROM oeuvre WHERE idOeuvre = ?');
    $deleteOeuvre->execute(array($getid));
		                
		header('Location: index.php');

		echo "Oeuvre supprimée avec succès"	;
	
}
?>

   
