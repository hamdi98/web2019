<?php
//include "../config.php" ;

class config2 {
    private static $instance = NULL;

    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=2a7_bd', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    }
  }


class CategorieC
 {

function affichercategorie()
{
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From categories";
		$db = config2::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }	
	}



  function ajoutercat($Categories)
{
 $sql="insert into categories values (:refprod , :nomprod ,:photo)";
$db = config2::getConnexion() ;
try {
$req=$db->prepare($sql);
$ref=$Categories->getcatid();
$nom=$Categories->getnomcat();
$discription=$Categories>getdisc();

$req->bindValue(':refprod',$ref);
$req->bindValue(':nomprod',$nom);
$req->bindValue(':photo',$discription);

$req->execute() ;
return true ;
}
catch (Exception $e)
{ echo 'erreur' .$e->getMessage() ; return false ;}
}

function supprimercat($catprod){
    $sql="DELETE FROM categories where catprod = :catprod";
    $db = config2::getConnexion();
        $req=$db->prepare($sql);
    $req->bindValue(':catprod',$catprod);
    try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}

function modifiercat($Categories)
  {

    $sql="UPDATE categories SET  nomcat=:nomcat,discription=:discription WHERE catprod=:catprod";
    $db = config2::getConnexion() ;
try {
$req=$db->prepare($sql);
$catprod=$Categories->getcatid();
$nomcat=$Categories->getnomcat();
$discription=$Categories->getdisc();
  echo'lol';
    //$datas = array(':catprod'=>$catprod, ':nomcat'=>$nomcat,':dicription'=>$discription);
$req->bindValue(':catprod',$catprod);
$req->bindValue(':nomcat',$nomcat);
$req->bindValue(':discription',$discription);

            $s=$req->execute();
  }
   catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   //echo " Les datas : " ;
  //print_r($datas);
        }
    
  }

}