<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<?php
session_start();
include "new.php";
if(isset($_SESSION['mismatch']))
{?>
	<div class="alert alert-warning"><?php echo $_SESSION['mismatch']; 
	unset($_SESSION['mismatch']); ?> </div>
	<br><a class="btn btn-primary" href="forgot.php">ईमेल आइडी डाले</a>
<?php
}
if(isset($_POST['vanswer']))
{
$securityquestion=$_POST['squestion'];
$securityanswer=$_POST['sanswer'];
if(isset($_SESSION['securityanswer'])){
$trueanswer=$_SESSION['securityanswer'];}
if($securityanswer==$trueanswer)
{

//require_once "template/errors.php";
?>

<body>
	<div class="row justify-content-center">
	<form action="reset.php" method="post">
		<div class="form-group"> 
		<label>Enter Password</label>
		<input type="password" class="form-control" name="pswrd1" minlength="8" required>
		</div>
		<div class="form-group">
		<label>Confirm Password</label>
		<input type="password" class="form-control" name="pswrd2" minlength="8" required></div>
		<div class="form-group">
		<button type="submit" class="btn btn-primary" name="set">Save</button>
	</div>
	</form>
</div>
</body>
</html>
<?php
}

else
{
	?>
	<?php $_SESSION['wronganswer']="आपका उत्तर गलत है";
	header("location:squestion.php");
}



} 
?>