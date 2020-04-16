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


	require_once 'process3.php';

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
	?>
	<?php
	if (isset($_SESSION['message2'])):
	?>
	<div class="alert alert-<?=$_SESSION['msg_type2']?>">
		<?php 
		echo $_SESSION['message2'];
		unset($_SESSION['message2']);
?>
</div>
<?php endif; ?>
	<div class="container">
<?php
$mysqli= new mysqli('localhost','root','','question_bank') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT * FROM mcq2") or die($mysqli->error);
//pre_r($result);
?>
<div class="row justify-content-center">
	<table class="table">
		<thead>
			<tr>
				<th>प्रश्न</th>
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
			<td> <a href="process3.php?edit=<?php echo $row['id'];?>"
				class="btn btn-info">
संपादित करें</a>
				<a href="process3.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">हटायें</a>
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

<form action="process3.php" method="POST">
	<input type="hidden" name="id" value="<?php if(isset($_SESSION['id2']))  echo $_SESSION['id2'];unset($_SESSION['id2']);?>">
	<div class="form-group">
	<label>Question</label>
	<input type="text" name="question" class="form-control" value="<?php if(isset($_SESSION['question2']))  echo $_SESSION['question2'];unset($_SESSION['question2']);?>" placeholder="Enter question"></div>
	<div class="form-group">
	<label>Option1</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option12'])) echo $_SESSION['option12'];unset($_SESSION['option12']);?>"  placeholder="option1"  name="option1"></div>
	<div class="form-group">
	<label>Option2</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option22'])) echo $_SESSION['option22'];unset($_SESSION['option22']);?>"  placeholder="option2"  name="option2"></div>
	<div class="form-group">
	<label>Option3</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option32'])) echo $_SESSION['option32'];unset($_SESSION['option32']);?>"  placeholder="option3"  name="option3"></div>
	<div class="form-group">
	<label>Option4</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['option42'])) echo$_SESSION['option42'];unset($_SESSION['option42']);?>"  placeholder="option4"  name="option4"></div>
	<div class="form-group">
	<label>Answer</label>
	<input type="text" class="form-control" value="<?php if(isset($_SESSION['answer2'])) echo $_SESSION['answer2'];unset($_SESSION['answer2']);?>"  placeholder="answer"  name="answer"></div>
	<div class="form-group">
		<?php if($_SESSION['update2']==true):
			$_SESSION['update2']=false;
		?>
		<button type="submit" class="btn btn-info" name="update">Update</button>
		<?php else:?> 
 	<button type="submit" class="btn btn-primary" name="save">Save</button> 
 	<?php endif;?> </div>
</form></div>
</div>
</body>
</html>

