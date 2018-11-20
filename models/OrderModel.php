<?php
namespace models;

 class OrderModel extends DateBaseModel   
 {	  
	private $fio;
	private $email;
	private $phone;
	private $adres;		
		
	function isValidData($array_data)
	{
		if(!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $array_data['email']))
		{ 
		  $error="<span style='margin-left:60px; color:red;'>E-mail не существует!</span>";	
		} 
		if(!preg_match("/^[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}$/", $array_data['phone']))
		{ 
		  $error="<span style='margin-left:60px; color:red;'>Введите по шаблону *-***-***-**-**!</span>";	
		} 
		elseif(!trim($array_data['adres']))
		{ 
		  $error="<span style='margin-left:60px; color:red;'>Введите адресс!</span>";	
		}
		if($error)return $error;
		else
		{
			$this->fio=trim($array_data['fio']);
			$this->email=trim($array_data['email']);
			$this->phone=trim($array_data['phone']);
			$this->adres=trim($array_data['adres']);
			return false;
		}     
	}
		
	function addOrder()
	{
		$date = date( "d.m.y H:i" );			
		$item_position = new ProductModel;
		foreach($_SESSION['cart'] as $product_id=>$count){
			$price=$item_position->getProductPrice($product_id);
			$namep=$item_position->getProductName($product_id);
			$product_positions[$product_id] = array(
			"name_P"=>$namep,
			"price"=>$price,
			"count"=>$count,
			);
		}
		$order_content=serialize($product_positions);
		$cart = new CartModel;	
		$summ = $cart->getTotalSumm();
		
		$array=array(
			"fio"=>$this->fio, 			
			"email"=>$this->email,
			"phone"=>$this->phone,
			"adres"=>$this->adres,			
			"date"=>date( "d.m.y H:i" ),
			"summ"=>$summ,
			"order_content"=>$order_content,
		);
		
		parent::build_query("INSERT INTO `order` SET",$array);
		$id=parent::insert_id();		
		if($id) $cart->clearCart();
		return $id;
	}	

 } 