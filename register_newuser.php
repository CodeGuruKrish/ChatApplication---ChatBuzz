<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->

<!--code for creating a new user-->

<?php

ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username , Change the username here in case of local xampp server
$password="hith1242"; // Mysql password, Change the password here in case of local xampp server
$db_name="test"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


// Define $myusername and $mypassword 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 
$repeatmypassword=$_POST['repeatmypassword'];
$sql = "SELECT * FROM $tbl_name WHERE username='$myusername'";
$usrresult = mysql_query($sql); // checks the user name in the database
$usrcount= mysql_num_rows($usrresult);

//sets policy for the usernames accepted

$stringWithout = preg_replace('/[^a-zA-Z]/', '', $myusername);
$stringWith = $myusername;

//check for minimum length of the username and check in database 

if ($stringWith == $stringWithout)        
    {
        if (strlen($myusername) < 3){       
            echo "<script type='text/javascript'>alert('Short usernames  cant be allowed, Minumum length 3 characters.');</script>"; 
            echo "<script type='text/javascript'>alert('redirecting to registration page...');</script>";
            header( "refresh:0.2; url=register.php" ); 
            ob_end_flush();   //flushes data into database at the end 
            exit;    
    }
 else
    {
//Username is clean

        if ($usrcount == 1){ 
            //displays appropriate message if user name exists and redirects to registration page
   
            echo "<script type='text/javascript'>alert('Username already exist. Get creative now!');</script>"; 
            echo "<script type='text/javascript'>alert('redirecting to registration page...');</script>";
            header( "refresh:0.2; url=register.php" ); 
            ob_end_flush();   
            exit;    
        }
else{
//checks if password entered meets requirement

     if (strlen($mypassword) < 3){
     echo "<script type='text/javascript'>alert('Please enter a strong password');</script>";
     echo "<script type='text/javascript'>alert('redirecting to registration page...');</script>";
     header( "refresh:0.2; url=register.php" ); 
     ob_end_flush();   
     exit;    
    }
else{

//checks if entered password and repeat password match

     if ($_POST['mypassword'] == $_POST['repeatmypassword']) {


// To protect MySQL injection (more detail about MySQL injection)
     $myusername = stripslashes($myusername);
     $mypassword = stripslashes($mypassword);
     $myusername = mysql_real_escape_string($myusername);
     $mypassword = mysql_real_escape_string($mypassword);
	 
//md5 Encryption of username and password
	 $myusername = md5($myusername);
	 $mypassword = md5($mypassword);
	 
     $sql = "SELECT * FROM $tbl_name";
     $iniresult = mysql_query($sql);
     $inicount= mysql_num_rows($iniresult); 
     $sql= "INSERT INTO $tbl_name VALUES(NULL , '$myusername', '$mypassword', '0' , '0')";
     $result = mysql_query($sql);
     if($result){
     echo "Registered user!!";
	 }
     else{
     echo " Database Error!!";}

//add the user to database 

    $sql = "SELECT * FROM $tbl_name";
    $result = mysql_query($sql);
    $count= mysql_num_rows($result); 

    if($inicount < $count){     
       echo "<script type='text/javascript'>alert('registration successful! Please login now..');</script>"; 
       header( "refresh:2; url=main_login.php" ); 
         }
      }

    else {     
//displays appropriate message if password does'nt match and redirects to registration page 	
   
         echo "<script type='text/javascript'>alert('Passwords do not match! Please re-enter..');</script>"; 
         echo "<script type='text/javascript'>alert('redirecting to registration page...');</script>";
         header( "refresh:0.2; url=register.php" ); 
         ob_end_flush();   
         exit;    
   
    }
   }
  }  
 }
}
	else {  	
	
	//checks for user name policy, redirects incase of special characters in username
	
	echo "<script type='text/javascript'>alert('Special characters on username not allowed...');</script>";
	echo "<script type='text/javascript'>alert('redirecting to registration page...');</script>";
    header( "refresh:0.2; url=register.php" ); 
    ob_end_flush();   
    exit;    
	}


?>

