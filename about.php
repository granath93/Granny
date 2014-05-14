 <!-- <!DOCTYPE html>
<HEAD>
 <TITLE>Om företaget</TITLE>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
 <link rel="stylesheet" href="css/produkt.css" type="text/css">
Javascript
 <script type="text/javascript"> 
 function hgsubmit() 
 { 
 if (/\S+/.test(document.hgmailer.name.value) == false) alert ("Please provide your name."); 
 else if (/^\S+@[a-z0-9_.-]+\.[a-z]{2,6}$/i.test(document.hgmailer.email.value) == false) alert ("A valid email address is required."); 
  else if (/\S+/.test(document.hgmailer.comment.value) == false) alert ("Your email content is needed."); 
   else { 
        document.hgmailer.submit(); 
        alert ('Thank you!\nYour email is sent.'); 
        } 
 } 
 </script> 
 slut Javascript  
 
 </head> 
 
 <body>-->
<?php 

$currentPage="about";

include("database.php");
include("header.php"); 
?>

<div class="content">



<h1>Om företaget</h1>	
<p>Vi skapade företaget Stödshoppen för att underlätta pensionärers vardag.<br>
	Vi är fyra studenter på Högskolan i Halmstad som har utvecklat denna hemsidan.</p>
<h2>Hör av dig till oss!</h2>
<div class="fieldset">
<form action="#" method="post" id="kontakt">


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
	
</div>

		</form>
</div>

<?php include("footer.php");