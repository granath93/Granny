<?php
$currentPage="createMember";
include("database.php");
include("header.php"); 



$feedback = '';
 
if(!empty($_POST)) {

		$table = "customer";
		
		$Fname =		isset($_POST['Fname']) ? $_POST['Fname'] : ''; 
		$Lname =		isset($_POST['Lname']) ? $_POST['Lname'] : '';
		$Address =		isset($_POST['Address']) ? $_POST['Address'] : '';
		$Zip =			isset($_POST['Zip']) ? $_POST['Zip'] : '';
		$Email =		isset($_POST['Email']) ? $_POST['Email'] : ''; 
		$Password =		isset($_POST['Password']) ? $_POST['Password'] : '';
		
			if($Fname == '' || $Lname == '' || $Address == '' || $Zip == '' || $Email == '' || $Password == ''){
				$feedback = "Du missade att fylla i ett fält";
			} 
				else{
				$Fname 		= utf8_encode($mysqli->real_escape_string($Fname)); 
				$Lame 		= utf8_encode($mysqli->real_escape_string($Lname)); 
				$Address 	= utf8_encode($mysqli->real_escape_string($Address)); 
				$Zip 		= utf8_encode($mysqli->real_escape_string($Zip)); 
				$Email		= utf8_encode($mysqli->real_escape_string($Email)); 
				$Password 	= utf8_encode($mysqli->real_escape_string($Password)); 
		
		$query = <<<END

		INSERT INTO customer(Fname,Lname,Address,Zip,Email,Password) 
		VALUES ("{$Fname}","{$Lname}","{$Address}","{$Zip}","{$Email}","{$Password}")
END;

	$mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error); //Performs query 
	$feedback = "Your post has been added";
	header("Location: login.php");
	
}


$mysqli->close();
} else {
	
	}

?>

<div class="messageContent">
	<?php echo $feedback;?>
</div>


<div class="NCcontent">
<br></br>
	<p>Här fyller du i dina uppgifter. Sedan är du redo att börja handla!</p><br>
		
		<form action="createMember.php" method="POST">
			<p><label for="Fname" for ="Fname">Förnamn:</label>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" type="text" id="Fname" name="Fname" value="" /><br><br>
			<label for="Lname" for ="Lname">Efternamn:</label>
			&nbsp; &nbsp; &nbsp; <input type="text" id="Lname" name="Lname" value=""/><br><br>
			 <label for="Address" for ="Address">Adress:</label>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" id="Address" name="Address" value=""/><br><br>
			<label for ="Zip">Postnummer:</label>
 			<input type="number" id="Zip" name="Zip" value=""/><br></br>
			 <label for="Email" for ="Email">Din E-post:</label>
			&nbsp; &nbsp; &nbsp; <input type="text" id="Email" name="Email" value=""/><br><br>
			 <label for="Password" for ="Password">Ditt lösenord:</label>
			 <input type="Password" id="Password" name="Password" value=""/><br><br></p>
			<button class="login" id="login"><p>Klar</p></button>
		</form>
	</div>

	
<?php include("footer.php"); ?>