<?php
 class models_orderModel extends models_dateBaseModel   
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
		$item_position = new models_productModel;
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
		$cart = new models_cartModel;	
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
		
		$to_user  = $this->email; 
		$to_admin = 'grand-sofa@mail.ru';
		$subject = 'Сообщение о покупки grandsofa.ru';
		$message = "<b>ФИО: </b>".$this->fio."</br>";
		$message .= "<b>e-mail: </b>".$this->email."</br>";
		$message .= "<b>Телефон: </b>".$this->phone."</br>";
		$message .= "<b>Адрес: </b>".$this->adres."</br>";
		$message .= "<b>Дата: </b>".date( "d.m.y H:i" )."</br>";
		$message .= "<b>Сумма: </b>".$summ."</br>";
		$message .= "<b>Заказ: </b>".$order_content."</br>";
		
		$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
		$headers .= 'From: grandsofa.ru'.$this->$array["phone"]."\r\n";		
		$sarray=array("fio"=>$this->fio, "email"=>$this->email,	"phone"=>$this->$array["phone"], "message"=>$this->message,);		
		
		mail($to_admin, $subject, $message, $headers);	
			
		parent::build_query("INSERT INTO `order` SET",$array);
		$id=parent::insert_id();		
		if($id) $cart->clearCart();
		return $id;
	}	

 } 
