<?php
//authentication function
function auth ($user, $pass){
    global $db ;
    $s ="select * from 490test where user='$user' and pass= '$pass'";
    echo "<br> SQL statement is: $s<br>";
    ($t1= mysqli_query($db, $s) ) or  die ( mysqli_error( $db ) );
    $num = mysqli_num_rows ($t1);
    if ($num == 0){
        return false;  }
    else
        return true;
}

//registration fuctino
function registration($user, $pass)
{
    global $db;

    $s1 = "INSERT INTO 490test (user, pass) VALUES ('$user', '$pass');";

    ($t1 = mysqli_query($db, $s1)) or die (mysqli_error($db));
    echo " registration complete $user";

}
?>