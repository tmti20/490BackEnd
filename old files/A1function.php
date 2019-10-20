<?php
//function show ( $user, $number, &$output ) {
//    global $db;
//	  if ($number <=0){    //Condition for valid input or blank
//       exit("<br><br><b> Please, Enter Number of Transactions You Want to See!!</b><br>");}
//
//     $output = "<br><b>Hello $user, Here is the details for your bank transactions!! </b><br>"; //greeting message
//     //User info from Accounts Table
//    $s = "select * from accounts where user = '$user' " ;
//    $output .= "<br> <b>SQL statement is : $s </b><br>";
//	  ($t = mysqli_query($db, $s) ) or die ( mysqli_error( $db ) );
//	  $num = mysqli_num_rows ( $t );
//	  $output .= "<br> There was $num row retrieved.<br><br>";
//
//    while ( $r = mysqli_fetch_array ( $t, MYSQLI_ASSOC) ) {
//       $pass = $r[ "pass" ];
//       $unpass = $r["PlainPass"];
//       $email = $r ["mail"];
//       $current = $r[ "current" ];
//       $transaction = $r["recent_trans"];
//
//       $output .= "Username is : $user<br>";
//       $output .= "The password is : $pass <br>";
//       $output .= "The Unhashed password is : $unpass <br>";
//       $output .= "The Email Address is : $email<br>";
//       $output .=  "The current balance is : $current<br>";
//       $output .= "Most recent transaction is : $transaction<br>";
//  	 };

//     // Data from Transactions Table
//   $s1 = "select * from transactions where user = '$user' order by date desc LIMIT $number";
//   $output .= "<br><b>SQL statement is $s1</b><br>";
//   ($t1= mysqli_query($db, $s1) ) or  die ( mysqli_error( $db ) );
//   $num = mysqli_num_rows ($t1);
//   $output .= "<br>Number of rows is : $num<br>";
//
//   while ( $r1 = mysqli_fetch_array ( $t1, MYSQLI_ASSOC) ) {
//     $type= $r1[ "type" ];
//     $amount= $r1[ "amount" ];
//     $date= $r1[ "date" ];
//     $mailreceipt= $r1[ "mail_receipt" ];
//
//     $output .="<br>Type of Transactions is: $type   | ";
//     $output .="Amount is: $amount  | ";
//     $output .="Date is: $date  | ";
//     $output .="Receipt E-Mail : $mailreceipt ";
//     };
//     echo $output;
//}

