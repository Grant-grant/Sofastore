<?php
class controllers_orderController extends controllers_baseController  
{  
    function __construct()	 
	{				
		$this->dislpay_form = true; 
			if(isset($_REQUEST["to_order"]))
			{  
				$model = new models_orderModel;	
				$error=$model->isValidData($_REQUEST);  
				if($error==true)
				{
					$this->error=$error;
				}
				else
				{			
					$order_id=$model->addOrder();
					models_smalCartModel::getInstance()->setCartData();
					header('Location: /order?id='.$order_id);
					exit;
				}
			}			
			if(isset($_REQUEST["id"]))
			{
				$this->message="<div class='wrapper' style='clear:left;'><h2>Ваша заявка принята</h2></div>";
				$this->dislpay_form = false;
			}
	}
}