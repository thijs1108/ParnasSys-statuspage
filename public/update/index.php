<?php
session_start();
$myfile = fopen("settings.json", "r");
$settings = json_decode(fread($myfile,filesize("settings.json")), true);
$_SESSION['settings'] = $settings;
fclose($myfile);
require('functions.php');



foreach($settings['components'] as $component){
	$totaltime = 0;
	if(isDomainAvailible($component['location'])){
		maintainAvailable($component['Cid'], true);
		for($i=0; $i<4; $i++){
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $component['location']);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			$time=microtime(TRUE);
			$result = curl_exec($ch);
			$totaltime += (microtime(TRUE)-$time)*1000;
		}
		$avgTime = $totaltime/4;
		print ($avgTime . "<br>");
		$link = $settings['statusboardlink'] . 'metrics/' . $component['Mid'] .'/points';
		postMetricPoint($link, $settings['token'], $avgTime);
		
	}
	else{
		echo ($component['name']. " onbereikbaar <br> ");
		maintainAvailable($component['Cid'], false);
	}
}


?>