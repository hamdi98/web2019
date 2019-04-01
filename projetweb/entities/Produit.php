<?php
class Produit{


	private $refprod ;
	private $nomprod ;
	private $prixprod ;
	private $qteprod ;
	private $catprod ;
	private $photoprod ;
    
function __construct( $refprod , $nomprod ,$prixprod ,$qteprod,$photoprod ,$catprod)
{
$this->refprod=$refprod ;
$this->nomprod=$nomprod ;
$this->prixprod =$prixprod ;
$this->qteprod =$qteprod ;
 $this->catprod = $catprod ;
$this->photoprod = $photoprod ;
}
function getrefp()
{
	return $this->refprod;
}

function getnomp()
{return $this->nomprod;
}

function getqtep() 
{return $this->qteprod;}

function getcatp()
{return $this->catprod;
}

function getphotop()
{return $this->photoprod;
}

function getdispop()
{return $this->dispoprod;
}

function getprixp()
{return $this->prixprod;
}


function set_refp($refprod)
{$this->refprod =$refprod;}

}

?>