<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->


<!-- code for login and registration link-->

<?php
session_start();
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username , Change the username here in case of local xampp server
$password="hith1242"; // Mysql password, Change the password here in case of local xampp server 
$db_name="test"; // Database name 
$tbl_name="members"; // Table name 
$ip_addr = '';//IP address      
$idno = '';//ID no in DB
$count = 0;

//funtion to capture IP address of the user
function get_client_ip_env() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

// Connect to server and select database.

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 

$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

//md5 Decryption
	 $demyusername = md5($myusername);
	 $demypassword = md5($mypassword);
	 $_SESSION['demyusername'] = $demyusername;
     $_SESSION['demypassword'] = $demypassword; 

$sql="SELECT * FROM $tbl_name WHERE username='$demyusername' and password='$demypassword'";
$sqlid=mysql_query("SELECT id FROM $tbl_name WHERE username='$demyusername'") or die ('Query is invalid: ' . mysql_error()); //Getting ID number from DB
$result=mysql_query($sql);

while ($row = mysql_fetch_array($sqlid)) 
    {
	$idno = $row['id'];
    }

// Mysql_num_row is counting table row

$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    
    $_SESSION['myusername']="$myusername";
    $_SESSION['mypassword']="$mypassword"; 
	$ip_addr=get_client_ip_env();
	$sql="UPDATE $tbl_name SET ipaddr='$ip_addr' WHERE id='$idno'";
	header("location:login_success.php");
	$result=mysql_query($sql);

}
else {
    ob_start();      
    echo "<script type='text/javascript'>alert('Wrong username/password!!');</script>"; // display appropriate message on wrong password
    echo "<script type='text/javascript'>alert('redirecting back to login page...');</script>";
    header( "refresh:1; url=main_login.php" ); 
    ob_end_flush();   
    exit;    
}

?>

