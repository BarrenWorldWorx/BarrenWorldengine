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

// now we clear out the $utx array and define it...
if(isset($utx)) { unset($utx); $utx = array(); } else { $utx = array(); }
// now we define a common timestamp in UNIX Epoch time to denote when this started.
define("unixtime",time());
// Now we query the launch server database to see what server we should redirect the user to.
$utx['result'] = myquery("SELECT * FROM `".dbprfx."server-list` ORDER BY `server-last-access-time` ASC");
$utx['resultarray'] = myarray($utx['result']);
myquery("UPDATE `".dbprfx."server-list` SET `server-last-access-time` = '".unixtime."' WHERE `server-url` = '".$utx['resultarray']['server-url']."'");
header("location: ".$utx['resultarray']['server-url']); die(); exit();