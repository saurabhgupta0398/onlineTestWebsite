<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?php
session_start();
$mysqli=new mysqli("localhost","root","","question_bank");
if(isset($_SESSION['wronganswer']))
{?>
	<div class="alert alert-warning"><?php echo $_SESSION['wronganswer']; 
	unset($_SESSION['wronganswer']); ?> </div><br><a class="btn btn-primary" href="forgot.php">ईमेल आइडी डाले</a>
<?php
}
if(isset($_POST['vemail']))
{
	$forpswrd=$_POST['forpassword'];

$sql="select * from register where email='$forpswrd';";
 $res=mysqli_query($mysqli,$sql);
if (mysqli_num_rows($res) > 0)
{
$results=$mysqli->query("SELECT * FROM register WHERE email='$forpswrd'");
$row=$results->fetch_assoc();
$_SESSION['securityquestion']=$row['squestion'];
$_SESSION['securityanswer']=$row['sanswer'];
$_SESSION['emailverify']=$row['email'];


?>
<div class="row justify-content-center">
	<form action="reset.php" method="post">
		<div class="form-group">
		<label>Security Question</label>
		<input class="form-control" type="text" name="squestion" value="<?php if(isset($_SESSION['securityquestion'])){echo $_SESSION['securityquestion']; unset($_SESSION['securityquestion']);  }?>" size="40"></div>
		<div class="form-group">
		<label>Answer</label>
		<input type="text" class="form-control" name="sanswer" size="30">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary"  name="vanswer">आन्सर चेक करें</button></div>
	</form>
</div>
</body>
</html>
<?php
}
else
{
	$_SESSION['reset']="Your email id is not registered";
	header("location:forgot.php");
}
}
?>