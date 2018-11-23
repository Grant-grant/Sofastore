<?php
function myloader($class_name)  {
    $pathc=str_replace("_", "/",lcfirst($class_name));
    if (file_exists($pathc.".php")) {   
     include_once($pathc.".php");
    }
	else{	header("HTTP/1.0 404 Not Found");
	echo "К сожалению такой страницы не существует, [".PATH_SITE.$pathc.".php ]";
	echo ", но вот вам котики <img src='public/images/404.jpg'>";
	exit;}
 } 
 
spl_autoload_register('myloader'); 

define('PATH_SITE', '/grandsofa.ru/public_html/'); 	
require_once "./config/setting_sql.php";  