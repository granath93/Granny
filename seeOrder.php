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
$currentPage="shoppingcart";
$articleId="";
$cart="";
$totalPrice="";
$totalAmount="";


include("database.php");
include ("process.php");

?>
		

		<div class="content">

	

<?php if(isset($_SESSION["username"])){ ?>
	
		
			<h1>Detta ska du beställa</h1>
						

<hr>

<?php 




		foreach($_SESSION['product'] as $i => $cartItems){


$cart .= <<<END


<div class="article">
	  <u> <p><strong>{$cartItems['name']} </strong></u></p><br>
	  <p>Färg: <strong>  {$cartItems['color']} </strong></p><br>
	  <img src="{$cartItems['image']}"><br>
	   <p>Pris: <strong>{$cartItems['price']}kr</strong><br>
	   <p>Antal: <strong>{$cartItems['amount']}</strong>

	  <br>

  </div>

END;



$cart .= <<<END
<form action="process.php" method="post">
<input type="hidden" name="item_name['{$i}']" value="{$cartItems['name']}">
<input type="hidden" name="item_id['{$i}']" value="{$cartItems['articleID']}">
<input type="hidden" name="item_desc['{$i}']" value="{$cartItems['color']}">
<input type="hidden" name="item_amount['{$i}']" value="{$cartItems['amount']}">
<input type="hidden" name="item_price['{$i}']" value="{$cartItems['price']}">
END;


$totalPrice += $cartItems['price']*$cartItems['amount'];
$totalAmount += $cartItems['amount'];
}

echo $cart;?>
	
	<div class="totalPrice">
		<hr>
	<p>Totalsumma: <strong> <?php echo $totalPrice ?></strong> kr
	<a href="process.php"><button class="shoppingButton">BETALA PRODUKTERNA</p></button></a>
	<p>Antal artiklar: <strong> <?php echo $totalAmount ?></strong> st
	</div>		
	

<?php 

} ?>

	

</div>


</body>
</html>