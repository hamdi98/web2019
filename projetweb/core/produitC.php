<?php
include "../config.php" ;

class ProduitC {
function afficherproduit(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From produit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;

		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


function ajouterproduit($produit)
{
 $sql="insert into produit(refprod,nomprod,prixprod,qteprod,photoprod,catprod) values (:refprod, :nomprod, :prixprod ,:qteprod ,:photoprod , :catprod)";
$db = config::getConnexion() ;
try {

$req =$db->prepare($sql);
$ref =$produit->getrefp();
$nom =$produit->getnomp();
$prix =$produit->getprixp();
$qte =$produit->getqtep();
$photo =$produit->getphotop();
$catprod= $produit->getcatp();


$req->bindValue(':refprod',$ref);
$req->bindValue(':nomprod',$nom);
$req->bindValue(':prixprod',$prix );
$req->bindValue(':qteprod',$qte );
$req->bindValue(':photoprod',$photo);
$req->bindValue(':catprod',$catprod);


$req->execute() ;
return true ;
}
catch (Exception $e)
{ echo 'erreur' .$e->getMessage() ; return false ;}
}

function supprimerproduit($refprod){
		$sql="DELETE FROM produit where refprod = :refprod";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':refprod',$refprod);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}

function recupererProduit($id){
		$sql="SELECT * from produit where refprod = ".$id."";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


	function modifierproduit($Produit)
	{



		$sql="UPDATE produit SET refprod=:refprod, nomprod=:nomprod,prixprod=:prixprod,qteprod=:qteprod,photoprod =:photoprod , catprod =:catprod WHERE refprod=:refprod";
		
		$db = config::getConnexion() ;
try {
$req =$db->prepare($sql);
$refprod=$Produit->getrefp();
$nom =$Produit->getnomp();
$prix =$Produit->getprixp();
$qte =$Produit->getqtep();
$photo =$Produit->getphotop();
$catprod=$Produit->getcatp();
		$datas = array(':refprod'=>$refprod, ':nomprod'=>$nom,':prixprod'=>$prix,':qteprod'=>$qte,':photoprod'=>$photo,':catprod'=>$catprod);
$req->bindValue(':refprod',$refprod);
$req->bindValue(':nomprod',$nom);
$req->bindValue(':prixprod',$prix );
$req->bindValue(':qteprod',$qte );
$req->bindValue(':photoprod',$photo);
$req->bindValue(':catprod',$catprod);
		
            $s=$req->execute();
	}
	 catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   //echo " Les datas : " ;
 // print_r($datas);
        }
		
	}
function displayLastProducts(){
		$sql="select * From produit order by prixprod";
		$db = config::getConnexion();
		try{
			$sth = $db->prepare($sql);
			$sth->execute();
			$liste = $sth->fetchAll();
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	

}
?>