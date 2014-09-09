<?php
noDirectCheck() or die("No direct access to this file!");

// PATHS - this sets some basic paths...
define('pathPRV',"/home/platoplato/bwfiles/X11-ps/");
define('pathLIVE',"/home/platoplato/bwfiles/client_html/");
// Define the default language if by this point the $_GET url parameter of "lang"
// is not set.
if (isset($_GET['lang']) AND (preg_match('/(\w|\_)+/',$_GET['lang'])) AND (file_exists(pathPRV.'config/locale/'.$_GET['lang'].'/langCONF.php'))) {
	define('LANG',$_GET['lang']);
}
else {
	define("LANG","english_US");
}

// SECRETS ---- SHHHHHhhhhhh these are secret;)

define('secretPUBLIC',"iwannamajorgeneralobtuse58*n@");
define('secretPRIVATE',"bannanablobburritosjfl;kdjf*0{");

// DEFAULTS ----- These are default values for various things...

define('defTPL','darkMayhem');
define('defCOM','front');
define('defACTION','view');
define('defID','0');
define('defUUID','00000000-0000-0000-0000-000000000000');

// temp (will be moved to langCONF.php

define('headerMETACHARSET','utf-8');
define('sitename','BarrenWorld MMORPG');
define('sitemotto','All the Adrenaline with Twice the Radiation!');