<?php

session_start();
$username="";
$email="";
$city="";
$state="";
$department="";
$password="";
$phone="";
$squestion="";
$sanswer="";
//$results=array();
$errors=array();
$mysqli= new mysqli('localhost','root','','question_bank') or die(mysqli_error($mysqli));
if(isset($_POST['reg_user']))
{

$username=$_POST['username'];
$email=$_POST['email'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];
$city=$_POST['city'];
$state=$_POST['state'];
$department=$_POST['department'];
$phone=$_POST['phone'];
$squestion=$_POST['squestion'];
$sanswer=$_POST['sanswer'];


if($password1!=$password2)
{
	
	array_push($errors, "पासवर्ड मेल नहीं खा रहे हैं");
}


$sql="select * from register where (username='$username' or email='$email');";
        $res=mysqli_query($mysqli,$sql);
        if (mysqli_num_rows($res) > 0) {
        // output data of each row
        	
        $row = $res->fetch_assoc();
        	
        if ($username==$row['username'])
        {
        	
            array_push($errors, "यूज़र नेम पहले से इसतमाल मे हैं");
        }
        elseif($email==$row['email']) // change it to just else
        {
        	
            array_push($errors, "ईमेल आइडी पहले से इसतमाल मे हैं");
        }
        
    }
     if(count($errors)==0)
    
{
	$password=md5($password1);
	

$mysqli->query("INSERT INTO register(username,email,password,phone,city,state,department,squestion,sanswer) VALUES('$username','$email','$password','$phone','$city','$state','$department','$squestion','$sanswer')")or die($mysqli->error);
$_SESSION['username']=$username;
$_SESSION['success']="आपका स्वागत है";
$admin="admin";
if($username==$admin)
{
				header("location:template/insert.php");
			}
			else{
			header('location:template/index.php');}
}
}
if(isset($_POST['login_user']))
{
	$username=$_POST['username'];
	$password=$_POST['password1'];
	
	if(count($errors)==0)
	{
		$password=md5($password);
		$results=$mysqli->query("SELECT * FROM register WHERE username='$username'and password='$password'");
		$admin="admin";
		if(mysqli_num_rows($results)>0)
		{
			$_SESSION['username']=$username;
			$_SESSION['success']="आपका स्वागत है";
			if($username==$admin)
			{
				header("location:template/insert.php");
			}
			else{
			header('location:template/index.php');
			}
		}
		else
	{
		array_push($errors,"गलत यूज़र नेम अथवा पासवर्ड");
	}
	}
	

}
?>