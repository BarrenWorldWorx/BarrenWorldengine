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

function safeGet($getting) {

	if((isset($getting['com'])) AND (preg_match('/(\w|\d|\-)+/',$getting['com']))) {
		$gotten['com'] = $getting['com'];
	}
	else {
		$gotten['com'] = defCOM;
	}
	if((isset($getting['action'])) AND (preg_match('/(\w|\d|\-)+/',$getting['action']))) {
		$gotten['action'] = $getting['action'];
	}
	else {
		$gotten['action'] = defACTION;
	}
	if((isset($getting['tpl'])) AND (preg_match('/(\w|\d|\-)+/',$getting['tpl']))) {
		$gotten['tpl'] = $getting['tpl'];
	}
	else {
		$gotten['tpl'] = defTPL;
	}
	if((isset($getting['tplv'])) AND (preg_match('/(\w|\d|\-)+/',$getting['tplv']))) {
		$gotten['tplv'] = $getting['tplv'];
	}
	else {
		$gotten['tplv'] = 'default';
	}
	if((isset($getting['id'])) AND (preg_match('/(\d)+/',$getting['id']))) {
		$gotten['id'] = $getting['id'];
	}
	else {
		$gotten['id'] = defID;
	}
    if((isset($getting['uuid'])) AND (preg_match('/(\d|\w|\-)+/',$getting['uuid']))) {
		$gotten['uuid'] = $getting['uuid'];
	}
	else {
		$gotten['uuid'] = defUUID;
	}
	return $gotten;

}

function myUUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    } else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        return $uuid;
    }
}

function validateDataWhite($get) {

	return $outcome;
}

function stripDataWhite($data) {
	str_replace("\n","",$data);
	
	return $data
}