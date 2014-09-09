<?php
noDirectCheck() or die("No direct access to this file!");

// some basic assignments ...
$xtpl -> assign("headerMETACHARSET",headerMETACHARSET);
$xtpl -> assign("sitename",sitename);
$xtpl -> assign("sitemotto",sitemotto);
$xtpl -> assign("LANG",LANG);
// last actions ...
$xtpl -> parse("main");
$xtpl -> out("main");