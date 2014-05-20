<!--
DENNA FIL KOPPLAR SAMMAN DATABASEN MED HELA WEBBSIDAN
-->

<?php

	$mysqli = new mysqli('localhost', 'root', '', 'granny'); // (HOST, USER, PASSWORD, DATABASE) 

		if(mysqli_connect_error()){
			echo "Kontakten misslyckades: " . mysqli_connect_error() . "<br>";
			exit();
		}

	//Gör så att databasen och webbsidan accepterar och visar svenska symboler/bokstäver så som ÅÄÖ
	$mysqli->set_charset("utf8");

?>