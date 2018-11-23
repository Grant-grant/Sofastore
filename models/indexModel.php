<?php
class models_indexModel extends models_dateBaseModel 
{
	public $route='index';
	public function __construct()
	{	
	$this->getRoute();	
	}
	
	private function getRoute()  
	{
	   $route=$this->route;
	   if (empty($_GET['route']))
       {  
		$route = 'index';
	   }  
	   else  
	   {
         $route = $_GET['route'];				
		 $rt=explode('/', $route);
		 $route=$rt[(count($rt)-1)];		
		 if(isset($rt[(count($rt)-2)]))
		 {		
		 $sql = "SELECT  c.url as category_url, p.url as product_url, p.id  FROM product p LEFT JOIN category c ON c.id=p.cat_id WHERE p.url like '$route'";
		 $result = parent::query($sql);							
				if($obj = parent::fetch_object($result))
				{			
					if($rt[(count($rt)-2)]==$obj->category_url)
					{			
						 $sql = "SELECT  p.id  FROM product p WHERE p.url like '%s'";
						 $result = parent::query($sql,$route);					
						 if($row = parent::fetch_object($result))
						 {
							 $_REQUEST['id']=$row->id;
							 $route="product";	 
						 }					
					}
				}
		 }
		 else 
		 {
			$sql = "SELECT  c.url as category_url, c.id FROM category c WHERE c.url like '%s'";
			$result = parent::query($sql,$route);
			if($obj = parent::fetch_object($result))
			{
				$_REQUEST['category_id']=$obj->id;
				$route="catalog";	
			}
		 }
	   }
		$this->route=$route;
		return $route;  
	}
	
	public function getView()
	{
       $route=$this->route;
	   if($route!="admin")
	   {
	   $path_view = 'views/' ;
       $view = $path_view.$route.'View.php';  
	   } 
	   return $view;
    }
	
    private function getController(){       
       $route=$this->route;
	   if($route!="admin"){
	   $path_contr = 'controllers/';
       $controller= $path_contr.$route.'Controller.php';   }
	   return $controller; 
	   }
	  
	 public function Run()	{ 
	   session_start(); 		
	   $controller=$this->getController();
	   $cl=explode('.', $controller);	   
	   $cl=$cl[0];     
	   $name_contr=str_replace("/", "_", $cl);
	   $contr=new $name_contr;
       $member=$contr->member;
	   return $member;	
	}
}