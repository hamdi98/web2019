<?php
include "../entities/Produit.php";
include "../core/produitC.php";

if (isset($_GET['refprod']) && isset($_GET['nomprod']) &&isset($_GET['qteprod']) &&isset($_GET['prixprod']) &&isset($_GET['photo']) &&isset($_GET['catprod']))
{

	$refprod=$_GET['refprod'];
	$nomprod=$_GET['nomprod'];
	$photo=$_GET['photo'] ;
	$qteprod=$_GET['qteprod'];
	$prixprod=$_GET['prixprod'];
     $catprod=$_GET['catprod'];

	if(!empty($_GET['refprod'])&& !empty($_GET['nomprod'])&& !empty($_GET['photo']) && !empty($_GET['qteprod'])&& !empty($_GET['prixprod'])&& !empty($_GET['catprod']))
	{
		$Produit = new Produit($refprod ,$nomprod,$prixprod ,$qteprod,$photo,$catprod );
		$produitC = new produitC();
		//echo $Personne->getcin();
		$mess=$produitC->modifierproduit($Produit);
	if ($mess == true)

echo "modifier avec success avec success";	}
}
?>