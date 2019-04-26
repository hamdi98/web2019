<?php 
function logged_in2()
{
	if($_SESSION['mail2']=='')
	{
		return true;
	}
	else {
		return false;
	}
}



 ?>