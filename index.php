<?php

$currentPage="index";

include("database.php");
include("header.php"); 

$user ="";

if(isset($_SESSION["username"])){ 

	$user = $_SESSION["username"];
	
	$message = <<<END
	<p>För att börja kolla in våra produkter går du in på <a href="product.php">PRODUKT</a>. Vill du se vad du har 
	lagt i kundvagnen klickar du på <a href="shoppingcart.php">KUNDVAGN</a> och för att se din kontaktinformation
	eller tidigare köp, gå till <a href="#">MIN SIDA</a>. </p> 
END;
}

else{
	$message = <<<END
	<p> Det här är en sida för dig i dina bästa år. Vi säljer artiklar som kommer underlätta
	för er i vardagen. Våra produkter hittar ni under produktsidan. Vänligen gå in på
	<a href="createMember.php">SKAFFA EN INLOGGNING</a> eller om ni redan har en inloggning, klicka på knappen
	<a href="login.php">LOGGA IN</a> för att börja handla. </p>
END;

}	

?>

<div class="content">

<h1>Välkommen <?php echo $user; ?> !</h1>	

<?php echo $message; ?>

</div>

<?php include("footer.php"); ?>








 
