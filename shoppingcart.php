<?php 
$currentPage="shoppingcart";

include("database.php");
include("header.php"); 

$message="";

if(!isset($_SESSION['usename'])){
	$message = <<<END
	<h1>Du är inte inloggad</h1>
	<p>Du är inte inloggad och kan då inte se dina produkter i kundvagnen. 
	<a href="login.php">Logga in</a> för att börja lägga produkter i kundvagenen. </p> 
END;
}
?>

<div class="content">

<?php echo $message; ?>


</div>

<?php

include("footer.php");

?>
