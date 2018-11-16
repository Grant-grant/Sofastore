<?php
class _CatalogController extends _BaseController 
{
    function __construct()	 
	{	
		if($_REQUEST['in-cart-product-id']) 
		{
			$cart->addToCart($_REQUEST['in-cart-product-id']);
			header('Location: /catalog');
			exit;
		}	
		$page=1;
		$step=8;
		$product_sub_category=1;			
		if(isset($_REQUEST['p']))
		{ 
			$page=$_REQUEST['p'];
		}		
		$model=new models\CatalogModel;			
		$model->category_id=models\CategoryModel::getInstance()->getCategoryList($_REQUEST['category_id']);
		$model->category_id[]=$_REQUEST['category_id'];
		$Items =$model->getPageList($page,$step);		
		$this->pager=$Items['pagination'];
		unset($Items['pagination']);
		$this->TiteCategory=$model->current_category["title"];
		$this->Items=$Items;
	}
}
