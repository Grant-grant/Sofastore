<?php
class models_catalogModel extends models_dateBaseModel  
{	  
	  public $category_id=array();
	  public $current_category=array();
		
	  function getPageList($page=1)  
	  { 
			$cartPage=8;
			$page=$page-1;		
			$filter="";		
			foreach($this->category_id as $cat_id)
			{
				$filter.= " OR c.id=".$cat_id;
			}	
			if(!$this->getCurrentCategory()){}
			if($this->current_category["url"]=="catalog")
			{
				$sql = "SELECT  p.id  FROM product p LEFT JOIN category c ON c.id=p.cat_id";
				$result = parent::query($sql);	
			}
			else	
			{
				$sql = "SELECT  p.id  FROM product p LEFT JOIN category c ON c.id=p.cat_id WHERE c.id=%d ".$filter;
				$result = parent::query($sql,end($this->category_id));	
			}			
			$count = ceil(parent::num_rows($result)/$cartPage); 
			if($page<=0)$page=0;
			if($page>=$count)$page=$count-1;
			$lower_bound=$page*$cartPage; 		
			if(empty($this->category_id)) 
			{
				$sql = "SELECT  *  FROM product ORDER BY id LIMIT %d , %d";
				$result = parent::query($sql,$lower_bound,$cartPage);
			}
			else 
			{
				$filter="";		
				if(!empty($this->category_id))
				{
					foreach($this->category_id as $cat_id)
					{
					$filter.= " OR c.id=".$cat_id;	
					}			
					if($this->current_category["url"]=="catalog")
					{
					$sql = "SELECT  c.url as category_url, p.url as product_url, p.*  FROM product p LEFT JOIN category c ON c.id=p.cat_id  ORDER BY id LIMIT %d , %d";
					$result = parent::query($sql,$lower_bound,$cartPage);
					}	
					else 
					{
						$sql = "SELECT  c.url as category_url, p.url as product_url, p.*  FROM product p LEFT JOIN category c ON c.id=p.cat_id WHERE c.id=%d ".$filter." ORDER BY id LIMIT %d , %d";
						$result = parent::query($sql,$this->category_id[0],$lower_bound,$cartPage);	
					}
				}
			}		
			if(parent::num_rows($result))
			{	
				while ($row = parent::fetch_assoc($result))	
				{		 
					$сatalogItems[]=$row;
				}		
				$activ_page=$page; 	
				$url_page=$this->current_category["url"];
			}
			if($count>1)
			{
				for($page=0; $page<$count; $page++)
				{
					($activ_page==$page)?$class="activ":$class="";
					$pages.='<a class="'.$class.'" href="/'.$url_page.'?p='.($page+1).'">'.($page+1).'</a>';
				} $pages='<div class="pagination"> '.($activ_page+1).' из '.($count).' '.$pages.'</div>';
			}
			$сatalogItems['pagination']=$pages;				
			return $сatalogItems;
				
	  }	  
	  
	  function getCurrentCategory()
	  {
			$sql = "SELECT  url, title FROM category WHERE id=%d";				
			if(end($this->category_id))		
			{
				$result = parent::query($sql,end($this->category_id));	
				if($this->current_category = parent::fetch_assoc($result))
				{
					return true;	
				}
			} 
			else 
			{		
			$this->current_category['url']="catalog";
			$this->current_category['title']="CATALOG";
				return true;	
			}	
			return false;			
	  }	
} 