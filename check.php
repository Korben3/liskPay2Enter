<? 
// "lisk pay 2 enter - key in reference" by korben3, released under the MIT license
include("config.php");

session_start();

if(empty($_SESSION["accessKey"]))
	{
		$accessKey=bin2hex(random_bytes($keyStrenght)); // generate unique key from 256^$keyStrenght
		$_SESSION["accessKey"]=$accessKey; echo $accessKey;
	}else{
		//retrieve a list of the latest transactions and check for the accessKey
		$fullApiUrl=$nodeUrl.":".$nodePort."/api/transactions?recipientId=".$mainLiskAddress."&limit=".$totalTX."&offset=0&sort=timestamp%3Adesc";

		$cSession = curl_init(); 
			curl_setopt($cSession,CURLOPT_URL,$fullApiUrl);
			curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($cSession,CURLOPT_HEADER, false); 
			$result=curl_exec($cSession);
		curl_close($cSession);

		$resultArray=json_decode($result,true); // decode the JSON data

		$accessKey=$_SESSION["accessKey"];
		
		foreach($resultArray["data"] as $resultArray2)
		{
			if(($resultArray2["asset"]["data"])===$accessKey)
			{
				$_SESSION['access'] = true;	//found users unique access key, user may enter the site for the duration of the session
				echo "access granted";
			}
		}
	}
?>