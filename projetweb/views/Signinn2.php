<?php 
include "../entities/Admin.php";
include "../core/Admind.php";

session_start();
$host="localhost";
$user="root";
$password="";
$db="project";
 
$con = mysqli_connect($host,$user,$password,$db);

 
if(isset($_POST['email'])){
    
    $email=$_POST['email'];
    $pwd2=$_POST['pwd2'];
    
    $sql="select * from admin where email='".$email."'AND pwd2='".$pwd2."' limit 1";
    $_SESSION['mail2']=$email;
    $result=mysqli_query($con,$sql);
    
    if(!$result || mysqli_num_rows($result) == 1)
       {
       header('Location: tables-basic.php');

      }
    
    
    else{
        //echo " You Have Entered Incorrect Password";
        header("Location:pages-signin.php");
        exit();
    }
        
   }
?>