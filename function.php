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

//registration function
function registration($user, $pass,$fname, $lname)
{
    global $db;

    $s1 = "INSERT INTO 490test (user, pass,fname,lname) VALUES ('$user', '$pass','$fname', '$lname');";

    ($t1 = mysqli_query($db, $s1)) or die (mysqli_error($db));
    echo " registration complete $fname";

}

//error message function here
function error($error_code, $error_message)
{
    global $db;

    $s1 = "INSERT INTO 490test (user, pass) VALUES ('$error_code', '$error_message');";

    ($t1 = mysqli_query($db, $s1)) or die (mysqli_error($db));
    echo " registration complete $error_message";

}
?>

