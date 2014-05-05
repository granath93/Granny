<?php

include("database.php");
include("header.php"); 
$tableCustomer = "customer";
?>

<div class="content">

<br></br>
<p style="text-align:center;">Här fyller du i dina uppgifter. Sedan är du redo att börja handla!</p><br>
		
		<form action="createMember.php" method="post" id="input.form">
			<p><label for="Fname" for ="Fname">Förnamn:</label></p>
			  <input type="text" type="text" id="Fname" name="Fname" value="" /><br><br>
			<p><label for="Lname" for ="Lname">Efternamn:</label></p>
			 <input type="text" id="Lname" name="Lname" value=""/><br><br>
			 <p><label for="Address" for ="Address">Adress:</label></p>
			 <input type="text" id="Address" name="Address" value=""/><br><br>
			 <p><label for="Zip" for ="Zip">Postnummer:</label></p>
			 <input type="text" id="Zip" name="Zip" value=""/><br><br>
			 <p><label for="Email" for ="Email">Din E-post:</label></p>
			 <input type="text" id="Email" name="Email" value=""/><br><br>
			 <p><label for="password" for ="password">Ditt lösenord:</label></p>
			 <input type="password" id="password" name="password" value=""/><br><br>
			<button class="login" id="login"><p>Klar</p></button>
		</form>

	</div>
<?php


	if(!empty($_POST)) {
		$Fname =		isset($_POST['Fname']) ? $_POST['Fname'] : ''; 
		$Lname =		isset($_POST['Lname']) ? $_POST['Lname'] : '';
		$Address =		isset($_POST['Address']) ? $_POST['Address'] : '';
		$Zip =			isset($_POST['Zip']) ? $_POST['Zip'] : '';
		$Email =		isset($_POST['Email']) ? $_POST['Email'] : ''; 
		$Password =		isset($_POST['Password']) ? $_POST['Password'] : '';
		
		foreach($_POST as $value) {
			if(stripos($value, 'Content-Type:') !== FALSE) {
				echo "There was a problem. Try again.";
				exit;
			}
		}	
		
		if($Fname == '' || $Lname == '' || $Address == '' || $Zip == '' || $Email == ''|| $Password == ''){
			$content = <<<END
				<div id="content">
				<p>Please fill out all fields.</p>
				</div><!-- container -->
END;
	
		} else {
			// SQL-injections
			$Fname = utf8_encode($mysqli->real_escape_string($Fname)); 
			$Lame = utf8_encode($mysqli->real_escape_string($Lname)); 
			$Address = utf8_encode($mysqli->real_escape_string($Address)); 
			$Zip = utf8_encode($mysqli->real_escape_string($Zip)); 
			$Email = utf8_encode($mysqli->real_escape_string($Email)); 
			$password = utf8_encode($mysqli->real_escape_string($password)); 

		
		//SQL query
		$query = <<<END
		--
		-- Insert new customer into DB
		--
		INSERT INTO {$tableCustomer} (Fname, Lname, Address, Zip, Email, Password)
		VALUES ('{$Fname}, '{$Lname}', '{$Address}', '{$Zip}', '{$Email}', '{$Password}');	
END;
	
		
		$feedback = "<p> Du kan nu logga in! </p>";
		header("Location: index.php");
}
}

include("footer.php"); ?>