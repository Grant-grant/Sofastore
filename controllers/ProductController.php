<?php
  class _ProductController extends _BaseController  
  {
     function __construct()	 
	 {
	     $model=new models\ProductModel;
		 $product = $model->getProduct($_REQUEST['id']);	
		 $this->product=$product;		
	 }	 
  }