<?php
noDirectCheck() or die("No direct access to this file!");
// THIS is the primary SYSTEM LIBRARY of FUNCTIONS for the Framework :)


//MySQL Query Database
function myquery($query) {
	mysql_connect(dbhost, dbuser, dbpass);
	mysql_select_db(dbname);
	$result = mysql_query($query);
	if (!mysql_errno() && @mysql_num_rows($result) > 0) {
	}
	else {
		$result = FALSE;
	}
	mysql_close();
	return $result;
}
// MySQL Num Rows
function myrows($result) {
	$rows = @mysql_num_rows($result);
	return $rows;
}
// MySQL fetch array
function myarray($result) {
	$array = mysql_fetch_array($result);
	return $array;
}
// MySQL escape string
function myescape($query) {
	$escape = mysql_escape_string($query);
	return $escape;
}
//Initilize Session
function initSession($session) {
	if (!isset($session['initiated'])) {
		session_regenerate_id();
		$session['initiated'] = true;
	}
	return $session;
}
//Agent Session
function agentSession($session,$agent) {
	$fingerprint = md5($agent . secretPUBLIC);
	if (isset($session['HTTP_USER_AGENT'])) {
		if ($session['HTTP_USER_AGENT'] != $fingerprint) {
			die();
			exit;
		}
	} else {
		$session['HTTP_USER_AGENT'] = $fingerprint;
	}
	return $session;
}