<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);

$hostname = "sql2.njit.edu"     ; 			// or "sql2.njit.edu"   OR "SQL1.NJIT.EDU"
$username = "ti36" ;
$project  = "ti36" ;
$password = "fQ8f50AMO" ;

$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_error()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();}
echo "<br>Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project );

include (  "function.php"     ) ;

//$user   = getdata("user");
//$pass   = getdata("pass");
//$amount = getdata("amount");
//$choice = getdata ("choice");
//$number = getdata("number");

$user = $_POST ["user"];
$pass = $_POST ["pass"];

//Authentication the user
if(  ! auth ($user, $pass)){
    exit("<br><br>Please, Enter Correct User & Password");}
else {
    echo "Welcome to SmartQueue";
}

mysqli_close($db);
exit ( "<br><b>Task completed.</b><br>"  ) ;


?>