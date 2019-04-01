<?php
include "../entities/Categorie.php";
include "../core/categorieC.php";

if (isset($_GET['idcat']) && isset($_GET['nomcat']) &&isset($_GET['discat']))
{

	$refprod=$_GET['idcat'];
	$nomprod=$_GET['nomcat'];
	$photo=$_GET['discat'] ;
	
	if(!empty($_GET['refprod'])&& !empty($_GET['nomprod'])&& !empty($_GET['photo']) )
	{
		$Categories = new Categories($refprod ,$nomprod,$photo);
		$CategorieC = new CategorieC();
		//echo $Produit->getcatid();
		$mess=$CategorieC->ajoutercat($Categories);
	if ($mess == true)

echo"ajouter avec success";	}
}
?>