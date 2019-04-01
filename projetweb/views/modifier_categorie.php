<?php
include "../entities/Categorie.php";
include "../core/categorieC.php";

if (isset($_GET['catprod']) && isset($_GET['nomcat']) &&isset($_GET['discat']))
{

	$catprod=$_GET['catprod'];
	$nomcat=$_GET['nomcat'];
	$discription=$_GET['discat'] ;
	if(!empty($catprod)&& !empty($nomcat)&& !empty($discription) )
	{
		$Categories = new Categories($catprod ,$nomcat,$discription);
		$CategorieC = new CategorieC();
		//echo $Produit->getcatid();
		$mess=$CategorieC->modifiercat($Categories);
	if ($mess == true)

echo"modifier avec success";
else 
echo"hhhhh";	}
}
?>