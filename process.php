<?php
include_once("paypal/config.php");
include_once("paypal/paypal.class.php");

$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';

if($_POST) //Post Data received from product list page.
{
	//Mainly we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
	
	//Please Note : People can manipulate hidden field amounts in form,
	//In practical world you must fetch actual price from database using item id. Eg: 
	//$ItemPrice = $mysqli->query("SELECT item_price FROM products WHERE id = Product_Number");

	$ItemName 		= $_POST["itemname"]; //Item Name
	$ItemPrice 		= "1"; //Item Price
	$ItemNumber 	= $_POST["itemnumber"]; //Item Number
	$ItemDesc 		= $_POST["itemdesc"]; //Item Number
	$ItemQty 		= "1"; // Item Quantity
	$ItemTotalPrice = ($ItemPrice*$ItemQty); //(Item Price x Quantity = Total) Get total amount of product; 
	
	//Other important variables like tax, shipping cost
	$TotalTaxAmount 	= 0.00;  //Sum of tax for all items in this order. 
	$HandalingCost 		= 0.00;  //Handling cost for this order.
	$InsuranceCost 		= 0.00;  //shipping insurance cost for this order.
	$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= 0.00; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	
	//Grand total including all tax, insurance, shipping cost and discount
	$GrandTotal = ($ItemTotalPrice);
	
	//Parameters for SetExpressCheckout, which will be sent to PayPal
	$padata = 	'&METHOD=SetExpressCheckout'.
				'&RETURNURL='.urlencode($PayPalReturnURL ).
				'&CANCELURL='.urlencode($PayPalCancelURL).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).
				
				/* 
				//Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
				'&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
				'&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
				'&L_PAYMENTREQUEST_0_DESC1='.urlencode($ItemDesc2).
				'&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
				'&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
				*/
				
				/* 
				//Override the buyer's shipping address stored on PayPal, The buyer cannot edit the overridden address.
				'&ADDROVERRIDE=1'.
				'&PAYMENTREQUEST_0_SHIPTONAME=J Smith'.
				'&PAYMENTREQUEST_0_SHIPTOSTREET=1 Main St'.
				'&PAYMENTREQUEST_0_SHIPTOCITY=San Jose'.
				'&PAYMENTREQUEST_0_SHIPTOSTATE=CA'.
				'&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=US'.
				'&PAYMENTREQUEST_0_SHIPTOZIP=95131'.
				'&PAYMENTREQUEST_0_SHIPTOPHONENUM=408-967-4444'.
				*/
				
				'&NOSHIPPING=1'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping
				
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
				'&LOCALECODE=US'. //PayPal pages to match the language on your website.
				'&LOGOIMG=http://sharingdreams.co/assets/img/logo_small.jpg'. //site logo
				'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
				'&ALLOWNOTE=1';
				
				############# set session variable we need later for "DoExpressCheckoutPayment" #######
				$_SESSION['ItemName'] 			=  $ItemName; //Item Name
				$_SESSION['ItemPrice'] 			=  $ItemPrice; //Item Price
				$_SESSION['ItemNumber'] 		=  $ItemNumber; //Item Number
				$_SESSION['ItemDesc'] 			=  $ItemDesc; //Item Number
				$_SESSION['ItemQty'] 			=  $ItemQty; // Item Quantity
				$_SESSION['ItemTotalPrice'] 	=  $ItemTotalPrice; //(Item Price x Quantity = Total) Get total amount of product; 
				$_SESSION['TotalTaxAmount'] 	=  $TotalTaxAmount;  //Sum of tax for all items in this order. 
				$_SESSION['HandalingCost'] 		=  $HandalingCost;  //Handling cost for this order.
				$_SESSION['InsuranceCost'] 		=  $InsuranceCost;  //shipping insurance cost for this order.
				$_SESSION['ShippinDiscount'] 	=  $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
				$_SESSION['ShippinCost'] 		=   $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
				$_SESSION['GrandTotal'] 		=  $GrandTotal;


		//We need to execute the "SetExpressCheckOut" method to obtain paypal token
		$paypal= new MyPayPal();
		$httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
		
		//Respond according to message we receive from Paypal
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{

				//Redirect user to PayPal store with Token received.
			 	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
				header('Location: '.$paypalurl);
			 
		}else{
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
	$ItemName 			= $_SESSION['ItemName']; //Item Name
	$ItemPrice 			= $_SESSION['ItemPrice'] ; //Item Price
	$ItemNumber 		= $_SESSION['ItemNumber']; //Item Number
	$ItemDesc 			= $_SESSION['ItemDesc']; //Item Number
	$ItemQty 			= $_SESSION['ItemQty']; // Item Quantity
	$ItemTotalPrice 	= $_SESSION['ItemTotalPrice']; //(Item Price x Quantity = Total) Get total amount of product; 
	$TotalTaxAmount 	= $_SESSION['TotalTaxAmount'] ;  //Sum of tax for all items in this order. 
	$HandalingCost 		= $_SESSION['HandalingCost'];  //Handling cost for this order.
	$InsuranceCost 		= $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
	$ShippinDiscount 	= $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	$GrandTotal 		= $_SESSION['GrandTotal'];

	$padata = 	'&TOKEN='.urlencode($token).
				'&PAYERID='.urlencode($payer_id).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				//set item info here, otherwise we won't see product details later	
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).

				/* 
				//Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
				'&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
				'&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
				'&L_PAYMENTREQUEST_0_DESC1=Description text'.
				'&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
				'&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
				*/

				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);
	
	//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
	$paypal= new MyPayPal();
	$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
	
	//Check if everything went ok..
	if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
	{
				// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
				// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
				$padata = 	'&TOKEN='.urlencode($token);
				$paypal= new MyPayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{
					$conn = new mysqli("SERVERBD", "USERDB", "PASSWORDDB", "DB");

					$erro = "";

		            $art_id = $httpParsedResponseAr["L_PAYMENTREQUEST_0_NUMBER0"];
		           	//print_r($httpParsedResponseAr);
		            $sid = $httpParsedResponseAr["PAYMENTREQUEST_0_TRANSACTIONID"];
		            if(empty($sid)){
		            	$sid = "0";
		            }

		            $query = "SELECT * FROM donate WHERE sid = '$sid'";
		            $run = $conn->query($query);
		            $n = $run->num_rows;

		            if($n == 0){
		            	$query2 = "INSERT INTO `donate`(`sid`, `arte_id`) VALUES ('$sid', '$art_id')";
		            	$run2 = $conn->query($query2);
		            }
		            else{
		            	$erro = "<center><h3><font color='red'>Please, don't refresh this page.</font></h3></center>";
		            }

		            include("success.php");

				} else  {

				}
	
	}else{
	}
}
?>
