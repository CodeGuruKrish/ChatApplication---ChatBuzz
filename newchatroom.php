<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->

<!--code to create new chatrooms-->

<?php
   require_once("/chatfiles/setchat.php"); // checks setchat.php from chatfiles folder

   $newchatroom1 = NULL;
   $newchatroom2 = NULL;
   

 if(isset($_POST['submit'])) 
   {    
        		// to create second chat room and checks for existing chat rooms
        if(isset($_SESSION['newchatroom1']))
	    {  
            $roomname = $_POST['any_name'];
		    $lowerroomname = strtolower($roomname); 
			$lowerchat1 = $_SESSION['newchatroom1'];
			$lowerchatcheck1 = strtolower($lowerchat1); 
	        if($lowerroomname == $lowerchatcheck1 || $lowerroomname == "movies" || $lowerroomname == "sports" || $lowerroomname == "politics" || $lowerroomname == "science")
		    { echo "<script type='text/javascript'>alert('Room name already exists with that name! Please choose a different room name!');</script>";
			$newchatroom1 = $_POST['any_name']; 
            header( "refresh:0.0000000005; url=chat.php" ); 	
            exit;			
			}
		    else
		    {
			  if(isset($_SESSION['newchatroom2']))
			  {
			    echo "<script type='text/javascript'>alert('User gets to create two chatrooms alone!');</script>";
				header( "refresh:0.0000000005; url=/chatfiles/setchat.php" );
				header( "refresh:0.0000000005; url=chat.php" );
				exit;
				
	          }
              else
			  { 			  
		     $_SESSION['newchatroom2'] = $_SESSION['newchatroom1'];
	         $newchatroom2 = $_SESSION['newchatroom1'];
             $newchatroom1 = $_POST['any_name'];
			 $_SESSION['newchatroom2'] = "$newchatroom1";
	          }
			}
			
	    }
	 else
	        //Create first chat room and checks for existing chat rooms
	    {   
		   $roomname = $_POST['any_name'];
		   $lowerroomname = strtolower($roomname);
		   if($lowerroomname == "movies" || $lowerroomname == "sports" || $lowerroomname == "politics" || $lowerroomname == "science")
		   {
		      echo "<script type='text/javascript'>alert('Room name already exists with that name! Please choose a different room name!');</script>";
			  
		    }
		   else{	
            $newchatroom1 = $_POST['any_name'];   
            $_SESSION['newchatroom1'] = "$newchatroom1";
			}
		}
       
	}
   
?>
	
<!--html code for the design of the create chatroom phase-->

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" align="center">
<img src="images/chatbuzzmain.png" alt="Mountain View" style="width: 150x;height:75px" align="left">
<input type="text" name="any_name" id="any_name" title="Room name" style="color:#888;" 
    value="Room name" placeholder="Room name"/>
<input type="submit" value="Create Room" name="submit">
</form>



