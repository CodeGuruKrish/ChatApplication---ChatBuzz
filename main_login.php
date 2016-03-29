<!--Hithesh Krishnamurthy (1001096009)-->
<!--Lavanya Somashekar (1001104262)-->
<!--Girish Ramesh Babu (1001087481)-->
<!--Sunayana Suresh Gowda (1001107621)-->

<!--Main login page-->
<!--code for the UI of the main page and redirects to register page in case of new user-->
<!DOCTYPE html>
<html>
 	<head>
  		<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
  		<script src="form.js"></script>
  		<link href="form.css" rel="stylesheet" />
 	</head>
 	<body>
  		<div id="content">
			<form name="form1" method="post" action="checklogin.php" /> 
			<div class="loginForm">
			<img src="images/chatbuzz.png" alt="Mountain View" style="width: 300px;height:150px" align="center"> 
				<label>
					<span>Username</span>
					<input name="myusername" type="text" id="myusername">
				</label>
				<label>
					<span>Password</span>
					<input name="mypassword" type="password" id="mypassword">
				</label>
				<div class="submit">
				<input type="submit" name="Submit" value="Login">
				</form>
				</div>
				<div class="overlay">
					<div class="message processing">
						<h2>Logging In</h2>
					</div>
					<div class="message success">
						<h2>Logged In</h2>
						<p>You have been logged in</p>
					</div>
				</div>
			</div>
		<div class="loginForm" >Not registered yet??
 <a href="./register.php">Click here!</a></div>
</div>
<script>
    
<!--This verifies if the entered details are proper, else displays appropriate message-->

    function verifyfields(){
    if (!document.getElementById('myusername').value.trim()){
        alert('Username fields cant be left blank!');}
		else (!document.getElementById('mypassword').value.trim()){
	    alert('Password fields cant be left blank!');}
    }
</script>
 	</body>
</html>