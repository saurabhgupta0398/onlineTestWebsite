<!DOCTYPE html>
<html>
<head>
	<title>php tutorial</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></head>
<body>
	<div style="margin-left: 94%;margin-bottom: 20px;"><a href="index.php?logout='1'"
				class="btn btn-info">लॉग आउट</a></div>
<div style="margin-left: 85%;margin-bottom: 20px;"><a href="insert.php"
				class="btn btn-info">मुख्य पृष्ठ</a></div>
	<?php 


	require_once 'process.php';

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

if(isset($_SESSION['check']))
{
	echo $_SESSION['check'];
	unset($_SESSION['check']);
}
	?>
	<?php
	if (isset($_SESSION['message'])):
	?>
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php 
		echo $_SESSION['message'];
		unset($_SESSION['message']);
?>
</div>
<?php endif; ?>
	<div class="container">
<?php
$mysqli= new mysqli('localhost','root','','question_bank') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT * FROM mcq") or die($mysqli->error);
//pre_r($result);
?>
<div class="row justify-content-center">
	<table class="table">
		<thead>
			<tr>
				<th> प्रश्न</th>
				<th>विकल्प 1</th>
				<th>विकल्प 2</th>
				<th>विकल्प 3</th>
				<th>विकल्प 4</th>
				<th>उत्तर</th>
				<th colspan="2">कार्य</th>
			</tr>
		</thead>
		<?php
		while($row=$result->fetch_assoc()):?>
		<tr>
			<td><?php echo $row['question'];?> </td>
			<td> <?php echo $row['option1'];?></td>
			<td> <?php echo $row['option2'];?></td>
			<td> <?php echo $row['option3'];?></td>
			<td> <?php echo $row['option4'];?></td>
			<td> <?php echo $row['answer'];?></td>
			<td> <a href="process.php?edit=<?php echo $row['id'];?>"
				class="btn btn-info">
संपादित करें</a>
				<a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">हटायें</a>
			</td>
		</tr>

<?php endwhile; ?>
	</table>
	</div>

<?php
function pre_r( $array )
{
	echo '<pre>';
	print_r($array);
	echo '</pre>';
} ?>
<div class="row justify-content-center">

<form action="process.php" method="POST">
	<input type="hidden" name="id" value="<?php if(isset($_SESSION['id']))  echo $_SESSION['id'];unset($_SESSION['id']);?>">
	<div class="form-group">
	<label>Question</label>
	<input type="text" name="question" class="form-control" value="<?php if(isset($_SESSION['question']))  echo $_SESSION['question'];unset($_SESSION['question']);?>" placeholder="Enter question"></div>
	<div class="form-group">
	<label>Option1</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option1'])) echo $_SESSION['option1'];unset($_SESSION['option1']);?>"  placeholder="option1"  name="option1"></div>
	<div class="form-group">
	<label>Option2</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option2'])) echo $_SESSION['option2'];unset($_SESSION['option2']);?>"  placeholder="option2"  name="option2"></div>
	<div class="form-group">
	<label>Option3</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option3'])) echo $_SESSION['option3'];unset($_SESSION['option3']);?>"  placeholder="option3"  name="option3"></div>
	<div class="form-group">
	<label>Option4</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option4'])) echo$_SESSION['option4'];unset($_SESSION['option4']);?>"  placeholder="option4"  name="option4"></div>
	<div class="form-group">
	<label>Answer</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['answer'])) echo $_SESSION['answer'];unset($_SESSION['answer']);?>"  placeholder="answer"  name="answer"></div>
	<div class="form-group">
		<?php if($_SESSION['update']==true):
			$_SESSION['update']=false;
		?>
		<button type="submit" class="btn btn-info" name="update">Update</button>
		<?php else:?> 
 	<button type="submit" class="btn btn-primary" name="save">Save</button> 
 	<?php endif;?> </div>
</form></div>
</div>
</body>
</html>

