<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->

<!--login success and redirection page-->

<?php

  session_start();
  echo "<script type='text/javascript'>alert('Login successfull..Chatroom loading!');</script>";
  header("location:chat.php?");

?>
