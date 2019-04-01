<?php
class Categories{


	private $discription ;
	
	private $catprod ;
      private $nomcat ;

    
function __construct( $catprod,$nomcat ,$discription)
{
	 $this->catprod = $catprod ;
  $this->nomcat  =$nomcat ;
$this->discription =$discription ;





}
function getcatid()
{
	return  $this->catprod ;
}

function getdisc()
{return $this->discription ;
}

function getnomcat()
{
	return $this->nomcat ;
}
}