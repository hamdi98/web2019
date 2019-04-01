<?php
include "../entities/Produit.php";
include "../core/produitC.php";

if (isset($_GET['refprod']) && isset($_GET['nomprod']) &&isset($_GET['qteprod']) &&isset($_GET['prixprod']) &&isset($_GET['photo']) &&isset($_GET['catprod']))
{

	$refprod=$_GET['refprod'];
	$nomprod=$_GET['nomprod'];
	$photoprod=$_GET['photo'] ;
	$qteprod=$_GET['qteprod'];
	$prixprod=$_GET['prixprod'];
     $catprod=$_GET['catprod'];

	if(!empty($refprod)&& !empty($nomprod)&& !empty($photoprod) && !empty($qteprod)&& !empty($prixprod)&& !empty($catprod))
	{
		$Produit = new Produit($refprod,$nomprod,$prixprod ,$qteprod,$photoprod,$catprod);
		var_dump($Produit);
		$produitC = new produitC();
		//echo $Personne->getcin();
		
	
	}
	
}
?>