
<?php 

$currentPage="about";

include("database.php");
include("header.php"); 
?>

<div class="content">



<h1>Om företaget</h1>	
<p>Vi skapade företaget Stödshoppen för att underlätta pensionärers vardag.<br>
	Vi är fyra studenter på Högskolan i Halmstad som har utvecklat denna hemsidan.</p>

	<h2>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hör av dig till oss!<h2>
	
	
<div class="fieldset1">
<form action="#" method="post" id="kontakt">

<fieldset>
	<p><label class="form" for="Name" method="post" action="formmail.php">Namn:</label></p>
				<input class="form" type="text" name="name" id="Namn"><br>
	
	<p><label class="form" for="Mail">Mail:</label></p>	
				<input class="form" type="mail" name="mail" id="Mail"><br>
	
	<p><label class="form" for="Telefonnummer">Telefonnummer:</label></p>
				<input class="form" type="number_format" name="telefonnummer" id="Telefonnummer"><br>
	
	<p><label class="form" for="essay">Meddelande:</label></p><br>
	<textarea name="essay" rows="10" cols="30" name="Meddelande:" id="essay"></textarea><br>
	<!-- <input class="form" type="submit" value="SKICKA"> -->
				<button class="form" id="login"><p>SKICKA</p></button>	
	</fieldset>
		</div>
		</form>
	
</div>

<?php include("footer.php");