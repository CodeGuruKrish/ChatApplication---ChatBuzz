<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->

<!--This page flushes out all session variables and logs out the user-->



<?php

//To set the user offline in the database
 session_start();
 $ouser = $_SESSION['user'];
 $host="localhost"; // Host name 
$username="root"; // Mysql username , Change the username here in case of local xampp server
$password="hith1242"; // Mysql password, Change the password here in case of local xampp server 
$db_name="test"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select database.


 unset($chatrooms);
 unset($_SESSION);
 $_SESSION = array();
 
 header( "refresh:2; url=main_login.php" ); 
 
 session_destroy( );
 
 mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sqlflag=mysql_query("UPDATE $tbl_name SET oflag='0' WHERE username= '$ouser'")or die ('flag query is invalid: ' . mysql_error()); //Update the online flag in database


?>

<h4>You have been successfully logged out<h4>




