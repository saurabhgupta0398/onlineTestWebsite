<head>
	<script type="text/javascript" src="./lib/jquery-3.3.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
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
$mysqli=new mysqli("localhost","root","","question_bank");
$duration="";
$result=$mysqli->query("select * from table1 where id=4");
while($row=mysqli_fetch_array($result))
{
	$duration=$row["duration"];
}
$_SESSION["duration"]=$duration;
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
$_SESSION["start_time"]=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
$_SESSION["end_time"]=$end_time;
?>
<script type="text/javascript">
	window.location="../second.php";
</script>