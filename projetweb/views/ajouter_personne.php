<?php
include "../entities/Personne.php";
include "../core/PersonneC.php";

if (isset($_GET['cin']) && isset($_GET['prenom']) &&isset($_GET['nom']))
{

	$cin=$_GET['cin'] ;
	$nom=$_GET['nom'] ;
	$prenom=$_GET['prenom'] ;
	if(!empty($_GET['cin']) && !empty($_GET['nom']) && !empty($_GET['prenom']))
	{
		$Personne = new Personne($cin ,$nom,$prenom);
		$PersonneC = new PersonneC();
		echo $Personne->getcin();
		$mess=$PersonneC->ajouter($Personne);
		if($mess==true)
			echo "hhhhh";
		
	}
}
?>