<?php
session_start();
if(isset($_SESSION['reset']))
{?>
	<div class="alert alert-warning"><?php echo $_SESSION['reset']; 
	unset($_SESSION['reset']); ?></div>
<?php
}
$mysqli=new mysqli("localhost","root","","question_bank");




?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div style="margin: 200px;"></div>
	<div class="row justify-content-center">
<form action="squestion.php" method="post">

	<div class="form-group">
	<b><label>ईमेल आइडी</label></b>
	<input type="email" class="form-control" name="forpassword"></div>
	<div class="form-group">
	<button type="submit" class="btn btn-primary" name="vemail">ईमेल चेक करें</button>
</div>
</form>
</div>

</body>
</html>