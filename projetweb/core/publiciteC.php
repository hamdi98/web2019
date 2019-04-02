<?php
	include_once "../mysql.php";
	class publiciteC
	{
		public function getPublicite($id,$pr)
		{
			$c = config::getConnexion();
	   		$stmt = $c->prepare("SELECT * FROM publicite WHERE id_pub=:id limit 1");
			$stmt->bindParam(':id', $id);
      		$stmt->execute();
      		$res = $stmt->fetchAll();
      foreach ($res as $row)
      {
		    	$pr->set_desc($row['commentaire']);
		    	$pr->set_image($row['image']);
		    }
		    
		}


		public function getpub()
		{
			$c = config::getConnexion();
      		$stmt = $c->prepare("SELECT * FROM publicite");
     		$stmt->execute();
     		$result = $stmt->fetchAll();
     		return $result;
		}

public function afficher_publicite(){

$c=config::getConnexion();
$sql= "SELECT * from publicite ";
 return $c->query($sql);

}

		public function ajouterPublicite($publicite)
		{			
   			$zd = $publicite->get_desc();
   			$i=$publicite->get_image();
   			$c = config::getConnexion();

	   		$stmt = $c->prepare("INSERT INTO publicite (commentaire, image) VALUES (:commentaire, :image )");
			$stmt->bindParam(':commentaire',$zd);
			$stmt->bindParam(':image',$i);
			$stmt->execute();
		}

		public function modifierPublicite($publicite)
		{
			$id = $publicite->get_id();
   			$zd = $publicite->get_desc();
   			$i=$publicite->get_image();
   			$c = config::getConnexion();
   			$stmt = $c->prepare("UPDATE publicite SET commentaire=:commentaire, image=:image  WHERE id_pub=:id");
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':commentaire',$zd);
			$stmt->bindParam(':image',$i);
			$stmt->execute();
			return $stmt->errorInfo();
		}

		
		public function supprimerPublicite($publicite)
        {  
    $sql="DELETE FROM publicite where id_pub=:id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id',$publicite);
    try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        }

	
 function rechercherPub($id_pub)
 	 {
        $db=config::getConnexion();
        $req=$db->prepare("SELECT * from publicite where id_pub=:id_pub");
        $req->bindParam(':id_pub',$id_pub);
        $req->execute();
        return ($req->fetchAll());
    }


	public function upload($filename){
        $target_file = dirname( dirname(__FILE__) ).DIRECTORY_SEPARATOR.'uploads_pub'.DIRECTORY_SEPARATOR.basename($filename);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
               // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
               // echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 1;
        }
        if ($_FILES["image"]["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
          //  echo "Sorry, your file was not uploaded.";
            return false;
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function getNextID(){
        $db=config::getConnexion();
        $req = $db->query("SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'publicite'");
        $a= $req->fetch();
        return intval($a['auto_increment'])-1;
    }
}

?>