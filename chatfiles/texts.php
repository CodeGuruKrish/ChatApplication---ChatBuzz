<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->

<!--php code for user assistance-->

<?php
// Texts added in site (English)
$en_site = array(
  'chat'=>'Chat',
  'chatlogged'=>'<h3 id="chlogged">Please login to chat!</h3><div style="text-align:center"><a href="main_login.php">Click here to login</a><div>',
  'online'=>'Online',
  'no1online'=>'No online members!',
  'loadroom'=>'<h3>Loading Chat-Room. Please wait...</h3>',
  'notchat'=>' &bull; No chats found in this room.',
  'logoutchat'=>'Logout from Chat',
  'enterchat'=>'Hi <b>%s</b>..!!Click here to enter the Chatroom',
  'err_savechat'=>'Unable to save data in: %s , or the file cannot be created',
  'err_textchat'=>'The text must contain between 2 and 200 characters'
);


// Sets an json object for JavaScript with text messages according to language set
function jsTexts($lsite) {
  // define the JavaScript json object
$texts = 'var texts = {
 "online":"'.$lsite['online'].'",
 "no1online":"'.$lsite['no1online'].'",
 "notchat":"'.$lsite['notchat'].'",
 "loadroom":"'.$lsite['loadroom'].'"
};';

  return '<script type="text/javascript"><!--'.PHP_EOL.
  $texts.PHP_EOL.
  '//-->
  </script>';
}