<?php
session_start();
$user="";
if(isset($_SESSION['username'])){
$user=$_SESSION['username'];}
if(!isset($_SESSION['username']))
{
	header("location:login.php");

}
if(isset($_SESSION['username']))
{
	$usercheck="admin";
	if($_SESSION['username']==$usercheck)
{

		header("location:login.php");
}
}
if(isset($_SESSION['submittedalready']))
{
	if(!$_GET['id'])
	{
		header("location:verify.php");
	}
}

$_SESSION['backdeclined']="You cannot go back";

?>




<?php
$mysqli=new mysqli('localhost','root','','question_bank')or die($mysqli->error);


$result=$mysqli->query("SELECT max(stime)as stime FROM result WHERE username='$user' and section='1'");
if(mysqli_num_rows($result)>0){
$row1=$result->fetch_assoc();
$time=$row1['stime'];

$time=date('Y-m-d',strtotime($time));
//echo $time.'<br/>';
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
$time1=date('Y-m-d ', strtotime('+1 days', strtotime($time)));
//echo $time1.'<br/>';
$now=date("Y-m-d ");
//echo $now;
if($time1<=$now)
{
	
	//echo "pass";
?>














<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>

<body>
		<div style="float: right;" id="response"></div>
<div class="container">
<?php
require_once "shuffle.php";
$_SESSION['shuffled']="questions picked";
$number = 0;
$x=0;
$i=0;
$idarray=array();
$questionsselected=$_SESSION['arr_rows'];
?>
<form method="POST" action="verify.php" name="myForm" id="form1"> 
<?php
while($i<5){
        $number++;  
        $id = $questionsselected[$i]['id'];
        $idarray[$i]=$id;
        $question =$questionsselected[$i]['question'];
      $ans_array = array($questionsselected[$i]['option1'],$questionsselected[$i]['option2'],$questionsselected[$i]['option3'],$questionsselected[$i]['option4']);
     shuffle($ans_array);
?>

 <h4> <?php echo $number . ".) " . $question; ?></h4>   
 
 <label><input type="radio" value="<?php echo $ans_array[0]." ".$id; ?>" name="<?php echo $x; ?>"> <?php echo $ans_array[0]; ?></label><br>
 <label><input type="radio" value="<?php echo $ans_array[1]." ".$id; ?>" name="<?php echo $x; ?>"> <?php echo $ans_array[1]; ?></label><br>
 <label><input type="radio" value="<?php echo $ans_array[2]." ".$id; ?>" name="<?php echo $x; ?>"> <?php echo $ans_array[2]; ?></label><br>
 <label><input type="radio" value="<?php echo $ans_array[3]." ".$id; ?>" name="<?php echo $x; ?>"> <?php echo $ans_array[3]; ?></label><br><br>
 

<?php
$x++;
$i++;
}
$_SESSION['idarray']=$idarray;
?>
<input type="hidden" name="timer" id="kanak" value="">
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>

<?php 
}
else
{
	$_SESSION['after1day']="You can only try section 1 on ";
	$_SESSION['timeafter1day']=$time1;
	unset($_SESSION['backdeclined']);
	header("location:template/index.php");
}
}
?>

<script type="text/javascript">
	setInterval(function()
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","response.php",false);
			xmlhttp.send(null);
			document.getElementById("kanak").value = xmlhttp.responseText;
			document.getElementById("response").innerHTML=xmlhttp.responseText;
			if(xmlhttp.responseText == "00:00:00")
			{
				document.myForm.submit.click();
				<?php $_SESSION['timeover']="true";?>
			}
		},1000);



//   $(window).bind('beforeunload', function(){
//   return "Do you want to exit this page?";
// });

// window.onload = function(){
// 	setTimeout(function(){
// 		document.getElementById("kanak").value="100";
// 		document.myForm.submit.click();
// 	},5000);

// };
// setInterval(function(){
// 	document.getElementById("form1").submit();
// },10000);
</script>
</body>
</html>