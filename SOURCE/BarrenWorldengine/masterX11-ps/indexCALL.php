<?php

// THIS is the primary script that gets ran from someone doing a call on the
// index.php file in the webroot. By keeping it here beyond the webroot we keep
// prying eyes absolutely out ;)

noDirectCheck() or die("No direct access to this file!");

// includes some function libraries we need no matter what...

include(pathPRV."includes/sysLIB.php");

// does some basic session sanity checks....
$_SESSION = initSession($_SESSION);

$_SESSION = agentSession($_SESSION,$_SERVER['HTTP_USER_AGENT']);

// marks the remote server's ip address...
define("userIP",$_SERVER['REMOTE_ADDR']);
// creates a basic security token for form data...
if (!isset($_SESSION['token'])) {
	define("token",md5(uniqid(rand(), true)));
	$_SESSION['token'] = token;
}
else {
	// gee the token must already be set by the session so define the token by the
	// session token value...
	define("token",$_SESSION['token']);
}
// now we clear out the $utx array and define it...
if(isset($utx)) { unset($utx); $utx = array(); } else { $utx = array(); }
// now we safely read the $_GET url parameters into the $utx array...
$utx['get'] = safeGet($_GET);
// now we define a common timestamp in UNIX Epoch time to denote when this started.
define("unixtime",time());

// now we hand it off to the plugin loader which loads the actual framework
// in the order we can control on the fly...

include(pathPRV."includes/pluginLOADER.php");
