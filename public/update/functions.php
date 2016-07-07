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

function maintainAvailable($Cid, $isAvailable, $Cnaam, $responsetime){
	
	$json = json_decode(file_get_contents('status.json'), true);
	$keyCid=strval($Cid);
	if(!isset($json[$keyCid])){
		$json[$keyCid]=0;
	}
	if($isAvailable && $responsetime<=800){
		$json[$keyCid]=0;
	}
	else{
		$json[$keyCid]++;
	}
	if($json[$keyCid]>=3){
		if($responsetime>=800){
			changeStatus($Cid,2,$Cnaam);
		}
		else{
			changeStatus($Cid, 4, $Cnaam);
		}
	}
	else{
		changeStatus($Cid,1, $Cnaam);
	}
	file_put_contents('status.json', json_encode($json));

}

function changeStatus($Cid, $status, $Cnaam){
	
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
		doSocialMedia($status, $Cnaam);
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

function doSocialMedia($status, $Cnaam){
	
	switch ($status){
		case(1): $status= "operationeel"; break;
		case(2): $status= "prestatieproblemen"; break;
		case(3): $status= "kleine%20storing"; break;
		case(4): $status= "grote%20storing";
	}
	
	if($_SESSION['settings']['slack']['use_slack']==true){
		$link = 'https://slack.com/api/chat.postMessage?token=' . $_SESSION['settings']['slack']['Access_token'] . '&channel=' . $_SESSION['settings']['slack']['channel'] . '&text=De%20status%20van%20' . urlencode($Cnaam) . '%20is%20gewijzigd%20naar%20' . $status ;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $link);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_exec($ch);
		curl_close($ch);
	}
}

?>