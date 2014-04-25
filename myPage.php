<?php

$currentPage="myPage";

include("database.php");
include("header.php"); ?>

<div class="content">

<h1>Välkommen!</h1>	

<p style="text-align:center"> Detta är din egen sida. </br> Här hittar du dina beställningar, dina uppgifter, och allt annat som rör ditt medlemskap! </br><p>

</br><p class="ChangeText"> Här kan du ändra dina uppgifter, om du exempelvis flyttat.</br> Bara fyll i de nya uppgifterna och klicka på Submit!</p>

 <form action="myPage.php" method="post" id="changeID-form">
 		<label for ="Fname">Förnamn:</label>
 			<input type="text" id="Fname" name="Fname" value="" /><br>
 			<label for ="Lname">Efternamn:</label>
 			<input id="Lname" name="Lname" value=""/><br>
  			<label for ="Address">Adress:</label>
 			<input type="text" id="Address" name="Address" value="" /><br>
  			<label for ="Zip">Postnummer:</label>
 			<input type="number" id="Zip" name="Zip" value="" /><br>
 			<label for ="Email">E-post:</label>
 			<input type="text" id="Email" name="Email" value="" /><br>
 			<input type="submit" id="changeID-form" value="AddNewMember" />
 		</form>
		
	<p class="PreviousOrder"> Här kommer du se dina tidigare beställningar. </br> Just nu har du inga tidigare ordrar.</p>
		
</div>
