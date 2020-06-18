<?php
$userType = "";

function loggedIn(){
	global $userType;
	
	$filename = "session_info.txt";
	$session_info = fopen($filename, "r");

	$username = fgets($session_info);
	$userType = trim(fgets($session_info));

	fclose($session_info);

	if($username=="")
		return false;
	else
		return true;
}