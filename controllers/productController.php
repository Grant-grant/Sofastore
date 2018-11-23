<?php
  class controllers_productController extends controllers_baseController  
  {
     function __construct()	 
	 {
	     $model=new models_productModel;
		 $product = $model->getProduct($_REQUEST['id']);	
		 $this->product=$product;		
	 }	 
  }