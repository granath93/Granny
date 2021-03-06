<!--
DENNA FIL GÖR ATT MAN KAN HANDLA ÖVER PAYPAL. SKICKAR VIDARE ALLA PRODUKTER SOM FINNS I KUNDVAGNEN
IN TILL PAYPAL.

ÄR HÄMTAD PÅ INTERNET OCH MODIFIERAD EFTER VÅRA EGNA VARIABLER OCH DATABAS
-->

<?php

include_once("database.php");
include_once("paypal.php");
include_once("paypal.class.php");

include("header.php");
$userid = $_SESSION['userId'];


$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';

if($_POST) //Post Data received from product list page.
{
	//Other important variables like tax, shipping cost
	$TotalTaxAmount 	= 2.58;  //Sum of tax for all items in this order. 
	$HandalingCost 		= 2.00;  //Handling cost for this order.
	$InsuranceCost 		= 1.00;  //shipping insurance cost for this order.
	$ShippinDiscount 	= -3.00; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= 3.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.

	//we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
	//Please Note : People can manipulate hidden field amounts in form,
	//In practical world you must fetch actual price from database using item id. 
	//eg : $ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");
	$paypal_data ='';
	$ItemTotalPrice = 0;
	
    foreach($_POST['item_name'] as $key=>$itmname)
    {
        $product_code 	= filter_var($_POST['item_id'][$key], FILTER_SANITIZE_STRING); 
		
		$res = $mysqli->query("SELECT ArticleName, Description, Price FROM article WHERE ArticleID ='$product_code' LIMIT 1");
		$row = $res->fetch_object();
		
        $paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($row->ArticleName);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($_POST['item_id'][$key]);
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($row->Price);		
		$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($_POST['item_amount'][$key]);
        
		// item price X quantity
        $subtotal = ($row->Price*$_POST['item_amount'][$key]);
		
        //total price
        $ItemTotalPrice = $ItemTotalPrice + $subtotal;
		
		//create items for session
		$paypal_product['items'][] = array('itm_name'=>$row->ArticleName,
											'itm_price'=>$row->Price,
											'itm_code'=>$_POST['item_id'][$key], 
											'itm_qty'=>$_POST['item_amount'][$key]
											);
    }
				
	//Grand total including all tax, insurance, shipping cost and discount
	$GrandTotal = ($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);
	
								
	$paypal_product['assets'] = array('tax_total'=>$TotalTaxAmount, 
								'handaling_cost'=>$HandalingCost, 
								'insurance_cost'=>$InsuranceCost,
								'shippin_discount'=>$ShippinDiscount,
								'shippin_cost'=>$ShippinCost,
								'grand_total'=>$GrandTotal);
	
	//create session array for later use
	$_SESSION["paypal_products"] = $paypal_product;
	
	//Parameters for SetExpressCheckout, which will be sent to PayPal
	$padata = 	'&METHOD=SetExpressCheckout'.
				'&RETURNURL='.urlencode($PayPalReturnURL ).
				'&CANCELURL='.urlencode($PayPalCancelURL).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				$paypal_data.				
				'&NOSHIPPING=0'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping
				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
				'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
				'&LOGOIMG=http://www.sanwebe.com/wp-content/themes/sanwebe/img/logo.png'. //site logo
				'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
				'&ALLOWNOTE=1';
		
		//We need to execute the "SetExpressCheckOut" method to obtain paypal token
		$paypal= new MyPayPal();
		$httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
		
		//Respond according to message we receive from Paypal
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{
				//Redirect user to PayPal store with Token received.
			 	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
				header('Location: '.$paypalurl);
		}
		else
		{
			//Show error message
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
		}

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if(isset($_GET["token"]) && isset($_GET["PayerID"]))
{
	//we will be using these two variables to execute the "DoExpressCheckoutPayment"
	//Note: we haven't received any payment yet.
	
	$token = $_GET["token"];
	$payer_id = $_GET["PayerID"];
	
	//get session variables
	$paypal_product = $_SESSION["paypal_products"];
	$paypal_data = '';
	$ItemTotalPrice = 0;

    foreach($paypal_product['items'] as $key=>$p_item)
    {		
		$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($p_item['itm_qty']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($p_item['itm_price']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($p_item['itm_name']);
        $paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($p_item['itm_code']);
        
		// item price X quantity
        $subtotal = ($p_item['itm_price']*$p_item['itm_qty']);
		
        //total price
        $ItemTotalPrice = ($ItemTotalPrice + $subtotal);
    }

	$padata = 	'&TOKEN='.urlencode($token).
				'&PAYERID='.urlencode($payer_id).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				$paypal_data.
				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($paypal_product['assets']['tax_total']).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($paypal_product['assets']['shippin_cost']).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($paypal_product['assets']['handaling_cost']).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($paypal_product['assets']['shippin_discount']).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($paypal_product['assets']['insurance_cost']).
				'&PAYMENTREQUEST_0_AMT='.urlencode($paypal_product['assets']['grand_total']).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);

	//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
	$paypal= new MyPayPal();
	$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
	
	//Check if everything went ok..
	if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
	{

			//echo '<h2>Success</h2>';
			//echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
			
				/*
				//Sometimes Payment are kept pending even when transaction is complete. 
				//hence we need to notify user about it and ask him manually approve the transiction
				*/
				
				if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
				}
				elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					/*echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
					'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';*/
				}

				// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
				// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
				$padata = 	'&TOKEN='.urlencode($token);
				$paypal= new MyPayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{
					
					//echo '<br /><b>Stuff to store in database :</b><br />';

					$res = $mysqli->query("SELECT * FROM customer WHERE CustomerID ='$userid' LIMIT 1");
					while($row = $res->fetch_object()) { 
					$fname = utf8_decode($row->Fname);
					$ename = utf8_decode($row->Lname);
					$address = utf8_decode($row->Address);
					$zip = utf8_decode($row->Zip);
					$email = utf8_decode($row->Email);
	
//----------------HÄR BÖRJAR MIN INSERT-SATS MED ATT VISA ATT VARA ÄR BETALD OCH TÖMMA SESSION---------------------------------------
					//Detta är det användaren får se i sitt fönster när betalningen är klar
					echo "<div class='content'>
							<h1>Tack för din beställning! </h1>

							<p>Tack för att du handlar hos oss!<br>
							Dina varor är nu betalda och kommer skickas hem till dina angivna personuppgifter och adress.<br><br>";

							echo "Namn: <strong>" . $fname . " ". $ename . "</strong> <br>" ."Adress: <strong>" . $address ."</strong><br>" . "Postnummer: <strong>" . $zip ."</strong><br><br>";


						echo "Du ser dina tidigare beställningar på <a href='myPage.php'>MIN SIDA</a>.</p>
						

						<br><br><br><br>
							<p><a href='product.php'><button class='form'>HANDLA MER</p></button></a></p>

					</div>";
}
					echo '<pre>';
					
				
					//Output any connection error
					if ($mysqli->connect_error) {
						die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
					}		

					foreach($_SESSION['product'] as $i => $cartItems){

					$totalPriceForOneArticle = $cartItems['price']*$cartItems['amount'];
					$insert_row = $mysqli->query("INSERT INTO shipment (ArticleID, CustomerID, Amount, Price)
							VALUES ({$cartItems['articleID']}, {$_SESSION['userId']}, {$cartItems['amount']}, {$totalPriceForOneArticle})");
					
					if($insert_row){
						//print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
					}else{
						die('Error : ('. $mysqli->errno .') '. $mysqli->error);
					}
					
		}		
					

					//Efter att produkterna har lagts in i tabellen tömms $_SESSION
					foreach($_SESSION['product'] as $i => $cartItems){

						unset($_SESSION['product'][$i]);

					} 


//---------------HÄR SLUTAR MIN INSERT-SATS MED ATT VISA ATT VARA ÄR BETALD OCH TÖMMA SESSION---------------------------------------




		echo '<pre>';
					//print_r($httpParsedResponseAr);
					echo '</pre>';
				} else  {
					echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
					echo '<pre>';
					print_r($httpParsedResponseAr);
					echo '</pre>';

				}
	
	}else{
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
	}
}
?>
