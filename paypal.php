<!--
DENNA FIL KOPPLAR SAMMAN WEBBSIDAN MED PAYPAL SÅ ATT BETALNINGAR ÖVER PAYPAL KAN SKE
-->

<?php

$PayPalMode         = 'sandbox'; // sandbox or live
$PayPalApiUsername  = 'rysaren-facilitator_api1.hotmail.com'; //PayPal API Username
$PayPalApiPassword  = '1400233996'; //Paypal API password
$PayPalApiSignature     = 'AxSZi5GjP7w6XIcrcoSy1390jOLgA2eGcoPPJWYTPB1RTiW7yN94My84'; //Paypal API Signature
$PayPalCurrencyCode     = 'SEK'; //Paypal Currency Code
$PayPalReturnURL    = 'http://localhost/granny/process.php'; //Point to process.php page
$PayPalCancelURL    = 'http://localhost/granny/cancel_url.php'; //Cancel URL if user clicks cancel

?>