<?php
require_once "config/config.php"; 
$router=new models_indexModel; 
$member=$router->Run();

if(isset($member)) 
  foreach ($member as $key => $value)
	{
	 	$$key= $value; 		
	}
 if($_SESSION["Auth"] && $_SESSION["role"]=="1"){	
		require_once "admin/adminbar.php";
}	

require_once "config/functions.php";		
require_once "template/index.php";