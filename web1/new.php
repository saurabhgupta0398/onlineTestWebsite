<?php
$mysqli=new mysqli("localhost","root","","question_bank");
$errors=array();
if(isset($_POST['set']))
{
	$password1=$_POST['pswrd1'];
	$password2=$_POST['pswrd2'];
	if($password1!=$password2)
{
	array_push($errors, "पासवर्ड मेल नहीं खा रहे हैं");
	$_SESSION['mismatch']= "पासवर्ड मेल नहीं खा रहे हैं";
}
 if(count($errors)==0)
    
{
	$password=md5($password1);
	if(isset($_SESSION['emailverify']))
	{
		$email=$_SESSION['emailverify'];
	}

	$mysqli->query("UPDATE register SET password='$password' WHERE email='$email'")or die($mysqli->error);
header("location:login.php");
} 

}
?>