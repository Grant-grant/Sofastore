<?php
  class controllers_cartController extends controllers_baseController  
  {
     function __construct()	 
	 {
			$model=new models_cartModel;			
			if($_REQUEST['refresh']){ 
				$list_Item_Id=$_REQUEST;				
				foreach($list_Item_Id as $Item_Id => $new_count)
				{
					$id="";
					if(substr($Item_Id, 0, 5)=="item_") 
					{
						$id=substr($Item_Id, 5);
						$count=$new_count;		
					}
					elseif(substr($Item_Id, 0, 4)=="del_")
					{
						$id=substr($Item_Id, 4);
						$count=0;	
					}					
					if($id)
					{
						$array_product_id[$id]=(int)$count;	
					} 
				}				
				$model->refreshCart($array_product_id); 			
				models_smalCartModel::getInstance()->setCartData();
				header('Location: /cart');
				exit;				
			}	
			if($_REQUEST['clear'])
			{			
				$model->clearCart(); 
				models_smalCartModel::getInstance()->setCartData();
				header('Location: /cart');
				exit;			
			}	
			$big_cart=$model->printCart(); 
			$this->big_cart=$big_cart; 		
			$this->empty_cart=$model->isEmptyCart();	  
	 }	 
  }