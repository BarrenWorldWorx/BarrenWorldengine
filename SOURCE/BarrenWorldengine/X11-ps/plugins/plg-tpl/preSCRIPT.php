<?php
noDirectCheck() or die("No direct access to this file!");

include (pathPRV.'plugins/plg-tpl/lib/xtemplate.class.php');
if ((isset($utx['get']['tpl'])) AND (preg_match('/\w/',$utx['get']['tplv']) AND (file_exists(pathPRV.'locale/'.LANG.'/tpl/'.$utx['get']['tpl'].'/xtpl/default.xtpl')))) {
	define('currTPL',$utx['get']['tpl']);
	if ((isset($utx['get']['tplv'])) AND (preg_match('/\w/',$utx['get']['tplv']) AND (file_exists(pathPRV.'locale/'.LANG.'/tpl/'.defTPL.'/xtpl/'.$utx['get']['tplv'].'.xtpl')))) {

		define('currTPLfile',$utx['get']['tplv']);
	}
	else {
		define('currTPLfile','default');
	}
	$xtpl = new XTemplate(pathPRV.'locale/'.LANG.'/tpl/'.currTPL.'/xtpl/'.currTPLfile.'.xtpl');
}
else {
	if ((isset($utx['get']['tplv'])) AND (preg_match('/\w/',$utx['get']['tplv']) AND (file_exists(pathPRV.'locale/'.LANG.'/tpl/'.defTPL.'/xtpl/'.$utx['get']['tplv'].'.xtpl')))) {

		define('currTPLfile',$utx['get']['tplv']);
	}
	else {
		define('currTPLfile','default');
	}
	$xtpl = new XTemplate(pathPRV.'locale/'.LANG.'/tpl/'.defTPL.'/xtpl/'.currTPLfile.'.xtpl');
}