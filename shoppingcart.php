<!-- 
DENNA FIL VISAR KUNDVAGNEN FÖR ANVÄNDAREN
-->

<?php 
$currentPage="shoppingcart"; //Sparar sidans namn i en variabel som sedan används i menyn i "header.php"

//SKapar tomma variabler för att senare lägga in värden i dessa
$articleId="";
$cart="";
$totalPrice="";
$totalAmount="";


include("database.php");
include("header.php"); ?>

	<div class="content">

	<?php 

			//Om användaren inte är inloggad visas detta i kundvagnen
			if(!isset($_SESSION["username"])){ ?>
			
				<h1>Du är inte inloggad</h1>
					<p>Du är inte inloggad och kan då inte se dina produkter i kundvagnen. 
					<a href="login.php">Logga in</a> för att börja lägga produkter i kundvagenen. </p> 

		<?php } ?>


	<?php 

			//Är användaren inloggad visas detta i kundvagnen
			if(isset($_SESSION["username"])){ ?>
	
		
				<h1>Kundvagn</h1>
						
  					<p> Här ser du alla dina produkter som du lagt i kundvagnen </p>
					<hr>

	<?php 
				//Om användaren inte har lagt något i kundvagnen än visas detta meddelande samt knapp
				if(!isset($_SESSION['product'])){
				
					echo $cart="<p>Du har inte lagt något i kundvagnen ännu <a href='product.php'><button class='shoppingButton'>GÅ OCH HANDLA</p></button></a></p>";

				}

				//Om anv'ndaren har lagt in något i kundvagnen
				else{

					//Om användaren en gång lade en produkt i kundvagnen men ångrade sig (tog bort produkterna)
					//ELLER om användaren har betalat för produkterna är kundvagnen tom igen
					if(empty($_SESSION['product'])){
						echo $cart ="<p>Finns inget i kundvagnen <a href='product.php'><button class='shoppingButton'>GÅ OCH HANDLA</p></button></a>";
					}

					//Om användaren har lagt minst en produkt i kundvagnen visas produkten med dess 
					//detaljer och öka/minska antalet av produkter
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

							$totalPrice += $cartItems['price']*$cartItems['amount'];
							$totalAmount += $cartItems['amount'];
						} 

					//Skriver ut allt på sidan så som brödtext och information om produkterna
					echo $cart;?>
		
				<div class="totalPrice">
					<hr>
					<p>Totalsumma: <strong> <?php echo $totalPrice ?></strong> kr
					<a href="product.php"><button class="shoppingButton">HANDLA MER</p></button></a>
					<a href="seeOrder.php"><button class="shoppingButton">BETALA PRODUKTERNA</p></button></a>
					<p>Antal artiklar: <strong> <?php echo $totalAmount ?></strong> st
				</div>		
		

		<?php 		}

				}

			} ?>


	</div>

<?php include("footer.php"); 
