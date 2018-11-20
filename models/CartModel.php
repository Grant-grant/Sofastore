<?php
namespace models;

 class CartModel 
 {	  
	  function addToCart($id, $count=1)	  
	  {
		$_SESSION['cart'][$id]=$_SESSION['cart'][$id]+$count;		
		return true;  
	  }	
	  
	  function getListItemId() 	  
	  {	  	  		 
		if (!empty($_SESSION['cart']))
		{
			$listId=array_keys($_SESSION['cart']);
			return $listId;	
		}	return false;  
	  }	  
	  
	  function getTotalSumm()   
	  {	  	  		 
		$array_product_id=$this->getListItemId();
		$item_position = new ProductModel();		
		foreach($array_product_id as $id){
			$product_positions[]=$item_position->getProduct($id);
		}
		foreach($product_positions as $product)	{
			$total_summ+=$_SESSION['cart'][$product['id']]*$product['price'];
		}			
		return $total_summ.' $';
	  }
	  
	 function clearCart()
	 {
	 unset($_SESSION['cart']);
	 }
	 
	 function refreshCart($array_product_id)
	 { 
		foreach($array_product_id as $Item_Id => $new_count)
		{
			if($new_count<=0)
			{ 
				unset($_SESSION['cart'][$Item_Id]); 
			} 
			else $_SESSION['cart'][$Item_Id]=$new_count; 
		}		
	 } 
	
	function isEmptyCart()
	{ 
    if($_SESSION['cart']) return true; 
    else return false;
    }
	
	function printCart()  
	{	  	  
		$array_product_id=array();
		$product_positions=array();
		
		$array_product_id=$this->getListItemId(); 	
		$item_position = new ProductModel();		
		if (!empty($array_product_id))
		foreach($array_product_id as $id)
			{
			$product_positions[]=$item_position->getProduct($id); 		
			}
			$table_cart="<table $bgcolor='#fefefe' class='detailsbuy row table_cart'><tr><th>product details</th><th>&nbsp;</th><th>unite price</th><th>quantity</th><th>subtotal</th><th>delete</th></tr>";
			$i=1;
			foreach($product_positions as $product)
			{
				$bgcolor="#fefefe";
				$table_cart.="<tr bgcolor=$bgcolor style='border-bottom: 1px solid #ccc;'>";				
				$table_cart.="<td><img class='minibuyimg' src='../uploads/".$product['image_url']."'></td>";
				$table_cart.="<td>".$product['name']."</td>";
				$table_cart.="<td>".$product['price']." $ </td>";
				$table_cart.="<td><input style='text-align: center; border: 1px solid grey;' type='text' style='text-align:center' size=3 name='item_".$product['id']."' value='".$_SESSION['cart'][$product['id']]."' /></td>";
				$table_cart.="<td>".$_SESSION['cart'][$product['id']]*$product['price']." $. </td>";
				$table_cart.="<td>"."<input TYPE='radio' style='border: 1px; outline:none; background: transparent;' name='del_".$product['id']."'></td>";
				$table_cart.="</tr>";	
				$total_summ+=$_SESSION['cart'][$product['id']]*$product['price'];	
			}
			$table_cart.="<tr><td colspan='3'></td><td>К оплате: </td><td><strong> <span style='color: #7F0037'>".$total_summ." $ </span></strong></td><td></td></tr></table>";
		return $table_cart;
	}	  
} 