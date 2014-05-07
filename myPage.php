<?php

$currentPage="myPage";

include("database.php");
include("header.php"); ?>

<div class="content">

<p style="text-align:center"> <br><br><br> Här hittar du dina beställningar, dina uppgifter, och allt annat som rör ditt medlemskap! </br><p>

</br><p class="ChangeText"> Här kan du ändra dina uppgifter, om du exempelvis flyttat.</br> Bara fyll i de nya uppgifterna och klicka på klar!</p>
<br>
 <form action="myPage.php" method="post" id="changeID-form" style="margin-left:200px; margin-right:auto;">
 		<p><label for ="Fname">Förnamn:</label></p>
 			<input type="text" id="Fname" name="Fname" value="" /><br>
 			<p><label for ="Lname">Efternamn:</label></p>
 			<input id="Lname" name="Lname" value=""/><br>
  			<p><label for ="Address">Adress:</label></p>
 			<input type="text" id="Address" name="Address" value="" /><br>
  			<p><label for ="Zip">Postnummer:</label></p>
 			<input type="number" id="Zip" name="Zip" value="" /><br>
 			<p><label for ="Email">E-post:</label></p>
 			<input type="text" id="Email" name="Email" value="" /><br>
 			<button class="login" style="margin-left:200px; margin-right:auto;" id="login"><p>KLAR</p></button>
 		</form>
<?php
	if(isset($_POST['gem']))
{

$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Address = $_POST['Address'];
$Zip = $_POST['Zip'];
$Email = $_POST['Email'];

$query = <<<END
	
	UPDATE * 
	FROM {$table} 
	WHERE Email = '{$username}' AND Password = '{$password}'; 

END;

$retval = mysqli_query($con,$sql );
if(! $retval )
{
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";


}
?>
		
	<p class="PreviousOrder" style="float:right; margin-top:-300px"> Här kommer du se dina tidigare beställningar. </br> Just nu har du inga tidigare ordrar.</p>
		
</div>

<?php include("footer.php");?>