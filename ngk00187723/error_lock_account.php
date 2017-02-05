<?php
include 'config/objects.php';

$time = time($_SESSION['loginAttempts']);
$timef = $myMember->convertDateTime($time);
print_r($timef);
echo "the time now is : " . time() . " and the loginattemps session time is " . $timef['sec'] . "<br>";

if (isset($_SESSION['loginAttempts']) && $_SESSION['loginAttempts'] = 3 && (time() -  $_SESSION['loginAttempts'] > 600)) {
	session_unset();
	session_destroy();
	
	/*
	if ($_SESSION['loginAttempts'] + 60 > time()) {
     $_SESSION['loginAttempts'] = 0;
	 echo "<b>Welcome back...</b><br>";
	} else {
     echo "still locked out...";
	 */
  }
//$_SESSION['loginAttempts']) = 0;
?>
<html>
<head>
<title>User Message</title>
<link rel="stylesheet" type="text/css" href="CSS/mystyle.css">
</head>
<body>
<div>
<h2>Login attempts Exceeded</h2>
<p class="warning">The permitted number of login attempts has been exceeded. For security reasons the user ID you have entered in the login form has been disabled. Please contact your account administrator.  


</div>
</body>
</html>