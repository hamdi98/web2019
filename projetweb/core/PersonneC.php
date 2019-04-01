<?php
include "../config.php" ;

class PersonneC
{
function ajouter ($personne)
{
 $sql ="insert into personne (cin ,nom ,prenom) values (:cin ,:nom, :prenom)";
$db = config::getConnexion() ;
try {
$req =$db->prepare($sql);
$cin =$personne->getcin();
$nom =$personne->getnom();
$prenom =$personne->getprenom();

$req->bindValue(':cin',$cin);
$req->bindValue(':nom',$nom);
$req->bindValue(':prenom',$prenom);
$req->execute() ;
return true ;
}
catch (Exception $e)
{ echo 'erreur' .$e->getMessage() ; return false ;}
}
}
?>
