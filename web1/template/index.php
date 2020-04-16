<?php 
session_start();

if(!isset($_SESSION['username']))
{
	$_SESSION['msg']="you must log in to view this page";

	header("location:../login.php");
}
if(isset($_SESSION['username']))
{
	$usercheck="admin";
	if($_SESSION['username']==$usercheck)
{

		header("location:../login.php");
}
}
if(isset($_SESSION['backdeclined']))
{
	header("location:../second.php");
}
if(isset($_SESSION['backdeclined1']))
{
	header("location:../part2.php");
}
if(isset($_SESSION['backdeclined2']))
{
	header("location:../part3.php");
}
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['username']);
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	 <style type="text/css">
	 	.navbar-nav > li{
  margin-left:30px;
  margin-right:30px;
}
	 </style>
</head>
<body background="../image2.jpg" style="background-size: 1400px 670px; background-repeat: no-repeat;background-attachment: fixed;">
	
	
	<?php 
	if (isset($_SESSION['username'])):
	?>

	<!-- <div style=""><a href="first.php"
				class="btn btn-info">अनुभाग 1</a></div>
				<div style="margin:50px;"><a href="first1.php"
				class="btn btn-info">अनुभाग 2</a></div>
				<div style="margin:50px;"><a href="first2.php"
				class="btn btn-info">अनुभाग 3</a></div> -->



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav  ">
      <li class="nav-item ">
        <a class="nav-link" href="first.php" target="_blank">भाग 1 </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="first1.php" target="_blank">भाग 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="first2.php" target="_blank">भाग 3</a>
      </li>
    </ul>
      <ul class="navbar-nav ml-auto">
     <span class="navbar-text nav-link" style="font-size: 18px;">
      <?php echo $_SESSION['username'];?>
    </span>
  
    	<li class="nav-item"> <a href="index.php?logout='1'"
				class="btn btn-info" >लॉग आउट</a></li>
    </ul>
  </div>
</nav>

	
	



<?php endif; ?> 
<center>
<div style="color: white;"><?php
if(isset($_SESSION['after1day']))
{
	echo $_SESSION['after1day'].$_SESSION['timeafter1day'];
	unset($_SESSION['after1day']);
}?></div> </center>
</body>
</html>