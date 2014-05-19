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


if(isset($_SESSION["username"])){
	$message = "<p> Du är inloggad <strong>" . $_SESSION["username"] . "</strong>. </p>";

$loginUrl= "logout.php";
$loginName="LOGGA UT";
$loginImg = "images/loggaut.png";
$memberUrl= "myPage.php";
$memberName="MIN SIDA";
$memberImg = "images/minsida.png";

}

else{
	$message="";
	$loginUrl="login.php";
	$loginName="LOGGA IN";
	$loginImg = "images/loggain.png";
	$memberUrl="createMember.php";
	$memberName="SKAFFA INLOGGNING";
	$memberImg = "images/skaffain.png";
	
}

?>


<div class="wrapper">

	<div class="logga">
		<a href="index.php"><img  src="images/Logga.png"></a>  <div class="tant"><a href="FAQ.php"><img  src="images/hjälpreda.png"></a></div>
	</div><!--stänger logga-->

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



<div class="messageContent">
	<?php echo $message;?>
</div>


