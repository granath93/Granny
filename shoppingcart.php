<?php 
$currentPage="shoppingcart";

include("database.php");
include("header.php"); 

$message="";

if(!isset($_SESSION["username"])){
	$message = <<<END
	<h1>Du är inte inloggad</h1>
	<p>Du är inte inloggad och kan då inte se dina produkter i kundvagnen. 
	<a href="login.php">Logga in</a> för att börja lägga produkter i kundvagenen. </p> 
END;
}

else{
	$message="";
}
?>

<div class="content">

	<?php echo $message; ?>

	<h1>Kundvagn</h1>
	<p> Här ser du alla dina produkter som du lagt i kundvagnen </p>

</div>

<?php

include("footer.php");

?>
