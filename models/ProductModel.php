<?php
namespace models;

 class ProductModel extends DateBaseModel  
 {	  		
	function addProduct($array)  
	{ 	
		$array['url']=translitIt($array['name']);
		if(strlen($array['url'])>60) $array['url']=substr($array['url'], 0, 60);
			if(parent::build_query("INSERT INTO product SET ",$array))
			{
			    $id = parent::insert_id();
				return $id;		
			}		
		return	false;  
	}	  
		
	  function updateProduct($array,$id)  
	  {
		if(parent::query("UPDATE product SET ".parent::build_part_query($array)." WHERE id = %d",$id)){			   
				return true;	}
		return	false;  
	  }
	  
	  function deleteProduct($id)	  
	  { 
		if(parent::query("DELETE FROM product WHERE id = %d",$id))
		{
		return true;	
		}
		return	false;	  
	  }	  
	  
	  function getProduct($id)  
	  { 		
		 $result=parent::query("SELECT * FROM product WHERE id='%d'",$id);
		 if($product = mysqli_fetch_array($result)) 
		 return $product;   
	  }
	  
	  function getProductPrice($id)  
	  { 
		$sql = sprintf("SELECT price FROM product WHERE id='%d'", mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$id));
		$result = mysqli_query(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$sql)  or die(mysqli_error(mysqli_connect(HOST, USER, PASSWORD, NAME_BD)));
	    if($row = mysqli_fetch_object($result))	 
			{	 		
			 return $row->price;  
			}
		  return false; 
	  }
	  
	  function getProductName($id)  
	  { 
		$sql = sprintf("SELECT name FROM product WHERE id='%d'", mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$id));
		$result = mysqli_query(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$sql)  or die(mysqli_error(mysqli_connect(HOST, USER, PASSWORD, NAME_BD)));
	    if($row = mysqli_fetch_object($result))	 
			{	 		
			 return $row->name;  
			}
		  return false; 
	  }
	  
	  function getProductColor($id)  
	  { 
		$sql = sprintf("SELECT color FROM product WHERE id='%d'", mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$id));
		$result = mysqli_query(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$sql)  or die(mysqli_error(mysqli_connect(HOST, USER, PASSWORD, NAME_BD)));
	    if($row = mysqli_fetch_object($result))	 
		{	 		
			 return $row->color;  
		}
		  return false; 
	  }
	  
	  function getProductSize($id)  
	  { 
		$sql = sprintf("SELECT size FROM product WHERE id='%d'", mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$id));
		$result = mysqli_query(mysqli_connect(HOST, USER, PASSWORD, NAME_BD),$sql)  or die(mysqli_error(mysqli_connect(HOST, USER, PASSWORD, NAME_BD)));
	    if($row = mysqli_fetch_object($result))	 
		{	 		
			 return $row->size;  
		}
		  return false; 
	  }
} 