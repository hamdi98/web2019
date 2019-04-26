<?php


if (isset($_POST["reset"])) {

   $selector = $_POST["selector"];	
   $validator = $_POST["validator"];	
   $pwd = $_POST["pwd"];	
   $rpwd = $_POST["rpwd"];	
   if (empty($pwd || empty($rpwd))) {

       header("Location : reset-password.php");
       exit();
    }
    else if($pwd != $rpwd)  {
    	header("Location : reset-password.php");
    	exit();
    }

    $currentdate = date("U");

    require 'db.php';

    $sql = "SELECT * FROM pwdreset WHERE pwdResetselector=? ";
    $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		
		echo"There was an error 0";
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "s", $selector);
		mysqli_stmt_execute($stmt);


	$result= mysqli_stmt_get_result($stmt);
	if (!$row = mysqli_fetch_assoc($result)) {
		echo "you need to re submit your reset request";
		exit();
	} else {
		$tokenBin = hex2bin($validator);
		$tokencheck= password_verify($tokenBin, $row["pwdResettoken"]);

		if ($tokencheck == false ) {

			echo "error";
			exit();
		} elseif ($tokencheck ===  true) {

            $tokenEmail = $row['pwdResetemail'];

            $sql = "SELECT * FROM client WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		
		echo"There was an error 1";
		exit();
	} else {

         mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
         mysqli_stmt_execute($stmt);
         $result= mysqli_stmt_get_result($stmt);
	if (!$row = mysqli_fetch_assoc($result)) {
		echo "error";
		exit();
	} else {

      $sql = "UPDATE client SET pwd=? WHERE email=?";
      $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		
		echo"There was an error 2";
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "ss", $pwd,$tokenEmail);
		mysqli_stmt_execute($stmt);

		$sql = "DELETE FROM pwdreset WHERE pwdResetemail=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		
		echo"There was an error 3";
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "s", $useremail);
		mysqli_stmt_execute($stmt);
		header("Location:Singin.php");
	}



}




	}
}
			
		}

	}

	}

} 
else
{
	header("Location : home.php");
}


 ?>