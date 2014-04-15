<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width" charset="utf-8">
<link rel="stylesheet" href="css/normalize.css" >
<link rel="stylesheet" href="css/CSS.css" >
<script src="#" charset="utf-8"></script>
	<title>StödShoppen</title>
</head>
<body>
<?php session_start();


if(isset($_SESSION["username"])){
	$message = "<p> Du är inloggad <strong>" . $_SESSION["username"] . "</strong>. </p>";

$loginUrl= "logout.php";
$loginName="LOGGA UT";
$memberUrl= "#";
$memberName="MIN SIDA";

}

else{
	$message="";
	$loginUrl="login.php";
	$loginName="LOGGA IN";
	$memberUrl="#";
	$memberName="SKAFFA INLOGGNING";

}

?>
<div class="wrapper">



<div class="topNav">
	<div class="navContent">
		<a href="index.php">						<button style="<?php if($currentPage=="index")echo "background-color: #b2cefb;"?>">			HEM										</button></a>
		<a href="#">								<button style="<?php if($currentPage=="#")echo "background-color: #b2cefb;"?>">				PRODUKT									</button></a>
		<a href="#">								<button style="<?php if($currentPage=="#")echo "background-color: #b2cefb;"?>">				OM FÖRETAGET							</button></a>
		<a href="<?php echo $memberUrl;?>">			<button style="<?php if($currentPage=="#")echo "background-color: #b2cefb;"?>">				<?php echo $memberName;?>				</button></a>
		<a href="<?php echo $loginUrl;?>">			<button style="<?php if($currentPage=="login")echo "background-color: #b2cefb;"?>">			<?php echo $loginName;?>				</button></a>
		<a href="#">								<button style="<?php if($currentPage=="#")echo "background-color: #b2cefb;"?>">				KUNDVAGN								</button></a>
	 </div>
</div>

<div class="messageContent">
	<?php echo $message;?>
</div>