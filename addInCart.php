<?php
//session_start();


if(isset($_GET['ArticleID'])){



	$articleId = isset($_GET['ArticleID']) ? $_GET['ArticleID'] : '';


$query = <<<END
		SELECT * 
		FROM article
		WHERE ArticleID = '$articleId';
END;



$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error);
/*while($row = $res->fetch_object()){

$article=$row->ArticleName;


$_SESSION['name'] =$article ;
$_SESSION['amount'] = 1;
$_SESSION['price'] = $row->Price;
$_SESSION['color'] = $row->Color;
$_SESSION['image'] = $row->Image;
$_SESSION['totalPrice'] = $_SESSION['price'];
}

*/
$row = $res->fetch_object();


 $_SESSION['product'][] = array(
        					"name" => $row->ArticleName,
                            "amount" => 1,
                            "price" => $row->Price,
                            "productID" => $row->ArticleID,
                            "image" => $row->Image,
                            "color" => $row->Color
                            ); echo "new session";


/*
foreach($_SESSION['product'] as $i => $cartItems){

$color = <<<END
<p>
  Produkt: {$cartItems['name']}<br>
  Färg: {$cartItems['color']}<br>
  <img src="{$cartItems['image']}"><br>
  Pris: {$cartItems['price']}<br>
  ID: {$cartItems['productID']}<br>
  Antal: {$cartItems['amount']}<br>
</p>
END;
}
*/



}


?>