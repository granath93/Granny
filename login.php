<!--
DENNA FIL ÄR INLOGGNINGS-SIDAN PÅ WEBBPLATSEN. KONTROLLERAR SÅ ATT ANVÄNDARNAMET OCH LÖSENORDET ÄR RÄTT
SAMT SPARAR IN ANVÄNDARNAMNET OCH ANVÄNDARID IN I SESSION
-->

<?php

$currentPage="login"; //Sparar sidans namn i en variabel som sedan används i menyn i "header.php"

include("database.php");
include("header.php");

	//Håller variabeln tom för att senare få ett värde/text-värde
	$feedback = ""; 

	//Om fälten INTE är tomma sparas användarnamnet och lösenordet i två variabler
	if(!empty($_POST)){ 

		$table = "customer";

		$username = 	trim($_POST['username']); 
		$password = 	trim($_POST['password']);

		//Om något utav fälten är tomma skrivs en text ut som feedback att något inte stämmer
		if($username == '' || $password == '' ){
			$feedback = "<p> Fyll i alla fält, tack.</p>";
		}
		//Är båda fälten ifyllda sparas variablerna om och gör sidan säkrare från hackers 
		else {
			$username = utf8_encode($mysqli->real_escape_string($username)); 
			$password = utf8_encode($mysqli->real_escape_string($password)); 	
		
			//Hämat allt ur tabellen "customer" med en SELECT-sats
			$query = <<<END
			SELECT * 
			FROM {$table} 
			WHERE Email = '{$username}' AND Password = '{$password}'; 
END;
		//exekverar, verkställer SELECT-satsen 
			$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
			" : " . $mysqli->error); //Performs query 
		
				//Om det finns någon användare sparad görs detta
				if($res->num_rows == 1){
					
					$row = $res->fetch_object();
					
					//Kollar så att lösenordet som användaren skrev in stämmer överrens med det
					//lösenordet som är sparat i databasen. Om detta stämmer sparas användarnamet
					//och andändarId in i $_SESSION
					if($row->Password == $password){
						session_start(); 
						session_regenerate_id(); 
					 
						$_SESSION["username"] = $row->Fname; 
						$_SESSION["userId"] = $row->CustomerID; 
					 
					 //Skickar användaren till start-sidan
						header("Location: index.php");

						}
					
					// Stämmer inte lösenordet som användaren skrev in med det i databasen
					// skrivs ett meddelande ut "Lösenordet stämmer inte"
					else{
						$feedback = " <p> Lösenordet stämmer inte </p>"; //Mina feedbacks visas inte, vad är fel
					}
					
					$res->close();
				}

			//Finns det ingen medlem i databasen skrivs detta ut
			else{
				$feedback =" <p>Användarnamnet stämmer inte</p>";
			}

	//stänger databasen
	$mysqli->close();

		}
	} ?>

	<!-- Skriver ut feedback-meddelandet -->
	<div class="messageContent">
		<?php echo $feedback;?>
	</div>

<!-- Här startar sidan användaren ser med rubrik, brödtext och formulär -->
	<div class="content">
		<div class="loginContent">
			<h1>Logga in här</h1>	

				<p> Fyll i fälten, klicka sedan "Klar" för att logga in. </p><br>


					<form action="login.php" method="post" id="login-form">
						<p><label class="form" for ="username">Din Email:</label></p>
						 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input class="form" type="text" id="username" name="username" value="" /><br><br>
						<p><label  class="form" for ="password">Ditt lösenord:</label></p>
						 &nbsp; &nbsp;<input class="form" id="password" name="password" value=""/><br><br>
						<button class="form" id="login"><p>KLAR</p></button>
					</form>
		</div>
	</div>


<?php include("footer.php"); ?>