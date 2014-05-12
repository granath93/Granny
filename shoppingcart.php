<?php 
$currentPage="shoppingcart";
$articleId="";
$color="";
$price="";



include("database.php");
//include("addInCart.php");
include("addToOrderhistory.php"); 
include("header.php"); 


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


$_SESSION['name'] =$row->ArticleName ;
$_SESSION['amount'] = 1;
$_SESSION['price'] = $row->Price;
$_SESSION['color'] = $row->Color;
$_SESSION['image'] = $row->Image;





}}

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




	<table>
		<tr>
			<td>
				 <div class="article">

					<u> <p><?php echo  $_SESSION['name']?> </u></p><br>

					<img src="<?php echo	$_SESSION['image']?>"><br>

					 <p>Antal: <button> - </button><?php echo  $_SESSION['amount'] ?> <button> + </button> <br>

					 <?php echo	$_SESSION['price'] ?> kr<br>

					 <?php echo	$_SESSION['color'] ?></p><br>
					
				</div>
			</td>	
			<td>
				 <div class="article">

					<u> <p><?php echo  $_SESSION['name']?> </u></p><br>

					<img src="<?php echo	$_SESSION['image']?>"><br>

					<p>Antal: <button> - </button><?php echo  $_SESSION['amount'] ?> <button> + </button> <br>

					<?php echo	$_SESSION['price'] ?> kr<br>

					<?php echo	$_SESSION['color'] ?></p><br>
					

				</div>
			</td>
		</tr>
	<hr>
		<tr>
			<td>
				 <div class="article">

					<u> <p><?php echo  $_SESSION['name']?> </u></p><br>

					<img src="<?php echo	$_SESSION['image']?>"><br>

					<p>Antal: <button> - </button><?php echo  $_SESSION['amount'] ?> <button> + </button> <br>

					<?php echo	$_SESSION['price'] ?> kr<br>

					<?php echo	$_SESSION['color'] ?></p><br>
					

				</div>

			</td>
			<td>
				 <div class="article">

				<u> <p><?php echo  $_SESSION['name']?> </u></p><br>

					<img src="<?php echo	$_SESSION['image']?>"><br>

					<p>Antal: <button> - </button><?php echo  $_SESSION['amount'] ?> <button> + </button> <br>

					<?php echo	$_SESSION['price'] ?> kr<br>

					<?php echo	$_SESSION['color'] ?></p><br>

				</div>
			</td>
		</tr>
</table>
<hr>
		

		<p>Totalsumma:</p>	<button class="form"><p>BETALA PRODUKTERNA</p></button>
			
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="UAYFBBQLCVHYQ">

				<input type="hidden" name="item_name" value="<?php $row->ArticleName?>">
				<input type="hidden" name="color" value="<?php $row->Color?>">
				<input type="hidden" name="item_number" value="<?php $row->ArticleID?>">
				<input type="hidden" name="amount" value="1">
				

				<p><input type="submit"  name="submit" value="Betala produkterna"></p>
				
			</form>

<?php } ?>



	
	
	

</div>

<?php include("footer.php"); 
