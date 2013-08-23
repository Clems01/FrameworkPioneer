<?php
// PHP EEDOMUS Framework for Pioneer HomeCinema VSX series with Ethernet (Can work with RS232)
// Author Clems01
// 


require_once "./php-telnet/PHPTelnet.php";

// Set here your pioneer IP device
$PioneerIP = '192.168.0.50';
$Command = 'empty';

/********** Send commands **********/
// We get back the argument
if (isset($_GET['do']) && ($_GET['do'] != null))
	$do = $_GET['do'];

if (isset($do))
{
	switch ($do)
	{
		// Some examples of commands with Pioneer vsx921
		case "power_on" :
		{$Command = 'PO';break;}
		
		case "power_off" :
		{$Command = 'PF';break;}
		
		case "volume_up" :
		{$Command = 'VU';break;}
		
		case "volume_down" :
		{$Command = 'VD';break;}
		
		case "set_volume_to_30db" :
		{$Command = '101VL';break;}
		
		case "set_volume_to_40db" :
		{$Command = '081VL';break;}
		
		case "set_volume_to_50db" :
		{$Command = '061VL';break;}
		
		case "mute_on" :
		{$Command = 'MO';break;}
		
		case "mute_off" :
		{$Command = 'MF';break;}
		
		case "input_BD" :
		{$Command = '25FN';break;}
		
		case "input_video1" :
		{$Command = '10FN';break;}
		
		case "input_video2" :
		{$Command = '14FN';break;}
		
		case "input_DVD" :
		{$Command = '04FN';break;}
		
		case "input_tuner" :
		{$Command = '02FN';break;}
		
		case "listening_DPLII_MOVIE" :
		{$Command = '0010SR';break;}
		
		case "listening_FSRWIDE" :
		{$Command = '0100SR';break;}		
		
	}
	//Send command to VSX.
	if ($Command != "empty"){
		$telnet = new PHPTelnet();
		$result = $telnet->Connect($PioneerIP,'','');
		echo $result;
		
		if ($result == 0) {
			$telnet->DoCommand($Command, $result);
			echo $result;
			$telnet->Disconnect();
		}
	}
	else
	{
		echo "Wrong command received";
	}
else
{
	echo "No command received";
}

/********** Receive commands **********/
// Work on Going...

?>
