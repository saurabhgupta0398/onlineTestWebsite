<!DOCTYPE html>
<html>
<head>
	<title>
	 
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">		
</head>
<body>
	<div style="margin-left: 94%;margin-bottom: 20px;"><a href="index.php?logout='1'"
				class="btn btn-info">लॉगआउट</a></div>
<a href="web1.php" class="btn btn-info">भाग 1</a>
<a href="web2.php" class="btn btn-info">भाग 2</a>
<a href="web3.php" class="btn btn-info">भाग 3</a>
<?php 
session_start();
if(!isset($_SESSION['username']))

{
	
	header("location:../login.php");

}
if(isset($_SESSION['username']))

{
	
	$usercheck="admin";
	if($_SESSION['username']!=$usercheck)
{

		header("location:../login.php");
}


}

//echo $_SESSION['username'];
?>



</body>
</html>