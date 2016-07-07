<?php

function isDomainAvailible($domain)
{
	//check, if a valid url is provided
	if(!filter_var($domain, FILTER_VALIDATE_URL))
	{
		return false;
	}
	//initialize curl
	$curlInit = curl_init($domain);
	curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
	curl_setopt($curlInit,CURLOPT_HEADER,true);
	curl_setopt($curlInit,CURLOPT_NOBODY,true);
	curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
	//get answer
	$response = curl_exec($curlInit);
	curl_close($curlInit);
	if ($response) return true;
		return false;
}

function maintainAvailable($Cid, $isAvailable){
	
	$json = json_decode(file_get_contents('status.json'), true);
	$keyCid=strval($Cid);
	if(!isset($json[$keyCid])){
		$json[$keyCid]=0;
	}
	if($isAvailable){
		$json[$keyCid]=0;
	}
	else{
		$json[$keyCid]++;
	}
	if($json[$keyCid]>=3){
		changeStatus($Cid, 4);
	}
	else{
		changeStatus($Cid,1);
	}
	file_put_contents('status.json', json_encode($json));

}

function changeStatus($Cid, $status){
	
	$headers = array();
	$headers[] = 'X-Cachet-Token: '. $_SESSION['settings']['token'];
	$link = $_SESSION['settings']['statusboardlink'] . 'components/' . $Cid;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, $link);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
	$currentstatus = json_decode(curl_exec($ch), true);
	curl_close($ch);
	
	if($currentstatus['data']['status'] != $status){
		$headers = array();
		$headers[] = 'X-Cachet-Token: '. $_SESSION['settings']['token'];
		$link = $_SESSION['settings']['statusboardlink'] . 'components/' . $Cid;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $link);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
		curl_setopt($ch,CURLOPT_POSTFIELDS, "status=" . $status);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_exec($ch);
		curl_close($ch);
	}

}

function postMetricPoint($link, $token, $value){
	$headers = array();
	$headers[] = 'X-Cachet-Token: '. $token;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, $link);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_POST, true);
	curl_setopt($ch,CURLOPT_POSTFIELDS, "value=" . $value);
	curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
	curl_exec($ch);
	curl_close($ch);
}


?>