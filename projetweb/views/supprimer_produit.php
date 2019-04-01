<?PHP
include "../core/produitC.php";
$ProduitC=new ProduitC();
if (isset($_POST["refprod"])){
$mess =$ProduitC->supprimerproduit($_POST["refprod"]);

header('Location:http://localhost/projetweb/vious/tables-basic.php');
}


?>