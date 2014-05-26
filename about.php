
<?php 
date_default_timezone_set('Europe/London');
$mysqli = new mysqli('localhost', 'md05phhe', 'uT04TAfxv_', 'md05phhe_db');
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
	

<?php
$feedback = "";

if(!empty($_POST)) {
	$name = 	isset($_POST['name']) ? $_POST['name'] : '';
	$email = 	isset($_POST['email']) ? $_POST['email'] : '';
	$msg = 		isset($_POST['msg']) ? $_POST['msg'] : '';
	$spamTest = isset($_POST['address']) ? $_POST['address'] : '';
	
	if($spamTest != '') {
		die("I think you're a robot. If you're not, go back and try again.");
	}
	
	if($name == '' || $email == '' || $msg == '') {
		$form = formHTML($name, $email, $msg);
		$content = <<<END

			<div id="container">
			<p>Var vänlig och fyll i alla fälten.</p>
				{$form}
			</div><!-- container -->
			
END;
	} else {
		
		foreach($_POST as $value) {
			if(stripos($value, 'Content-Type:') !== FALSE) {
				exit;
			}
		}
		
		$to = 			"malmborg85@hotmail.com";
		$subject = 		"Message from my webpage. Sender: " . $name;
		$headers = 		"MIME-Version: 1.0" . "\r\n";
		$headers .= 	"Content-type:text/html;charset=utf-8" . "\r\n";
		$headers .= 	"From: {$email}" . "\r\n";
		$headers .=		"Reply-To: {$email}";
		
		if(mail($to, $subject, $msg, $headers)) {
		
		$content = <<<END

			<div id="container">
				<p>Ditt meddelande har sänts. Tack!</p>
			</div><!-- container -->
			
END;

		} else {
			$content = <<<END
			
			<div id="container">
				<p>Något gick fel med att skicka mailet, var vänlig prova igen.</p>
				<p><a href="about.php">Tillbaka till formuläret.<a></p>
			</div><!-- container -->
			
END;
		}
	}
	
} else {

	$form = formHTML();

	$content = <<<END

			<div id="container">
				{$form}
			</div><!-- container -->
			
END;

}


//------------------------------------
//
function formHTML($name = "", $email = "", $msg = "") {
	$name 	= htmlspecialchars($name);
	$email 	= htmlspecialchars($email);
	$msg 	= htmlspecialchars($msg);
	
	return <<<END
				
		<div class="fieldset1">

			<form action="about.php" method="post">
				<fieldset>
					<p><label class="name">Namn:</label></p>
						<input type="text" id="name" name="name" value="{$name}"/><br>
					
					<p><label class="email">Mail:</label></p>
						<input type="text" id="email" name="email" value="{$email}" />
						
					<p><label for="msg">Meddelande:</label></p>
						
						<textarea id="msg" rows="10" cols="30" name="msg">{$msg}</textarea><br>
						<button class="submit" name="Submit" value="Submit"><p>SKICKA</p></button>	
						
				</fieldset>
		</div>	
			</form>
			</div>

END;
}
echo $content;

?>

<?php include("footer.php"); ?>


