<?
// "lisk pay 2 enter - key in reference" by korben3, released under the MIT license
include("config.php");

// only allow access when payment is received
session_start();
if($_SESSION['access']!=true){
	header("Location: /"); //access denied, returning to index
	die();
}

if($_GET['end']==true){
	session_unset();
    session_destroy(); 
	header("Location: /");  //end sesstion, returning to index
	die();
}

//Only for demonstration purpose, it's recommend to add additional security measures like hiding the direct image link.
$imageID=intval($_GET['id']);
if($imageID<1 | $imageID>3){
	$message="Click on one of the hot cars below.";
}else{
	$message="<a href=\"content.php\">Back to the gallery.</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><? echo $title; ?></title>
  <link href="pay2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="logout" class="logoutClass"><a href="content.php?end=1">logout</a></div>
<div class="content">
	<div id="message" class="messageClass"><?=$message; ?></div>
	<?	if($imageID<1 | $imageID>3){ ?>
	<div id="overview" class="overviewClass"><a href="content.php?id=1"><img src="images/car_1sl.jpg"></a> <a href="content.php?id=2"><img src="images/car_2sl.jpg"></a> <a href="content.php?id=3"><img src="images/car_3sl.jpg"></a></div>
	<?	}else{ echo "<div id=\"wait\" class=\"waitClass\"><img src=\"images/car_".$imageID.".jpg\"></div>"; } ?>
</div>
</body>
</html>