//Check for Authentication
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
//
////Function to GET DATA
//function getdata($user){
//   global $db;
//   $temp = $_GET [ $user ] ;
//   $temp = mysqli_real_escape_string($db, $temp);
//   return $temp;
//}
//
//// Deposit Function
//function deposit($user, &$output, $mail, $amount){
//    global $db ;
//    if ($amount <=0){   //Condition for valid input or blank
//    exit("<br><br><b> Please Enter a Valid Amount You Want to DEPOSIT</b> ");}
//
//    $output = "<br><b>Hello $user, Here is the details about deposit !! </b><br>"; //greeting message
//    $s1 = "insert into transactions values( '$user', 'D', '$amount', NOW(), '$mail')"; //insert value in Transaction table
//    $output.= "<br> SQL statement is : $s1 <br>";
//	  ( $t1 = mysqli_query($db, $s1) ) or die ( mysqli_error( $db ) );
//
//    $s2 = "update accounts set current = current+ $amount, recent_trans = NOW()  where user= '$user';"; //Update info in Accounts table
//    $output.= "<br> SQL statement is : $s2 <br>";
//	  ( $t2 = mysqli_query($db, $s2) ) or die ( mysqli_error( $db ) );
//
//    $s3 = "select * from accounts where user = '$user'";  //Select data from Accounts table
//    $output.= "<br><b> SQL statement is : $s3 </b><br>";
//	  ( $t3 = mysqli_query($db, $s3) ) or die ( mysqli_error( $db ) );
//
//    while ( $r = mysqli_fetch_array ( $t3, MYSQLI_ASSOC) ) {
//  		 $user = $r [ "user"];
//       $pass = $r[ "pass" ];
//  		 $current = $r[ "current" ];
//       $transaction = $r["recent_trans"];
//
//       $output.= "<br>Username : $user | ";
//  		 $output.= "Password : $pass | ";
//  		 $output.=  "Current balance : $current | ";
//       $output.= "Most recent transaction : $transaction | ";
//	 };
//
//  $s4= "SELECT * FROM transactions where user = '$user' ORDER BY date DESC LIMIT 1"; // Get data from Transaction Table
//    $output.= "<br><br><b>SQL statement is : $s4 </b><br>";
//	  ( $t4 = mysqli_query($db, $s4) ) or die ( mysqli_error( $db ) );
//
//   while ( $r1 = mysqli_fetch_array ( $t4, MYSQLI_ASSOC) ) {
//       $user= $r1[ "user" ];
//       $type= $r1[ "type" ];
//       $amount= $r1[ "amount" ];
//       $date= $r1[ "date" ];
//       $mailreceipt= $r1[ "mail_receipt" ];
//
//       $output .="<br>User is : $user | ";
//       $output .="Type of Transactions is : $type  | ";
//       $output .="Amount is : $amount  | ";
//       $output .="Date is : $date  | ";
//       $output .="Receipt E-mail : $mailreceipt ";
//   };
//   echo $output;
//}
//
//// Withdraw Function
//function withdraw($user, &$output, $mail, $amount){
//    global $db ;
//    if ($amount <=0){   //Condition for valid input or blank
//    exit("<br><br><b>Please Enter a Valid Amount You Want to Withdraw</b> ");}
//
//    $output = "<br><b>Hello $user, Here is the details about withdraw !! </b><br>"; //greeting message
//    // Overdraw Checking
//    $s = "select current from accounts where user = '$user'";
//    ( $t = mysqli_query($db, $s) ) or die ( mysqli_error( $db ) );
//    ( $rd = mysqli_fetch_array ( $t, MYSQLI_ASSOC) );
//    $over = $rd ["current"];
//    if ($amount > $over){
//        exit("<br><br> <b> Over Draw !! Enter Valid Amount </b>");}
//
//    $s1 = "insert into transactions values( '$user', 'W', '$amount', NOW(), '$mail')"; //insert value in Transaction table
//    $output.= "<br> SQL statement is : $s1 <br>";
//	  ( $t1 = mysqli_query($db, $s1) ) or die ( mysqli_error( $db ) );
//
//    $s2 = "update accounts set current = current- $amount, recent_trans = NOW()  where user= '$user';"; //Update info in Accounts table
//    $output.= "<br> SQL statement is : $s2 <br>";
//	  ( $t2 = mysqli_query($db, $s2) ) or die ( mysqli_error( $db ) );
//
//    $s3 = "select * from accounts where user = '$user' ";  //Select data from Accounts table
//    $output.= "<br><b> SQL statement is : $s3 </b><br>";
//	  ( $t3 = mysqli_query($db, $s3) ) or die ( mysqli_error( $db ) );
//
//    while ( $r = mysqli_fetch_array ( $t3, MYSQLI_ASSOC) ) {
//  		 $user = $r [ "user"];
//       $pass = $r[ "pass" ];
//  		 $current = $r[ "current" ];
//       $transaction = $r["recent_trans"];
//
//       $output.= "<br>User is : $user | ";
//  		 $output.= "The pass is : $pass | ";
//  		 $output.=  "The current balance is : $current | ";
//       $output.= "Most recent transaction is : $transaction | ";
//	 };
//
//   $s4= "SELECT * FROM transactions where user = '$user' ORDER BY date DESC LIMIT 1" ; // Get data from Transaction Table
//   $output.= "<br><br><b>SQL statement is : $s4 </b><br>";
//   ($t4 = mysqli_query($db, $s4) ) or die ( mysqli_error( $db ) );
//
//  while ( $r1 = mysqli_fetch_array ( $t4, MYSQLI_ASSOC) ) {
//       $user= $r1[ "user" ];
//       $type= $r1[ "type" ];
//       $amount= $r1[ "amount" ];
//       $date= $r1[ "date" ];
//       $mailreceipt= $r1[ "mail_receipt" ];
//
//       $output .="<br>User is : $user | ";
//       $output .="Type of Transactions is : $type  | ";
//       $output .="Amount is : $amount  | ";
//       $output .="Date is : $date  | ";
//       $output .="Receipt E-mail : $mailreceipt ";
//    };
//    echo $output;
//}
//
//// Mailer Function
//function mailer($user, &$output){
//   global $db;
//   $headers[] = 'Content-type: text/html; charset=iso-8859-1'; // Header for plain text to email
//
//   $s = "select * from accounts where user = '$user'";
//   ( $t = mysqli_query($db, $s) ) or die ( mysqli_error( $db ) );
//   $r = mysqli_fetch_array ( $t, MYSQLI_ASSOC);
//
//   $mail= $r["mail"];
//   $to = $mail;
//   $subject = "Transactions Details for " . $user;
//   $message = $output;
//   mail($to, $subject, $message,implode("\r\n", $headers)); // send mailer function
//   echo "<br><br><b>Email send complete</b>";
//}

?>