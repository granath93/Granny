<!--
DENNA FIL LÄGGER TILL PRODUKTER I KUNDVAGNEN
-->

<?php
session_start();
include("database.php");

if(isset($_GET['ArticleID'])){

  //sparar produktens artikelid
	$articleId = isset($_GET['ArticleID']) ? $_GET['ArticleID'] : ''; 

//Hämtar allt från tabellen "article"
$query = <<<END
		SELECT * 
		FROM article
		WHERE ArticleID = '$articleId';
END;


//exekverar, verkställer SELECT-satsen 
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error);

$row = $res->fetch_object();

//Om $_SESSION har något i sig görs detta
if(isset($_SESSION['product'])){
    
        if($articleId == ""){
        
        echo "nothing set";
        
        //Finns det redan en produkt som användaren har lagt till i kundvagnen, 
        //om det redan finns ett artikelID räknas artikeln upp med 1 i antal i kundvagnen
        } else {
            $idx = -1;
            foreach($_SESSION['product'] as $i => $cartItems)
            {
              if($cartItems['articleID'] == $articleId)
              {
             $idx = $i;
             break;
              }
            }
            
            if ($idx == -1)
            {
              // Finns det ingen produkt med samma artikelID sedan innan skapas en ny $_SESSION
              $_SESSION['product'][] = array(
                             "name" => $row->ArticleName,
                            "amount" => 1,
                            "price" => $row->Price,
                            "articleID" => $row->ArticleID,
                            "image" => $row->Image,
                            "color" => $row->Color
                                      ); echo "new item <br />";
            }
            else
            {
              // Finns det redan en produkt med samma artikelID räknas $_SESSION['amount'] upp vid detta artikelID
              echo $_SESSION['product'][$idx]['amount'] . "<br>";
              $_SESSION['product'][$idx]['amount']++;
               echo  "nummer" .  $idx . "<br />";
              echo "adding to the amount" .  "<br />";
              echo $_SESSION['product'][$idx]['amount'] . "<br>";
            }
            
        }

    } else {
        //Har inget lagts in i $_SESSION tidigare så skapas en $_SESSION
        $_SESSION['product'][] = array(
                             "name" => $row->ArticleName,
                            "amount" => 1,
                            "price" => $row->Price,
                            "articleID" => $row->ArticleID,
                            "image" => $row->Image,
                            "color" => $row->Color
                                      ); echo "new item <br />";
    }
  }

//Skickar tillbaka användaren/kunden till kundvagnen
header("location:shoppingcart.php");


?>