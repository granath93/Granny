<!--
DENNA FIL LOGGAR UT ANVÄNDAREN NÄR DENNE TRYCKER PÅ "LOGGA UT"-KNAPPEN OCH TÖMMER $_SESSION
-->
<?php
	session_start();

	//$page = basename($_SERVER["PHP_SELF"], ".php"); 

	$page = "index.php";
	$_SESSION = array(); 
	 
	session_unset(); 
	session_destroy(); 
	 
	 //Skickar användaren till start-sidan
	header("Location: {$page}"); 


?>