<?php
//authentication function
function auth ($user, $pass){
    global $db ;
    $s ="select * from accounts where user='$user' and pass= '$pass'";
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

    $s1 = "insert into accounts values( '$user', '$pass')"; //insert value in Transaction table

    ($t1 = mysqli_query($db, $s1)) or die (mysqli_error($db));

}
?>