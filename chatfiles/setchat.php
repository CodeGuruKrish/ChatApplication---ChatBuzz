<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->

<!--php code for chat room creation and configuration settings-->

<?php
session_start();
include("newchatroom.php");

define('MAXROWS', 200);             // Maximum number of rows registered for chat
define('CHATLINK', 1);             // allows links in texts (1), not allow (0)


// Here create the rooms for chat

$chatrooms = array();
$counter = array();

$chatrooms[] = 'Movies';
$chatrooms[] = 'Sports';
$chatrooms[] = 'Politics';
$chatrooms[] = 'Science';


if(isset($_SESSION['newchatroom1']))
{
$chatrooms[] = $_SESSION['newchatroom1'];
}
if(isset($_SESSION['newchatroom2']))
{
$chatrooms[] = $_SESSION['newchatroom2'];
}

//we check for the login flag here
define('CHATADD', 0);
if(CHATADD !== 1) {
  if(isset($_SESSION['myusername'])) define('CHATUSER', $_SESSION['myusername']);
}

// Name of the directory in which we store the chat history as text files
define('CHATDIR', 'chattxt');

include('texts.php');             // file with the texts for different languages
$lsite = $en_site;                // Gets the language for site

if(!headers_sent()) header('Content-type: text/html; charset=utf-8');         // header for utf-8

// include the class ChatSimple, and create object from it
include('class.ChatSimple.php');
$chatS = new ChatSimple($chatrooms);  //Creating chat rooms

?>

