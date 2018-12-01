<?php
$model=new models_productModel;	
if($id=$model->addProduct($_POST))
	$response=array("msg"=>"не удалось создать товар!","status"=>false);
else
	$response=array("msg"=>"Создан товар","status"=>true);	
echo json_encode($response);