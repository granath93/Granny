<?php

$currentPage="login";

include("database.php");
include("header.php");

$feedback = "";

if(!empty($_POST)){ 

	

	$username = 	isset($_POST['username']) ? $_POST['username'] : ''; 
	$password = 	isset($_POST['password']) ? $_POST['password'] : '';



	if($username == '' || $password == '' ){
	$feedback = "<p> Fyll i alla fält, tack.</p>";
	}
	else {
	$username = utf8_encode($mysqli->real_escape_string($username)); 
	$password = utf8_encode($mysqli->real_escape_string($password)); 	
	$query = <<<END
	
	SELECT *  
	FROM customer  

END;
	
	$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error); //Performs query 
	

if($res->num_rows == 1){
	
	$row = $res->fetch_object();
	

	if(!$row->Password == ""){
	session_start(); 
	session_regenerate_id(); 
	 
	$_SESSION["username"] = $username; 
	$_SESSION["userId"] = $row->CustomerID; 
	 
	header("Location: index.php");


	}

	else{
		$feedback = " Lösenordet stämmer inte"; //Mina feedbacks visas inte, vad är fel
	}

	$res->close();
}

else{
	$feedback =" Användarnamnet stämmer inte";
}


$mysqli->close();

	}

}





 ?>



<div class="content">

<h1>Logga in!</h1>	

<p> Här kommer du kunna logga in! </p>



<form action="login.php" method="post" id="login-form">
			<label for ="username">Användarnamn:</label>
			<input type="text" id="username" name="username" value="" /><br>
			<label for ="password">Lösenord:</label>
			<input id="password" name="password" value=""/><br>
			<input type="submit" id="login" value="Login" />
		</form>



</div>




<?php include("footer.php"); ?>