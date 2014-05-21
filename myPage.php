<?php
$currentPage="myPage";
include("database.php");
include("header.php");

$tableShipment= "shipment";
$tableArticle= "article";
$tableCustomer= "customer";
$feedback = '';


if(!empty($_POST)) {
        
		$table = "customer";
		
		$Fname =		isset($_POST['Fname']) ? $_POST['Fname'] : ''; 
		$Lname =		isset($_POST['Lname']) ? $_POST['Lname'] : '';
		$Address =		isset($_POST['Address']) ? $_POST['Address'] : '';
		$Zip =			isset($_POST['Zip']) ? $_POST['Zip'] : '';
		$Email =		isset($_POST['Email']) ? $_POST['Email'] : ''; 
		$Password =		isset($_POST['Password']) ? $_POST['Password'] : '';
		
			if($Fname == '' || $Lname == '' || $Address == '' || $Zip == '' || $Email == ''|| $Password == ''){
				$feedback = "Fyll i alla fält";
			}
			else {
				$Fname 		= utf8_encode($mysqli->real_escape_string($Fname)); 
				$Lame 		= utf8_encode($mysqli->real_escape_string($Lname)); 
				$Address 	= utf8_encode($mysqli->real_escape_string($Address)); 
				$Zip 		= utf8_encode($mysqli->real_escape_string($Zip)); 
				$Email		= utf8_encode($mysqli->real_escape_string($Email)); 
				$Password 	= utf8_encode($mysqli->real_escape_string($Password)); 
		
		$query = <<<END
		UPDATE customer
		SET Fname='{$Fname}', 
			Lname='{$Lname}', 
			Address='{$Address}', 
			Zip='{$Zip}', 
			Email='{$Email}', 
			Password='{$Password}'
		WHERE CustomerID=$_SESSION[userId];
END;
	
	$mysqli->query($query) or die("Could not query database" . $mysqli->errno . " : " . $mysqli->error); //Performs query 
	$feedback = "Dina uppgifter har ändrats";
	header("Location: myPage.php");
    }
	$feedback = "Dina uppgifter har ändrats";
	$mysqli->close();
}
?>
<div class="content">
	<div class="MPcontentOrder">
		<br></br>
			<p> Här kan du se dina tidigare beställningar.<br><br></p>

<?php
$result = <<<END
	SELECT *
	FROM {$tableShipment}, {$tableArticle}
	WHERE CustomerID=$_SESSION[userId] AND article.ArticleID=shipment.ArticleID
END;

$res = $mysqli->query($result) or die ("Could not query database" . $mysqli->errno ." : " . $mysqli->error);
	
	while($row = $res->fetch_object()) {
	
	$ShipmentID	= ($row->ShipmentID);
	$Date		= ($row->Date);
	$Amount		= ($row->Amount);
	$Price		= ($row->Price);
	$ArticleID	= ($row->ArticleID);
	$ArticleName = ($row->ArticleName); ?>
	
		
		<div class="MPcontentOrderTd">
			<tr><p>
				<td>Order: <?php echo $ShipmentID ?></td>
			<br>
				<strong><td>Beställt: <?php echo $Date ?></td>
			<br>
				<td>Produkt: {$ArticleID} st {$ArticleName}</td>
			<br>
				<td>Antal: {$Amount}</td>
			<br>
				<td>Pris: {$Price} </td></p>
			</tr></strong>

		</div class="MPcontentOrderTd">
<hr>
<?php 
}


?>


</div>
	<div class="MPcontent">

<br></br>

<p> Här kan du ändra dina uppgifter, om du exempelvis flyttat.</br> Bara fyll i de nya uppgifterna och klicka på klar!</p>

 <form action="myPage.php" method="post" id="changeID-form">
			<p><label for ="Fname">Förnamn:</label>
 			&nbsp; &nbsp; &nbsp; <input type="text" id="Fname" name="Fname" value=""/><br></br>
 			<label for ="Lname">Efternamn:</label>
 			&nbsp; &nbsp; <input id="Lname" name="Lname" value=""/><br></br>
  			<label for ="Address">Adress:</label>
 			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" id="Address" name="Address" value=""/><br></br>
  			<label for ="Zip">Postnummer:</label>
 			<input type="number" id="Zip" name="Zip" value=""/><br></br>
 			<label for ="Email">E-post:</label>
 			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" id="Email" name="Email" value="" /><br></br>
 			<label for ="Password">Lösenord:</label>
 			&nbsp; &nbsp; &nbsp; <input type="password" id="Password" name="Password" value=""/><br></br></p>
			<button class="login" style="margin-left:200px; margin-right:auto;" id="login"><p>KLAR</p></button>
 		</form>
	</div>

</div>
<?php include("footer.php");?>