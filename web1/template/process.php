<?php

session_start();
if(!isset($_SESSION['update']))
{
$_SESSION['update']="";}
$mysqli= new mysqli('localhost','root','','question_bank') or die(mysqli_error($mysqli));


if (isset($_POST['save'])) 
{
	$question=$_POST['question'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$answer=$_POST['answer'];


$mysqli->query("INSERT INTO mcq(question,option1,option2,option3,option4,answer) VALUES('$question','$option1','$option2','$option3','$option4','$answer')")or die($mysqli->error);
$_SESSION['message']="यह प्रश्न जोड़ दिया गया है";
    $_SESSION['msg_type']="success";
    header("location:web1.php");
}
if(isset($_GET['delete']))
{
	$id=$_GET['delete'];

	$mysqli->query("DELETE FROM mcq WHERE id=$id")or die($mysqli->error);
	$_SESSION['message']="यह प्रश्न हटा दिया गया है";
    $_SESSION['msg_type']="danger";
    header("location:web1.php");
}
if(isset($_GET['edit']))
{
	$id=$_GET['edit'];
	//$_SESSION['check']="running";
	$_SESSION['update']=true;
	$result=$mysqli->query("SELECT * FROM mcq WHERE id =$id")or die($mysqli->error);
	if(count($result)==1)
	{
		$row=$result->fetch_assoc();
		$_SESSION['question']=$row['question'];
		$_SESSION['option1']=$row['option1'];
		$_SESSION['option2']=$row['option2'];
		$_SESSION['option3']=$row['option3'];
		$_SESSION['option4']=$row['option4'];
		$_SESSION['answer']=$row['answer'];
		$_SESSION['id']=$id;
	}
	 header("location:web1.php");
}
if(isset($_POST['update']))
{
	$id=$_POST['id'];
	$question=$_POST['question'];

		$option1=$_POST['option1'];
		$option2=$_POST['option2'];
		$option3=$_POST['option3'];
		$option4=$_POST['option4'];
		$answer=$_POST['answer'];
		$mysqli->query("UPDATE mcq SET question='$question', option1='$option1', option2='$option2', option3='$option3', option4='$option4', answer='$answer' WHERE id=$id")or die($mysqli->error);
		header("location:web1.php");
}
?>