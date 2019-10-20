<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include (  "A1function.php"     ) ;
include (  "account.php"     ) ;

$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_error()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();}
echo "<br>Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); 

//$user   = getdata("user");
//$pass   = getdata("pass");
//$amount = getdata("amount");
//$choice = getdata ("choice");
//$number = getdata("number");
$user = $_GET ["user"];
$pass = $_GET ["pass"];
//$mail = isset ($_GET ["mail"]);
//    if ($mail == true){
//    $mail="Y";}
//    else
//      $mail="N";
//$output = "";
echo "$user<br>";
echo "$pass<br>";
if(  ! auth ($user, $pass)){
  exit("<br><br>Please, Enter Correct User & Password");}

//if ($choice =="nothing")
//  exit("<br><br> Please Select an Options");
//else if ($choice == "show"){
//    show($user, $number, $output);}
//else if ($choice == "deposit"){
//    deposit($user, $output, $mail, $amount);}
//else if ($choice == "withdraw"){
//    withdraw($user, $output, $mail, $amount);}
//if  ($mail == "Y"){
//    mailer($user, $output);}
//
echo "<br><br>Good Bye" ;
mysqli_close($db);
exit ( "<br><b>Task completed.</b><br>"  ) ;


?>