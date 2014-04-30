<?php

$currentPage="login";

include("database.php");
include("header.php");

$feedback = "";

if(!empty($_POST)){ 

	$table = "customer";

	$username = 	trim($_POST['username']); 
	$password = 	trim($_POST['password']);


	if($username == '' || $password == '' ){
	$feedback = "<p> Fyll i alla fält, tack.</p>";
	}
	else {
	$username = utf8_encode($mysqli->real_escape_string($username)); 
	$password = utf8_encode($mysqli->real_escape_string($password)); 	
	$query = <<<END
	
	SELECT * 
	FROM {$table} 
	WHERE Email = '{$username}' AND Password = '{$password}'; 

END;
	
	$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error); //Performs query 
	

if($res->num_rows == 1){
	
	$row = $res->fetch_object();
	

	if($row->Password == $password){
	session_start(); 
	session_regenerate_id(); 
	 
	$_SESSION["username"] = $row->Fname; 
	$_SESSION["userId"] = $row->CustomerID; 
	 
	header("Location: index.php");


	}

	else{
		$feedback = " <p> Lösenordet stämmer inte </p>"; //Mina feedbacks visas inte, vad är fel
	}

	$res->close();
}

else{
	$feedback =" <p>Användarnamnet stämmer inte</p>";
}


$mysqli->close();

	}
}


 ?>

<div class="messageContent">
	<?php echo $feedback;?>
</div>


<div class="content">
<div class="loginContent">
<h1>Logga in här</h1>	

<p> Fyll i fälten, klicka sedan "Klar" för att logga in. </p><br>



<form action="login.php" method="post" id="login-form">
			<p><label class="form" for ="username">Din Email:</label></p>
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input class="form" type="text" id="username" name="username" value="" /><br><br>
			<p><label  class="form" for ="password">Ditt lösenord:</label></p>
			 &nbsp; &nbsp;<input class="form" id="password" name="password" value=""/><br><br>
			<button class="form" id="login"><p>Klar</p></button>
		</form>
</div>


</div>




<?php include("footer.php"); ?>