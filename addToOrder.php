<?php


include("database.php");
include("header.php");


foreach($_SESSION['product'] as $i => $cartItems){

$totalPriceForOneArticle = $cartItems['price']*$cartItems['amount'];

$addToOrder =<<<END

INSERT INTO shipment (ArticleID, CustomerID, Amount, Price)
VALUES ({$cartItems['articleID']}, {$_SESSION['userId']}, {$cartItems['amount']}, {$totalPriceForOneArticle});

END;

$res = $mysqli->query($addToOrder) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);


}


foreach($_SESSION['product'] as $i => $cartItems){

unset($_SESSION['product'][$i]);

} ?>


<div class="content">
<h1>Tack för din beställning! </h1>

<p>Tack för att du handlar hos oss!<br>
Dina varor är nu betalda och kommer skickas hem till din angivna adress.
 </p>

<br><br><br><br>
<p><a href="product.php"><button class="form">HANDLA MER</p></button></a></p>

</div>
