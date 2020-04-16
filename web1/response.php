<?php
session_start();
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION["end_time"];
$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);
$differenceinseconds=$timesecond-$timefirst;
echo gmdate("H:i:s",$differenceinseconds);
?>