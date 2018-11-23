<?php

require_once "../config/setting_sql.php"; 
define('PATH_SITE', $_SERVER['DOCUMENT_ROOT']."/"); 
 
	function __autoload ($class_name) 
	{
		$path=str_replace("_", "/", $class_name);
		if (file_exists("../".$path.".php")) {
		 include_once("../".$path.".php");	
		}else{
		header("HTTP/1.0 404 Not Found");
		echo "К сожалению такой страницы не существует. [".PATH_SITE.$path.".php ]";
		exit;	}
	}	
	
require_once "url.php";

function loger($text)
{
	$vvod=print_r($text , true);
	$date = date("Y_m_d");
	$filename = "log_".$date.".txt";
	$string = date("d.m.Y H:i:s")." => $vvod"."\n";
	$f = fopen($filename,"a+");
	fwrite($f,$string);
	fclose($f);
}