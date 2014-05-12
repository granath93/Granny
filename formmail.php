<?php

$from = $_POST["email"];
$telefonnummer = $_POST["telefonnummer"];

$message = $_POST["message"];

 if (mail ($to, $subject, $message ,"From: $name <$from>"))

 echo nl2br("<h2>Ditt meddelande har skickats!</h2> 
 <b>mottagare:</b> $to
 <b>telefonnummer:</b> $subject
 <b>meddelande:</b>
 $message
 ");

 else
 echo "Det gick inte att skicka ditt meddelande";
 */

 ?>