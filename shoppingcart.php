<?php 
$currentPage="shoppingcart";
$articleId="";
$color="";
$price="";



include("database.php");
include("addInCart.php");
include("addToOrderhistory.php"); 
include("header.php"); 


/*

if(!isset($_SESSION['id'])){


$_SESSION['id'] ="" ;
$_SESSION['name'] ="" ;
$_SESSION['amount'] = "";
$_SESSION['price'] = "";
$_SESSION['color'] ="";
$_SESSION['image'] = "";
$_SESSION['totalPrice'] = $_SESSION['price'];


$content ="
	<hr>
	<p>Du har inte lagt något i kundvagenen än</p>

	<hr>";


}
*/

/*

if(isset($_GET['ArticleID'])){

	$articleId = isset($_GET['ArticleID']) ? $_GET['ArticleID'] : '';


	$query = <<<END
			SELECT * 
			FROM article
			WHERE ArticleID = $articleId;
END;



	$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
		" : " . $mysqli->error);
		while($row = $res->fetch_object()){

		$_SESSION['id'] =$row->ArticleID ;
		$_SESSION['name'] =$row->ArticleName ;
		$_SESSION['amount'] = 1;
		$_SESSION['price'] = $row->Price;
		$_SESSION['color'] = $row->Color;
		$_SESSION['image'] = $row->Image;
		$_SESSION['totalPrice'] = $_SESSION['price'];

		if(isset($_POST['minus'])){
			$_SESSION['amount']= $_SESSION['amount'] - 1;
		}

		if(isset($_POST['add'])){
			$_SESSION['amount'] = $_SESSION['amount'] + 1;
		}


		}
		}*/

		?>



		<div class="content">

		<?php if(!isset($_SESSION["username"])){ ?>
			
			<h1>Du är inte inloggad</h1>
			<p>Du är inte inloggad och kan då inte se dina produkter i kundvagnen. 
			<a href="login.php">Logga in</a> för att börja lägga produkter i kundvagenen. </p> 

		<?php } ?>


<?php if(isset($_SESSION["username"])){ ?>
	
		
			<h1>Kundvagn</h1>
						
  <p> Här ser du alla dina produkter som du lagt i kundvagnen </p>

<hr>
		        	<!-- <div class="article">

					<u> <p><strong><?php echo $_SESSION['name']?> </strong></u></p><br>

					<img src="<?php echo $_SESSION['image']?>"><br>

					 <p>Antal: <form action="" method="post"><button name="minus"> - </button><strong> <?php echo $_SESSION['amount'] ?></strong> <button name="add"> + </button></form> <br>

					  <p>Pris: <strong> <?php echo $_SESSION['price'] ?> kr</strong><br>

					 Färg: <strong> <?php echo $_SESSION['color'] ?> </strong></p><br>
					
				</div>
<hr>
	<p>Totalsumma: <strong> <?php echo $_SESSION['totalPrice'] ?></strong> kr<button class="form">BETALA PRODUKTERNA</p></button>
-->

		<?php foreach($_SESSION['product'] as $i => $cartItems){

$color = <<<END


<div class="article">
  <u> <p><strong>{$cartItems['name']} </strong></u></p><br>
  <p>Färg: <strong>  {$cartItems['color']} </strong></p><br>
  <img src="{$cartItems['image']}"><br>
   <p>Pris: <strong>{$cartItems['price']}kr</strong><br>
  ID: {$cartItems['productID']}<br>
  <p>Antal: <form action="" method="post"><button name="minus"> - </button><strong> {$cartItems['amount']}</strong> <button name="add"> + </button></form> <br>

  </div>

END;
} 

echo $color;?>

		<hr>
	<p>Totalsumma: <strong> <?php echo $_SESSION['totalPrice'] ?></strong> kr<button class="form">BETALA PRODUKTERNA</p></button>
			
	<!--		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="UAYFBBQLCVHYQ">

				<input type="hidden" name="item_name" value="<?php $row->ArticleName?>">
				<input type="hidden" name="color" value="<?php $row->Color?>">
				<input type="hidden" name="item_number" value="<?php $row->ArticleID?>">
				<input type="hidden" name="amount" value="1">
				

				<p><input type="submit"  name="submit" value="Betala produkterna"></p>
				
			</form>-->

<?php } ?>



	
	
	

</div>

<?php include("footer.php"); 
