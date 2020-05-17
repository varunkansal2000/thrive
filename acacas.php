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



       
            $sql_query1="select semester as s from login where phone ='".$username."' and password='".$password."'";
            $result1 = mysqli_query($link,$sql_query1);
            $s1 = mysqli_fetch_array($result1);
           

            $sql_query4="select batch as b from login where phone ='".$username."' and password='".$password."'";
            $result4 = mysqli_query($link,$sql_query4);
            $s4 = mysqli_fetch_array($result4);
       
           

            $sql_query8 = "SELECT count(*) as cntUser8 FROM teacher WHERE semester ='".$s1[0]."' and batch='".$s4[0]."'";
        
            $result8 = mysqli_query($link,$sql_query8);
            $row8 = mysqli_fetch_array($result8);

            $count = $row8['cntUser8'];
            
            $ne = date('d-m-Y'); 
            $sql_query6="select date1 as d from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and date1='".$ne."'";
            $result6 = mysqli_query($link,$sql_query6);
            $s6 = mysqli_fetch_array($result6);
          

            $te = date("H:i"); 
            $te1 = explode (":", $te);      //division of current time
      $x=$te1[0];
$sql_query7="select time1 as t from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and date1='".$ne."'and time1 like'".$te1[0].":__%'";
           $result7 = mysqli_query($link,$sql_query7);
           $s7 = mysqli_fetch_array($result7);



           if($s7[0]==NULL)
{
    $te1[0]=$te1[0]-01;
    $sql_query7="select time1 as t from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and date1='".$ne."'and time1 like'0".$te1[0].":__%'";
    $result7 = mysqli_query($link,$sql_query7);
           $s7 = mysqli_fetch_array($result7);
echo "hello";
}
           if($s7[0]!=NULL)
            { ECHO"HELLO";
            $s71 = explode (":", $s7[0]);  //division of stored time 
                   // hours stored in it
                   // minutes stored in   
            
            if($s71[1]==0)
            {
              $b[1]=$te1[1]-$s71[1];
           if($b[1]>0&&$b[1]<60) 
{
        $sql_query5="select topic as t from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and batch='".$s4[0]."'and date1='".$ne."'and time1 ='".$s7[0]."'";
            $result5 = mysqli_query($link,$sql_query5);
      $s5 = mysqli_fetch_array($result5);
      $sql_query3="select video as v from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and batch='".$s4[0]."'and date1='".$ne."'and time1 ='".$s7[0]."'";
            $result3 = mysqli_query($link,$sql_query3);
      $s3 = mysqli_fetch_array($result3);
}
    }
            else
            { ECHO$s71[1];
                if($te1[1]>$s71[1])
                {   
                    $b[1]=$te1[1]-$s71[1];
                      if($b[1]>0&&$b[1]<60) 
            {
             $sql_query5="select topic as t from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and batch='".$s4[0]."'and date1='".$ne."'and time1 ='".$s7[0]."'";
            $result5 = mysqli_query($link,$sql_query5);
      $s5 = mysqli_fetch_array($result5);
      $sql_query3="select video as v from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and batch='".$s4[0]."'and date1='".$ne."'and time1 ='".$s7[0]."'";
            $result3 = mysqli_query($link,$sql_query3);
      $s3 = mysqli_fetch_array($result3);
            }
                }
                if($te1[1]<$s71[1]&&$s71[0]==$x-1)
                { ECHO$s71[1];
                    $b[1]=$s71[1]-$te1[1];
                      if($b[1]>0&&$b[1]<60) 
            { 
          $sql_query5="select topic as t from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and batch='".$s4[0]."'and date1='".$ne."'and time1 ='".$s7[0]."'";
            $result5 = mysqli_query($link,$sql_query5);
      $s5 = mysqli_fetch_array($result5);
      $sql_query3="select video as v from teacher where semester ='".$s1[0]."' and batch='".$s4[0]."'and batch='".$s4[0]."'and date1='".$ne."'and time1 ='".$s7[0]."'";
            $result3 = mysqli_query($link,$sql_query3);
      $s3 = mysqli_fetch_array($result3);
            }
                }
            }

                       // 7 days; 24 hours; 60 mins; 60 secs
}




?>