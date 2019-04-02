<?php
require_once  "../mysql.php";
class PromotionC {

	function afficherPromotion ()
	{
		$db= config::getConnexion();
		//req 
		$req=$db->prepare(" SELECT * from promotion ");
		$req->execute();
		return $req;
	}
	
	

	function ajouterPromotion($promotion)
	{
		$id_promo=$promotion->get_id_promo();
		$solde=$promotion->get_solde();
		$date_debut=$promotion->get_date_debut();
		$date_fin=$promotion->get_date_fin();
		$nom_prod=$promotion->get_nom_prod();		
		$db= config::getConnexion();
		$req=$db->prepare("INSERT INTO promotion (id_promo,solde ,date_debut ,date_fin ,nom_prod ) values (:id_promo,:solde,STR_TO_DATE(:date_debut,'%Y-%m-%d') ,STR_TO_DATE(:date_fin,'%Y-%m-%d') ,:nom_prod )");
		$req->bindParam(':id_promo',$id_promo);
		$req->bindParam(':solde',$solde);
		$req->bindParam(':date_debut',$date_debut);
		$req->bindParam(':date_fin',$date_fin);
		$req->bindParam(':nom_prod',$nom_prod);
		return $req->execute();
	}

	
	function modifierPromotion($promotion)
	{
		$id_promo=$promotion->get_id_promo();
		$solde=$promotion->get_solde();
     	$date_debut=$promotion->get_date_debut();
		$date_fin=$promotion->get_date_fin();
		$nom_prod=$promotion->get_nom_prod();	
		$sql="UPDATE promotion SET solde=:solde ,date_debut=:date_debut ,date_fin=:date_fin ,nom_prod=:nom_prod WHERE id_promo=:id_promo";
		$db=config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindParam(':id_promo',$id_promo);
	    $req->bindParam(':solde',$solde);
		$req->bindParam(':date_debut',$date_debut);
		$req->bindParam(':date_fin',$date_fin);
		$req->bindParam(':nom_prod',$nom_prod);
		$req->execute();
	}

	
	
	function supprimerpromotion($id_promo)
	{
		$sql="DELETE FROM promotion WHERE id_promo=:id_promo";
		$db=config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindParam(':id_promo',$id_promo);
		$req->execute();
	}


 	 function rechercherpromotion($id_promo)
 	 {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * from promotion where id_promo=:id_promo");
        $req->bindParam(':id_promo',$id_promo);
        $req->execute();
        return ($req->fetchAll());
    }


	 function trierSolde()
    {
    	 $db=config::getConnexion();
		 // req 
    	 $req=$db->prepare("select * from promotion ORDER BY solde ASC");
    	 $req->execute();
    	 return $req;
    }



	 function trierDate()
    {
    	 $db=config::getConnexion();
		 // req 
    	 $req=$db->prepare("select * from promotion ORDER BY date_fin ASC");
    	 $req->execute();
    	 return $req;
    }

}


?>