<?php
class Personne{


	private $cin ;
	private $nom ;
	private $prenom ;

function __construct($cin ,$nom ,$prenom)
{
$this->cin=$cin ;
$this->nom=$nom ;
$this->prenom =$prenom ;

}
function getcin()
{
	return $this->cin ;
}
function getnom()
{return $this->nom;
}
function getprenom() 
{return $this->prenom ;}
function set($cin)
{$this->cin =$cin;}

}

?>