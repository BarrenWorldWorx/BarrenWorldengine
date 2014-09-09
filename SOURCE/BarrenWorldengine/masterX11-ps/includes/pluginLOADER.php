<?php
noDirectCheck() or die("No direct access to this file!");

// THIS script runs the plugins by the order we call them from the database...
// we do them in this order and then filter them by their listing order...
// 1. preSCRIPT, 2. runSCRIPT, 3. postSCRIPT.
// now based upon the plugins-list-perms field some conditions may apply...
// ALL~ALL = runs on all ID  and action/component calls.
// DENY~ID~IDNUMBER = denies running on an ID call based on IDNUMBER.
// DENY~COM~COMNAME~ALL|ACTIONNAME - denies on a component name either all or by action name.
// so with that we begin....



// Okay first we get the preSCRIPT listing for plugins...
$utx['pluginsloader']['sql']['result'][1] = myquery("SELECT * FROM `".dbprfx."plugins-list` WHERE ((`plugins-list-type` = 'preSCRIPT') AND (`plugins-list-perms` NOT LIKE '%DENY~ID~".$utx['get']['id']."%') AND (`plugins-list-perms` NOT LIKE '%DENY~COM~".$utx['get']['com']."~ALL%') AND (`plugins-list-perms` NOT LIKE '%DENY~COM~".$utx['get']['com']."~".$utx['get']['action']."%')) ORDER BY `plugins-list-order` ASC");

if($utx['pluginsloader']['sql']['result'][1] != FALSE) {

	$utx['pluginsloader']['sql']['rows'][1] = myrows($utx['pluginsloader']['sql']['result'][1]);
	
	$utx['pluginsloader']['counter'][1] = 0;
	while($utx['pluginsloader']['counter'][1] < $utx['pluginsloader']['sql']['rows'][1]) {
		// now we go through them one by one
		$utx['pluginsloader']['sql']['array'][1] = myarray($utx['pluginsloader']['sql']['result'][1]);
		// and we include them to the process to run them one by one...
		include(pathPRV."plugins/".$utx['pluginsloader']['sql']['array'][1]['plugins-list-name']."/preSCRIPT.php");
		// and we add 1 to the counter...
		$utx['pluginsloader']['counter'][1]++;
	}
}

// Next the runSCRIPT listing for plugins...
$utx['pluginsloader']['sql']['result'][1] = myquery("SELECT * FROM `".dbprfx."plugins-list` WHERE ((`plugins-list-type` = 'runSCRIPT') AND (`plugins-list-perms` NOT LIKE '%DENY~ID~".$utx['get']['id']."%') AND (`plugins-list-perms` NOT LIKE '%DENY~COM~".$utx['get']['com']."~ALL%') AND (`plugins-list-perms` NOT LIKE '%DENY~COM~".$utx['get']['com']."~".$utx['get']['action']."%')) ORDER BY `plugins-list-order` ASC");
if($utx['pluginsloader']['sql']['result'][1] != FALSE) {
	
	$utx['pluginsloader']['sql']['rows'][1] = myrows($utx['pluginsloader']['sql']['result'][1]);
	$utx['pluginsloader']['counter'][1] = 0;
	while($utx['pluginsloader']['counter'][1] < $utx['pluginsloader']['sql']['rows'][1]) {
		// now we go through them one by one
		$utx['pluginsloader']['sql']['array'][1] = myarray($utx['pluginsloader']['sql']['result'][1]);
		// and we include them to the process to run them one by one...
		include(pathPRV."plugins/".$utx['pluginsloader']['sql']['array'][1]['plugins-list-name']."/runSCRIPT.php");
		// and we add 1 to the counter...
		$utx['pluginsloader']['counter'][1]++;
	}
}

// and finally the postSCRIPT listing for plugins...
$utx['pluginsloader']['sql']['result'][1] = myquery("SELECT * FROM `".dbprfx."plugins-list` WHERE ((`plugins-list-type` = 'postSCRIPT') AND (`plugins-list-perms` NOT LIKE '%DENY~ID~".$utx['get']['id']."%') AND (`plugins-list-perms` NOT LIKE '%DENY~COM~".$utx['get']['com']."~ALL%') AND (`plugins-list-perms` NOT LIKE '%DENY~COM~".$utx['get']['com']."~".$utx['get']['action']."%')) ORDER BY `plugins-list-order` ASC");
if($utx['pluginsloader']['sql']['result'][1] != FALSE) {
	
	$utx['pluginsloader']['sql']['rows'][1] = myrows($utx['pluginsloader']['sql']['result'][1]);
	$utx['pluginsloader']['counter'][1] = 0;
	while($utx['pluginsloader']['counter'][1] < $utx['pluginsloader']['sql']['rows'][1]) {
		// now we go through them one by one
		$utx['pluginsloader']['sql']['array'][1] = myarray($utx['pluginsloader']['sql']['result'][1]);
		// and we include them to the process to run them one by one...
		include(pathPRV."plugins/".$utx['pluginsloader']['sql']['array'][1]['plugins-list-name']."/postSCRIPT.php");
		// and we add 1 to the counter...
		$utx['pluginsloader']['counter'][1]++;
	}
}