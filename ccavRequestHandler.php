<?php
session_start();
?>
<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<?php

$_SESSION['oId'] = $_POST['order_id'];
$_SESSION['amnt'] = $_POST['amount'];
$_SESSION['crncy'] = $_POST['currency'];
$_SESSION['name'] = $_POST['billing_name']
?>

<?php include('Crypto.php')?>
<?php
	error_reporting(0);

	$merchant_data='2';
	$working_key='A1CA24D953911417B218CCC9F7E902D2';//Shared by CCAVENUES
	$access_code='AVJF19KB19AU19FJUA';//Shared by CCAVENUES

	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>

<script language='javascript'>document.redirect.submit();</script>
</body>
</html>
