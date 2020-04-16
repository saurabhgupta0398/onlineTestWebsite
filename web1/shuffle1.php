<?php

if(!isset($_SESSION['shuffled1']))
{
	$arr_rows = array();
$mysqli= new mysqli('localhost','root','','question_bank') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT * FROM mcq1 ORDER BY rand() LIMIT 5") or die($mysqli->error);
while( $row = $result->fetch_assoc() ){
$arr_rows[] = $row;}

$_SESSION[ 'arr_rows1' ] = $arr_rows;

}


?>