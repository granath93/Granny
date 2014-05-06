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
	Vi är fyra studenter på högskolan i Halmstad som har utvecklat denna hemsidan.</p>
<h2>Hör av dig till oss!</h2>

<form action="#" method="post" id="kontakt">
<fieldset>
<label for="Namn">Namn:</label>
	<input type="text" name="name" id="Namn"><br>
<label for="Mail">Mail:</label>
	<input type="mail" name="mail" id="Mail"><br>
<label for="Telefonnummer">Telefonnummer:</label>
	<input type="number_format" name="telefonnummer" id="Telefonnummer"><br>
<label for="essay">Meddelande:</label><br>
	<textarea name="essay" rows="10" cols="30" name="Meddelande:" id="essay"></textarea><br>
<input type="submit" value="SKICKA">
</fieldset>

<!-- Exmplet formulär: 
 
- Replace the words in bold black with your domain name and your email. 
- Replace the words in bold blue with whatever you want that part of the form to say. 
- Save it as a .html . 
- Upload and you are done. 

<form action="http://www.mydomain.com/cgi-sys/formmail.pl" method="post" name="hgmailer"> 
 <input type="hidden" name="recipient" value="myemail@mydomain.com"> 
 <input type="hidden" name="subject" value="FormMail E-Mail"> 
Whatever you want to say here<br><br> 
Visitor Name: <input type="text" name="name" size="30" value=""><br> 
Visitor E-Mail: <input type="text" name="email" size="30" value=""><br> 
E-Mail Content: <textarea name="comment" cols="50" rows="5"></textarea><br><br>
 <input type="button" value="E-Mail Me!" onclick="hgsubmit();"> 
 <input type="hidden" name="redirect" value="http://www.mydomain.com/redirect-path"> 
 </form> -->
		</form>
</div>

<?php include("footer.php");