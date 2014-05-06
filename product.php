
<?php 
$currentPage="product";

include("database.php");
include("header.php");  ?>

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
  <button>LÄGG I KUNDVAGN</button>  
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
  <button>LÄGG I KUNDVAGN</button>  
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
  <button>LÄGG I KUNDVAGN</button>  
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
  <button>LÄGG I KUNDVAGN</button>  
</section> 

</div>  



<?php include("footer.php"); ?>