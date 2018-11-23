<?php
class models_categoryModel extends models_dateBaseModel  
{
	public $categories;
	protected static $instance; 	
	private function __construct() 
	{
		$result = parent::query("SELECT * FROM  `category` ORDER BY sort ");
		if(parent::num_rows($result))
		{	while ($row = parent::fetch_assoc($result))
			{
				$this->categories[]=$row; 
			}		
			sort($this->categories);	
		}
	}	

	public static function getInstance() 
	{
		if (!is_object(self::$instance)) self::$instance = new self;
		return self::$instance;
    }
	 
	public function  addCategory($array)
	{	
		$array['url']=translitIt($array['title']);
		if(strlen($array['url'])>60)$array['url']=	substr($array['url'], 0, 60);
			if(parent::build_query("INSERT INTO category SET ",$array))
			{
			    $id = parent::insert_id();
				return $id;	
			}		
		return	false;	
	}

	public function  editCategory($id,$array)	
	{
		$array['url']=translitIt($array['title']);
		if(strlen($array['url'])>60)$array['url']=	substr($array['url'], 0, 60);
		if(parent::query("UPDATE category SET ".parent::build_part_query($array)." WHERE id = %d",$id))
		{			   
			return true;
		}
		return	false;	
	}
	
	public function  delCategory($id)
	{
		if(parent::query("DELETE FROM category WHERE id = %d",$id))
		{
			return true;
		}
		return	false;
	}
	
	public function  getCategoryList_UL($parent=0)
	{		 
	 foreach($this->categories as $category)
	 {	 		
		 if($category["parent"]==$parent)
		 {
			$print.='<li><a href="/'.$category['url'].'">'.$category['title'].'</a>';			
			foreach($this->categories as $sub_category)
			{ 		
				 if($sub_category["parent"]==$category['id'])
				 {
					$flag=true;
					break; 
				 }
			}			 
			if($flag)
			{
				$print.="<ul>".$this->getCategoryList_UL($category['id'])."</ul></li>";
			}
			else
			$print.='</li>';	
		 }		
	 }	 	
	 return  $print;	
	}	

	public function  getCategoryList($parent=0)	
	{		
		foreach($this->categories as $category)
		{	 		
		 if($category["parent"]==$parent)
		    {		
					$this->list_category_id[]=$category['id'];
					$this->getCategoryList($category["id"]);						
			}	
		}
	 return  $this->list_category_id;	
	}
	
	public function  getCategoryTitleList()	
	{		
		foreach($this->categories as $category)
		{	 		
		$titleList[$category["id"]]=$category["title"];
		}
	 return  $titleList;	
	}
	
	public function  getHierarchyCategory($parent=0)	
	{
		$cat_array=array();
		 foreach($this->categories as $category)
		 {	 		
			 if($category["parent"]==$parent)
			 {	
						$child=$this->getHierarchyCategory($category["id"]);						
						if(!empty($child))
						{						
							$array=$category;
							$array["child"]=$child;	
						}	
						else 
						{
						$array=$category;
						}						
						$cat_array[]=$array;										
			 }	
		 }
		 return  $cat_array;		
	}	
	
	public function  getTitleCategory($array_categories)	
	{
		global $lvl;
			foreach($array_categories as $category)
			{				
				$option.="<option value=".$category["id"].">";
				$option.= str_repeat("-", $lvl);
				$option.= $category["title"];
				$option.="</option>";		
				if(isset($category["child"]))
				{
					$lvl++;
					$option.= $this->getTitleCategory($category["child"]);
					$lvl--;
				}
			}
		return $option;	
	}	
	
	public function  getCategoryTree($parent=0)	
	{	
	 foreach($this->categories as $category)
	 {	 		
		 if($category["parent"]==$parent)
		 {
			$print.='<li><a href="#" rel="CategoryTree" id="'.$category['id'].'" parent_id="'.$category["parent"].'">'.$category['title'].'</a>';
			foreach($this->categories as $sub_category)
			{ 
				 if($sub_category["parent"]==$category['id'])
				 {
					$flag=true;
					break; 
				 }
			}			 
			if($flag)
			{
				$print.="<ul>".$this->getCategoryTree($category['id'])."</ul></li>";
			} 
			else 
			{
				$print.='</li>';
			}				
		 }		
	 }	
	 return  $print;	
	}
	 
	function getCategoryName($id)  
	{ 
		$sql = sprintf("SELECT title FROM category WHERE id='%d'", mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$id));
		$result = mysqli_query(mysqli_connect(HOST, USER, PASSWORD, 'Sofastore'),$sql)  or die(mysqli_error(mysqli_connect(HOST, USER, PASSWORD, NAME_BD)));
	    if($row = mysqli_fetch_object($result))	 
		{	 		
			 return $row->title;	
		}
		return false; 
	}	
 }
 