<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<div  style=" margin-bottom: 20px;margin-left:94%; margin-top: 5px; "><a href="template/index.php?logout='1'"
               class="btn btn-info">लॉग आउट</a>
</div>
<div  style=" margin-bottom: 20px;margin-left:94%; margin-top: 5px; "><a href="template/index.php"
               class="btn btn-info">मुख्य पृष्ठ</a>
</div>
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
if(!isset($_POST['submit']))
{
$_SESSION['submittedalready2']="आप पहले ही सबमिट कर चुके हैं!";?>
<div class="alert alert-warning">
<?php
echo $_SESSION['submittedalready2'].'<br/>'; 

echo 'आपके इतने नंबर हैं .......' . $_SESSION['score2'] . ' इतने मे से .......' . $_SESSION['x2'] ;
}?>
</div>
<?php 
$y=0;
$x=0;
$score = 0;
$idarray=$_SESSION['idarray2'];
//for ($z=0; $z <2 ; $z++) {
  //  echo $idarray[$z].'<br/>';
//}
$correctarray=array();
$incorrectarray=array();
$unansweredarray=array();
if(isset($_POST['submit']))
{
    unset($_SESSION['backdeclined2']);
    $_SESSION['submittedalready2']="आप पहले ही सबमिट कर चुके हैं!";
$mysqli = new mysqli('localhost','root','','question_bank') or die(mysqli_error($mysqli));



for ($i=0; $i<5; $i++)
{       
    if(!isset($_POST[$x]))
    {
        array_push($unansweredarray,$idarray[$i]);
        $x++;

        echo "प्रशन ".$x." नहीं किया गया".'<br/>';
        echo '-------------------------------------- <br />' ;
        continue;
        
    }

      $fullAnswer = $_POST[$x];
      $lastSpace = strrpos($fullAnswer," ");
    $questionId = substr($fullAnswer,$lastSpace+1);
    $result =  $mysqli->query("SELECT * FROM mcq2 WHERE id=$questionId") or die($mysqli->error);
    $row =$result->fetch_assoc();
    echo $row['question'] . '<br />';
    $answer_selected=substr($fullAnswer,0,$lastSpace);
    $correct = $row['answer'] ; 

    if ($answer_selected == $correct ) {
        $score++;
        $acolor = 'green' ;
        array_push($correctarray,$idarray[$i]);
    }
    else {
    $acolor = 'red' ;
    array_push($incorrectarray,$idarray[$i]);
    }
    echo 'आपका जवाब <font color=' . $acolor . '>' . $answer_selected . '<font color=black> <br />';
    echo 'सही जवाब है ' . $correct . '<br />' ;
    echo '-------------------------------------- <br />' ;
    $x++;
}
echo 'आपके' . $score . ' नंबर है ' . $i . ' मे से';
$_SESSION['score2']=$score;
$_SESSION['x2']= $i;
//echo 'hidden value is:'.$_POST['timer'];
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$ipadr=get_client_ip();
//echo '<br/>'.$ipadr;
$timer=$_POST['timer'];
$_SESSION['score2']=$score;
$_SESSION['x2']=$i;
$r=implode(",",$correctarray);
$s=implode(",",$incorrectarray);
$t=implode(",",$unansweredarray);
$username=$_SESSION['username'];
//$username="user20";
$starttime=$_SESSION['start_time2'];
if(!isset($_SESSION['resultsaved2'])){
$mysqli->query("INSERT INTO result(username,section,correct,incorrect,unanswered,stime,rtime,score,ip) VALUES('$username','3','$r','$s','$t','$starttime','$timer','$score','$ipadr')")or die($mysqli->error);
$_SESSION['resultsaved2']="result saved";}

}

?>
</body>
</html>