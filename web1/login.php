<?php include('template/server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
    .s1
    {
    	color: white;
    }
	</style>
	<title>
		Login
	</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body background="image2.jpg" style="background-size: 1400px 670px;   background-repeat: no-repeat;">
<?php
	if (isset($_SESSION['msg'])):
	?>
	<div class="alert alert-warning ">
		<?php 
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
?>
</div>
<?php endif;?>

<?php if(isset($_SESSION['username']))
{
	if($_SESSION['username']!="admin")
	header("location:template/index.php");
else
	header("location:template/insert.php");
}
?>
<h2 class="row justify-content-center form-group" style="color:orange;margin-top: 10px;font-family: Comic Sans MS;">लॉग इन पेज</h2>
<div class="row justify-content-center">
<!-- <div class="jumbotron" > -->
<form action="login.php" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
	<?php include('template/errors.php') ?>
	<div class="form-group">
	<label class="s1">यूज़र नेम</label>
	<input type="text" name="username" class="form-control" value="<?php echo $username;?>"  placeholder="यूज़र नेम" size="40" required></div>
	<div class="form-group">
	<label class="s1">पासवर्ड</label>
	<input type="password" class="form-control"  placeholder="पासवर्ड"  name="password1" required></div>
	<div class="form-group">
		<input type="checkbox" name="checkbox" value="check" id="agree" /> <a href="terms.html" style="color: white">शर्ते</a>
	</div>
	<div class="form-group">
	<button type="submit" class="btn btn-primary" name="login_user">लॉग इन</button> </div>
	<div class="form-group">
	<b><p class="s1">यूज़र नहीं हैं?</p><a href="registration.php" style="color: white">रजिस्टर करें</a></b>
	
	<b><a href="forgot.php" style="color: white; margin-left:140px;">पासवर्ड भूल गए?</a></b>
	</div>
</form>
<!-- </div> -->

</div>

</body>
</html>