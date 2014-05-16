<?php


if(isset($_GET['ArticleID'])){


	$articleId = isset($_GET['ArticleID']) ? $_GET['ArticleID'] : '';


$query = <<<END
		SELECT * 
		FROM article
		WHERE ArticleID = '$articleId';
END;



$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
	" : " . $mysqli->error);

$row = $res->fetch_object();

if(isset($_SESSION['product'])){
    
        if($articleId == ""){
        
        echo "nothing set";
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
              // not found
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
              // found product at $_SESSION[$idx]
              echo $_SESSION['product'][$idx]['amount'] . "<br>";
              $_SESSION['product'][$idx]['amount']++;
               echo  "nummer" .  $idx . "<br />";
              echo "adding to the amount" .  "<br />";
              echo $_SESSION['product'][$idx]['amount'] . "<br>";
            }
            
        }

    } else {
        //create new session
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



//check the cart content.
//var_dump($_SESSION['product']);


?>