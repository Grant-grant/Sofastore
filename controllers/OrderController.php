<?php
class _OrderController extends _BaseController  
{  
    function __construct()	 
	{				
		$this->dislpay_form = true; 
			if(isset($_REQUEST["to_order"]))
			{  
				$model = new models\OrderModel;	
				$error=$model->isValidData($_REQUEST);  
				if($error==true)
				{
					$this->error=$error;
				}
				else
				{			
					$order_id=$model->addOrder();
					models\SmalCartModel::getInstance()->setCartData();
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