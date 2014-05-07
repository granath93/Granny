
<?php 
$currentPage="product";

include("database.php");
include("header.php");  ?>

<div class="content">

<h1>Produkt</h1>	
<p>Logga in för att börja handla.</p>
<h2>Produkter vi säljer</h2>
<h3>Beräknad leveranstid 3-4 arbetsdagar.<br>Klicka på produktens bild för större bild</h3>

<!-- <div style="width:100%">
<a href="index.php"><img src="img/banner2.jpg"></a>
</div> -->

<div class="product">  
<!-- Fjärrkontroll -->
	<header>  
		<hgroup>  
	<h2>Fjärrkontroll</h2>  
		</hgroup>  
	</header>   
<figure>  
<a href=images/fjärr.png><img src=images/fjärr.png width=140px height=300px alt=images/fjärr.png></a> 
<!-- <img src=images/fjärr.png> -->  
</figure>  
  
<section>   
      <ul>  
        <li>Artikelnummer</li>  
        <li>Färg</li>  
        <li>Storlek</li>  
        <li>Beskrivning</li>  
      </ul>  
	  <p>Pris:</p>
<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="5UVEVR3M8SC4C">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</section> 

<!-- Penna -->
<header>  
<hgroup>  
<h2>Penna</h2>  
</hgroup>  
</header>   
<figure>  
<a href=images/bigpen.png><img src=images/bigpen.png width=300px height=40px alt=images/bigpen.png></a> 
<!-- <img src=images/bigpen.png>   -->
</figure>  
  
<section>   
      <ul>  
        <li>Artikelnummer</li>  
        <li>Färg</li>  
        <li>Storlek</li>  
        <li>Beskrivning</li>  
      </ul>  
	  <p>Pris:</p>
<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="YW6R9H9TDMZLS">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


</section> 

<!-- Miniräknare -->
<header>  
<hgroup>  
<h2>Miniräknare</h2>  
</hgroup>  
</header>   
<a href=images/bigcalculcalator.png><img src=images/bigcalculator.png width=260px height=260px alt=images/bigcalculator.png></a> 
<!-- <img src=images/bigcalculator.png>  -->
  
<section>    
      <ul>  
        <li>Artikelnummer</li>  
        <li>Färg</li>  
        <li>Storlek</li>  
        <li>Beskrivning</li>  
      </ul>  
	  <p>Pris:</p>
<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="D5ZRMZH6KRJ3L">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</section> 

<!-- Suddigummi -->
<header>  
<hgroup>  
<h2>Suddigummi</h2>  
</hgroup>  
</header>   
<figure>  
<a href=images/bigeraser.png><img src=images/bigeraser.png width=200px height=100px alt=images/bigeraser.png></a> 
<!-- <img src=images/bigeraser.png>   -->
</figure>  
  
<section>    
      <ul>  
        <li>Artikelnummer</li>  
        <li>Färg</li>  
        <li>Storlek</li>  
        <li>Beskrivning</li>  
      </ul>
	  <p>Pris:</p>
<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="GDYBDAR4F8KMS">
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</form>

</section> 

</div>  
</div>


<?php include("footer.php"); ?>