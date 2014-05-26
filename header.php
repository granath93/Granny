<!--
DENNA FIL STARTAR VARJE SIDA PÅ WEBBSIDAN SAMT INFOGAR MENYN 
-->
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" charset="utf-8">
		<link rel="stylesheet" href="css/normalize.css" >
		<link rel="stylesheet" href="css/CSS.css" >
		<link rel="stylesheet" href="css/cssShopingcart.css" >
		<script src="#" charset="utf-8"></script>
			<title>StödShoppen</title>
	</head>
<body>

<?php session_start();

//Om användaren är inloggad visas ett välkomst-meddelande samt två knappar har "Logga ut" och "Min sida"
	if(isset($_SESSION["username"])){
		$message = "<p> Du är inloggad <strong>" . $_SESSION["username"] . "</strong>. </p>";
		$loginUrl= "logout.php";
		$loginName="LOGGA UT";
		$loginImg = "images/loggaut.png";
		$memberUrl= "myPage.php";
		$memberName="MIN SIDA";
		$memberImg = "images/minsida.png";

	}
//Om användaren INTE är inloggad har två knappar "Logga in" och "skaffa inloggning"
	else{
		$message="";
		$loginUrl="login.php";
		$loginName="LOGGA IN";
		$loginImg = "images/loggain.png";
		$memberUrl="createMember.php";
		$memberName="SKAFFA KONTO";
		$memberImg = "images/skaffain.png";
	}

?>

<div class="wrapper">

<!-- Logga och "hjälp"-tanten ovanför menyn-->
	<div class="logga">
		<a href="index.php"><img  src="images/Logga.png"></a>  <div class="FAQtant"><a href="FAQ.php"><img  src="images/hjälpreda.png"></a></div>
	</div><!--stänger logga-->

<!-- Menyn på webbsidan -->
<div class="topNav">
	<div class="navContent">
		<a href="index.php">					<button style="<?php if($currentPage=="index")echo "background-color: #b2cefb;"?>">											<img src="images/hem.png">								<br>	HEM							</button></a>
		<a href="product.php">					<button style="<?php if($currentPage=="product")echo "background-color: #b2cefb;"?>">										<img src="images/pro1.png">							 	<br>	PRODUKTER					</button></a>
		<a href="about.php">					<button style="<?php if($currentPage=="about")echo "background-color: #b2cefb;"?>">											<img src="images/omför.png">							<br>	FÖRETAGET					</button></a>
		<a href="<?php echo $memberUrl;?>">		<button style="<?php if($currentPage=="myPage" || $currentPage == "createMember")echo "background-color: #b2cefb;"?>">		<img src="<?php echo $memberImg;?>">					<br>	<?php echo $memberName;?>	</button></a>
		<a href="<?php echo $loginUrl;?>">		<button style="<?php if($currentPage=="login")echo "background-color: #b2cefb;"?>">											<img src="<?php echo $loginImg;?>">						<br>	<?php echo $loginName;?>	</button></a>
		<a href="shoppingcart.php">				<button style="<?php if($currentPage=="shoppingcart")echo "background-color: #b2cefb;"?>">									<img src="images/kundvagn.png">							<br>	KUNDVAGN					</button></a>
	 </div><!--stänger navContent-->
	</div><!--stänger topNav-->


	<!--Ett fält som visar ett välkomst-meddelande till användaren och skriver ut dess användarnamn-->
	<div class="messageContent">
		<?php echo $message;?>
	</div>


