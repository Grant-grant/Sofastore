<?php
function mycontroller($class_name)  {
    $pathc=str_replace("_", "controllers/", $class_name);
    if (file_exists($pathc.".php")) {   
     include_once($pathc.".php");	}
	else{	header("HTTP/1.0 404 Not Found");
	echo "К сожалению такой страницы не существует, . [".PATH_SITE.$pathc.".php ]";
	echo ", но вот вам котики <img src='public/images/kote.jpg'>";
	exit;}
 } 
 
spl_autoload_register('mycontroller');

define('PATH_SITE', $_SERVER['DOCUMENT_ROOT']); 	
require_once "./config/setting_sql.php";  