<?php
include("database.php");

$query = <<<END
SELECT *
FROM article;
END;

//Exekutiverar "verkställer" SELECT-satsen
$res = $mysqli->query($query) or die("Could not query database" . $mysqli->errno . 
" : " . $mysqli->error); //Performs query

while($row = $res->fetch_object()) { 
$ett = ($row->ArticleId); 
$tva = ($row->ArtName); 
$tre = ($row->Price);

echo $ett . $tva . $tre;

}
?>

hej

