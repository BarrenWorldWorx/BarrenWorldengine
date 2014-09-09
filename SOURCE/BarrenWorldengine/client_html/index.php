<?php

// THIS file defines the relative path to the X11-ps folder.
// Not much to see in this file most of the brunt work gets done in the X11-ps/indexCALL.php file.

session_start();
function noDirectCheck() { return TRUE; }
include("indexPATH.php");

// includes some config files we need no matter what...
include(pathREL."config/common/dbCONF.php");
include(pathREL."config/common/sysCONF.php");
include(pathREL."indexCALL.php");