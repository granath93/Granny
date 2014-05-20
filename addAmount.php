<!--
DENNA FIL UPPDATERAR OCH "LÄGGER TILL"/"TAR BORT" EN PRODUKT I KUNDVAGNEN NÄR 
ANVÄNDAREN TRYCKER PÅ "+" ELLER "-" KNAPPEN
-->

<?php
session_start();

if(isset($_GET['ArticleID']) && isset($_GET['action']) && isset($_GET['arrayID'])){

    //Om användaren trycker på "+"-knappen ökar det med 1 artikel
      if(($_GET['action']) == "add"){
		
		$i = ($_GET['arrayID']);
        $_SESSION['product'][$i]['amount'] +=   1; 
	}

    //Om användaren trycker på "-"-knappen ökar det med 1 artikel
      if(($_GET['action']) == "minus"){
      	$i = ($_GET['arrayID']);
         $_SESSION['product'][$i]['amount'] -=  1;
    }

  //När artikeln går till 0 i antal tas produkten bort i $_SESSION
    if($_SESSION['product'][$i]['amount'] == 0){
    	unset($_SESSION['product'][$i]);

    }
//Skickar tillbaka kunden till kundvagnen
 header("Location: shoppingcart.php");
}


?>