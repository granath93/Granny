<?php
session_start();

if(isset($_GET['ArticleID']) && isset($_GET['action']) && isset($_GET['arrayID'])){



      if(($_GET['action']) == "add"){
		
		$i = ($_GET['arrayID']);
        $_SESSION['product'][$i]['amount'] +=   1; 
	}

      if(($_GET['action']) == "minus"){
      	$i = ($_GET['arrayID']);
         $_SESSION['product'][$i]['amount'] -=  1;
    }

    if($_SESSION['product'][$i]['amount'] == 0){
    	unset($_SESSION['product'][$i]);

    }

 header("Location: shoppingcart.php");
}


?>