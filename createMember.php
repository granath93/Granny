<?php

$currentPage="createMember";

include("database.php");
include("header.php"); ?>

<html>
<head>
<div class="content">

<h1>Välkommen!</h1>
</head>
</body>	
<p>Här fyller du i dina uppgifter. Sedan är du redo att börja handla!</p>

<div class="container">
<form action="insert.php" method="post" id="newMember">
 		<label for ="Fname">Förnamn:</label>
 			<input type="text" id="Fname" name="Fname" value="" /><br>
			
 			<label for ="Lname">Efternamn:</label>
 			<input id="Lname" name="Lname" value=""/><br>
			
  			<label for ="Address">Adress:</label>
 			<input type="text" id="Address" name="Address" value="" /><br>
			
  			<label for ="Zip">Postnummer:</label>
 			<input type="number" id="Zip" name="Zip" value="" /><br>
			
 			<label for ="Email">E-post:</label>
 			<input type="text" id="Email" name="Email" value="" /><br>
			
			<label for ="Password">Lösenord:</label>
 			<input type="password" id="Password" name="Password" value="" /><br><br>
			
 			<input type="submit" id="changeID-form" value="Skicka" />
 		</form>
	</div>
	
	<?php
	/*if(!empty($_POST)) {
	$Fname =		isset($_POST['Fname']) ? $_POST['Fname'] : '';
	$Lname =	isset($_POST['Lname']) ? $_POST['Lname'] : '';
	$Address =		isset($_POST['Address']) ? $_POST['Address'] : '';
	$Zip =		isset($_POST['Zip']) ? $_POST['Zip'] : '';
	$Email =		isset($_POST['Email']) ? $_POST['Email'] : '';
	$Password =		isset($_POST['Password']) ? $_POST['Password'] : '';
	
	foreach($_POST as $value) {
		if(stripos($value, 'Content-Type:') !== FALSE) {
				echo "There was a problem. Try again.";
				exit;
		}
		else {
		header('Location: myPage.php');
}
}
}*/	
?>
	
	</body>
</html>
