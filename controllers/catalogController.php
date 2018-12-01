<?php
class controllers_catalogController extends controllers_baseController 
{
    function __construct()	 
	{	
		if($_REQUEST['in-cart-product-id']) 
		{
			$cart=new models_cartModel;
			$cart->addToCart($_REQUEST['in-cart-product-id']);
			models_smalCartModel::getInstance()->setCartData();
			header('Location: /catalog');
			exit;
		}	
		$page=1;
		$step=9;
		$product_sub_category=1;			
		if(isset($_REQUEST['p']))
		{ 
			$page=$_REQUEST['p'];
		}		
		$model=new models_catalogModel;			
		$model->category_id=models_categoryModel::getInstance()->getCategoryList($_REQUEST['category_id']);
		$model->category_id[]=$_REQUEST['category_id'];
		$Items =$model->getPageList($page,$step);		
		$this->pager=$Items['pagination'];
		unset($Items['pagination']);
		$this->TiteCategory=$model->current_category["title"];
		$this->Items=$Items;
	}
}