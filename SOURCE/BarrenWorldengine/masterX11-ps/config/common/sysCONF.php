<?php
noDirectCheck() or die("No direct access to this file!");

// PATHS - this sets some basic paths...
define('pathPRV',"/home/platoplato/bwfiles/masterX11-ps/");
define('pathLIVE',"/home/platoplato/bwfiles/master_html/");
// Define the default language if by this point the $_GET url parameter of "lang"
// is not set.
if (isset($_GET['lang']) AND (preg_match('/(\w|\_)+/',$_GET['lang'])) AND (file_exists(pathPRV.'config/locale/'.$_GET['lang'].'/langCONF.php'))) {
	define('LANG',$_GET['lang']);
}
else {
	define("LANG","english_US");
}

// SECRETS ---- SHHHHHhhhhhh these are secret;)

define('secretPUBLIC',"iwannambalhdowhause58*n@");
define('secretPRIVATE',"bannanamumkasdwho84&osjfl;kdjf*0{");

// DEFAULTS ----- These are default values for various things...

define('defTPL','dataWhite');
define('defCOM','info');
define('defACTION','view');
define('defID','0');
define('defUUID','00000000-0000-0000-0000-000000000000');

// temp (will be moved to langCONF.php

define('headerMETACHARSET','utf-8');