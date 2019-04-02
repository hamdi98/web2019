
<?php
class Promotion{
	private $id_promo;
	private $solde;
	private $date_debut;
	private $date_fin; 
	private $nom_prod; 

	function __construct($id_promo ,$solde ,$date_debut ,$date_fin ,$nom_prod )
	{
		$this->id_promo=$id_promo;
		$this->solde=$solde;
		$this->date_debut=$date_debut;
		$this->date_fin=$date_fin;
		$this->nom_prod=$nom_prod;

	}


	function get_id_promo()
	{
		return $this->id_promo;
	}
	function get_solde()
	{
		return $this->solde ;
	}
	function get_date_debut()
	{
		return $this->date_debut;
	}
	function get_date_fin()
	{
		return $this->date_fin;
	}
	function get_nom_prod()
	{
		return $this->nom_prod;
	}


	
	function set_id_promo($id_promo)
	{
		$this->id_promo=$id_promo;
	}
	function set_solde($solde)
	{
		$this->solde=$solde;
	}
	function set_date_debut($date_debut)
	{
		$this->date_debut=$date_debut;
	}
	function set_date_fin($date_fin)
	{
		$this->date_fin=$date_fin;
	}
	function set_nom_prod($nom_prod)
	{
		$this->nom_prod=$nom_prod;
	}

	
} 