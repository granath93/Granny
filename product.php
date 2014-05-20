
<?php 
$currentPage="product";

include("database.php");
include("header.php");  

$res = $mysqli->query('SELECT * FROM article ') or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error);?>
	
		<div class="content">
		
<h1>Produkt</h1>	
<p>Logga in för att börja handla.</p>
<h2>Produkter vi säljer</h2>
<h3>Beräknad leveranstid 3-4 arbetsdagar.<br>Klicka på produktens bild för större bild</h3>
		
	
<?php
	while($row = $res->fetch_object()) { 
	$ArticleID = ($row->ArticleID);
	$ArticleName = ($row->ArticleName);
	$Color = ($row->Color);
	$CategoryID = ($row->CategoryID);
	$Price = ($row->Price);
	$Description = ($row->Description);
	$Image = ($row->Image);
	
	
	
	//echo $ArticleID . "<br> Namn: " . $ArticleName . "<br>" . $CategoryID . "<br>" . 
		//	$Color . "<br> Beskrivnin: " . $Description . "<br>" . $Image . "<br>"; 
		?>
	
	<div class="produktplacering">
		<p>
			Namn: <?php echo $ArticleName; ?><br>
			Färg: <?php echo $Color; ?><br>
			Beskrivning: <?php echo $Description; ?><br>
			Pris: <?php echo $Price; ?>kr<br><br>
			
			<img src="<?php echo $Image; ?>"><br><br>
			
			<a href="shoppingcart.php?ArticleID=<?php echo $ArticleID; ?>"><button>LÄGG I KUNDVAGN</button></a>
		</p>
	</div>
			
	<?php } ?>

<br>

</div>

<?php include("footer.php"); ?>