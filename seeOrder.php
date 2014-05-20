<!--
DENNA FIL VISA ANVÄNDAREN EN DETALJERAD LISTA AV DE PRODUKTER ANVÄNDAREN SKALL KÖPA PRECIS INNAN
DENNE TRYCKER PÅ "BETALA PRODUKTERNA" OCH VERKSTÄLLER KÖPET
-->

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width" charset="utf-8">
		<link rel="stylesheet" href="css/normalize.css" >
		<link rel="stylesheet" href="css/CSS.css" >
		<link rel="stylesheet" href="css/cssshopingcart.css" >
		<script src="#" charset="utf-8"></script>
			<title>StödShoppen</title>
	</head>
<body>


<?php 
session_start();
$articleId="";
$cart="";
$totalPrice="";
$totalAmount="";


include("database.php");
include ("paypal/process.php"); ?>


		<div class="content">
	

		<?php if(isset($_SESSION["username"])){ ?>
	
			<h1>Detta ska du beställa</h1>
			<hr>

			<!--Loopar igenom alla produkter som är sparade i $_SESSION-->
<?php 		foreach($_SESSION['product'] as $i => $cartItems){

			// Sparar all information om produkterna in i en variabel som senare skrivs ut
			$cart .= <<<END

			<div class="article">
				  <u> <p><strong>{$cartItems['name']} </strong></u><br>
				  Färg: <strong>  {$cartItems['color']} </strong><br>
				    Pris: <strong>{$cartItems['price']}kr</strong><br>
				   Antal: <strong>{$cartItems['amount']}</strong></p>

				  <br>

			  </div>
END;

/*
//Skriver in all information om produkterna in i ett osynligt formulär för att kunna skicka hela
//beställningen till paypal
$cart .= <<<END
<form action="paypal/process.php" method="post">
<input type="hidden" name="item_name['{$i}']" value="{$cartItems['name']}">
<input type="hidden" name="item_id['{$i}']" value="{$cartItems['articleID']}">
<input type="hidden" name="item_desc['{$i}']" value="{$cartItems['color']}">
<input type="hidden" name="item_amount['{$i}']" value="{$cartItems['amount']}">
<input type="hidden" name="item_price['{$i}']" value="{$cartItems['price']}">
END;
*/
			//Adderar alla produkter för att få en total av hur många produkter som skall köpas.
			//Lägger även in alla priser på produkterna samt multiplicerar priserna med antal 
			//produkter som användaren valt för att få en totalsumma för hela beställningen
			$totalPrice += $cartItems['price']*$cartItems['amount'];
			$totalAmount += $cartItems['amount'];
		}

		//Skriver ut detaljerna om produkterna, totalkostnaden samt totalen av antal produkter 
		echo $cart;?>
	
		<div class="totalPrice">
		<hr>
			<p>Totalsumma: <strong> <?php echo $totalPrice ?></strong> kr
			<a href="addToOrder.php"><button class="shoppingButton">BETALA PRODUKTERNA</p></button></a>
			<p>Antal artiklar: <strong> <?php echo $totalAmount ?></strong> st
		</div>		
	

<?php } ?>
	
		</div>
	</body>
</html>