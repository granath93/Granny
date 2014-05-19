<?php

session_start();
include("database.php");


foreach($_SESSION['product'] as $i => $cartItems){

$totalPriceForOneArticle = $cartItems['price']*$cartItems['amount'];

$addToOrder =<<<END

INSERT INTO order2 (ArticleID, CustomerID, amount, price)
VALUES ({$cartItems['articleID']}, {$_SESSION['userId']}, {$cartItems['amount']}, {$totalPriceForOneArticle});

END;

$res = $mysqli->query($addToOrder) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error);


}

header("location:shoppingcart.php");



?>



