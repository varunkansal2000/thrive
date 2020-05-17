<?php 
session_start();
date_default_timezone_set("Asia/Calcutta");
if(!isset($_SESSION["password"]))
{
header('Location: ./404.html');
            }

require_once "config.php";

// initializing variables
$username= $_SESSION["username"];
$password= $_SESSION["password"];
$semester = $question = "" ;
$batch = "";
$video = "";
$s5="";
$s6="";
$date12 = date('Y-m-d');



$errors = array(); 
$il=$_SERVER['REMOTE_ADDR'];
// connect to the database

// REGISTER USER


 $sql_query1="select semester as s from login where phone ='".$username."' and password='".$password."'";
            $result1 = mysqli_query($link,$sql_query1);
            $s1 = mysqli_fetch_array($result1);
           

            $sql_query4="select batch as b from login where phone ='".$username."' and password='".$password."'";
          	$result4 = mysqli_query($link,$sql_query4);
			$s4 = mysqli_fetch_array($result4);

   $sql_query3="select video as v from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'";
          	$result3 = mysqli_query($link,$sql_query3);
			$s3 = mysqli_fetch_array($result3);
	      
	$sql_query5="select topic as t from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'";
          	$result5 = mysqli_query($link,$sql_query5);
			$s5 = mysqli_fetch_array($result5);
	       
	      

	$sql_query6="select date1 as d from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'";
          	$result6 = mysqli_query($link,$sql_query6);
			$s6 = mysqli_fetch_array($result6);

 	$sql_query7="select time1 as t from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'";
	       $result7 = mysqli_query($link,$sql_query7);
		   $s7 = mysqli_fetch_array($result7);
 	

	       echo "date stored is".$s6[0]."\n";
	       
	       echo "time stored is".$s7[0]."\n";
 			$te = date("H:i"); 
	        $s71 = explode (":", $s7[0]);
	        $te1 = explode (":", $te);
	        $b[0]=$te1[0]-$s71[0];
	        $b[1]=$te1[1]-$s71[1];

	 
	 echo "time is".$te."\n";
	 echo " subtraction is".$b[0];
	 if($b[0]==0)
	 {
	 	echo"code can be accessd".$b[0];
	 }
?> 