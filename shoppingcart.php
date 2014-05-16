<?php 
$currentPage="shoppingcart";
$articleId="";
$cart="";
$totalPrice="";
$totalAmount="";


include("database.php");
include("header.php");
include("addInCart.php");
include ("process.php");
//include("addToOrder.php"); 
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

<?php 

if(!isset($_SESSION['product'])){
	echo $cart="Du har inte lagt något i kundvagnen ännu";

}

else{


		foreach($_SESSION['product'] as $i => $cartItems){


$cart .= <<<END


<div class="article">
	  <u> <p><strong>{$cartItems['name']} </strong></u></p><br>
	  <p>Färg: <strong>  {$cartItems['color']} </strong></p><br>
	  <img src="{$cartItems['image']}"><br>
	   <p>Pris: <strong>{$cartItems['price']}kr</strong><br>
	   <p>Antal: 

	   <a href="addAmount.php?ArticleID={$cartItems['articleID']}&action=minus&arrayID=$i"> <strong><button> - </button></a>
	  
	    {$cartItems['amount']}

	  <a href="addAmount.php?ArticleID={$cartItems['articleID']}&action=add&arrayID=$i"> <button> + </button></strong></a> <br>

  </div>

END;

/*
$cart .= <<<END
<form action="process.php" method="post">
<input type="hidden" name="item_name['{$i}']" value="{$cartItems['name']}">
<input type="hidden" name="item_id['{$i}']" value="{$cartItems['articleID']}">
<input type="hidden" name="item_desc['{$i}']" value="{$cartItems['color']}">
<input type="hidden" name="item_amount['{$i}']" value="{$cartItems['amount']}">
<input type="hidden" name="item_price['{$i}']" value="{$cartItems['price']}">
END;
*/

$totalPrice += $cartItems['price']*$cartItems['amount'];
$totalAmount += $cartItems['amount'];
} 

echo $cart;?>
	
	<div class="totalPrice">
		<hr>
	<p>Totalsumma: <strong> <?php echo $totalPrice ?></strong> kr
	<a href="product.php"><button class="shoppingButton">HANDLA MER</p></button></a>
	<button class="shoppingButton">BETALA PRODUKTERNA</p></button>
	<p>Antal artiklar: <strong> <?php echo $totalAmount ?></strong> st
	</div>		
	

<?php }

} ?>




	<!--		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="UAYFBBQLCVHYQ">

				<input type="hidden" name="item_name" value="<?php $row->ArticleName?>">
				<input type="hidden" name="color" value="<?php $row->Color?>">
				<input type="hidden" name="item_number" value="<?php $row->ArticleID?>">
				<input type="hidden" name="amount" value="1">
				

				<p><input type="submit"  name="submit" value="Betala produkterna"></p>
				
			</form>-->




	
	
	

</div>

<?php include("footer.php"); 
