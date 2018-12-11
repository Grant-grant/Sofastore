<?php
  class controllers_menuController 
  {
	protected static $instance; 
	private function __construct() 
	{		
	}	
	public static function getInstance()
	{
		if (!is_object(self::$instance))
		{
		self::$instance = new self;
		}
		return self::$instance;
	}	 
	public function getMenu() 
	{	
	   $print="<ul>";	
			if ($name=="Вход" && $_SESSION["User"]!="")
			{
				$print.='<li><a href="/enter">'.$_SESSION["User"].'</a> [ <a href="/enter?out=1"><span style="font-size:10px">выйти</span></a> ]</li>';
			}	
			else 
			{
				include_once ('./views/menuView.php');
			
		}		
	   $print.="</ul>";	
	   return  $print;	 
	}
 }
