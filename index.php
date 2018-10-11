<?
// "lisk pay 2 enter - key in reference" by korben3, released under the MIT license
include("config.php");

session_start();
$accessKey=$_SESSION["accessKey"];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><? echo $title; ?></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="pay2enter.js"></script> 
  <link href="pay2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="content">
	<div id="message" class="messageClass">Welcome to Hot Cars!</div>
	<div id="instructions" class="instructionsClass">To enter the website, send <div id="amount" class="amountClass"><? echo $costToEnter ?></div> (testnet) lisk with reference <div id="refKey" class="refKeyClass"><? if($accessKey){echo $accessKey;} ?></div> to <div id="address" class="addressClass"><? echo $mainLiskAddress; ?></div> and wait until your transaction is verified. Do <strong>not</strong> close this page.</div>
	<div id="hubLink" class="hubLinkClass"><a href="lisk://wallet?recipient=<? echo $mainLiskAddress; ?>&amount=<? echo $costToEnter; ?>&reference=<? if($accessKey){echo $accessKey;} ?>" id="hubLinkUrl">Click here to open lisk hub and send the transaction.</a></div>
	<div id="wait" class="waitClass"><img src="images/lisk-loading.gif" alt="lisk loading"></div>
	<div id="teaser" class="teaserClass">sneak preview - Want to see more hot cars? Pay 2 enter the website!<br/><img src="images/teaser.jpg"></div>
</div>
</body>
</html>