<?php
session_start();

//$page = basename($_SERVER["PHP_SELF"], ".php"); 

$page = "index.php";
$_SESSION = array(); 
 
session_unset(); 
session_destroy(); 
 
header("Location: {$page}"); 


?>