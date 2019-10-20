<?php
function auth ($user, $pass){
global $db ;
//$pass = sha1 ($pass);
$s ="select * from accounts where user='$user' and pass= '$pass'";
echo "<br> SQL statement is $s<br>";
($t1= mysqli_query($db, $s) ) or  die ( mysqli_error( $db ) );
$num = mysqli_num_rows ($t1);
if ($num == 0){
return false;  }
else
return true;
//return $user; $pass;
}
?>