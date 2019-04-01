<?PHP
include "../core/CategorieC.php";
$CategorieC=new CategorieC();
if (isset($_POST["catprod"])){
$mess =$CategorieC->supprimercat($_POST["catprod"]);

header('Location:http://localhost/projetweb/vious/tables-basic.php');
}


?>