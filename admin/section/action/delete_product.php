<?php
$model=new models_productModel;	
if($model->deleteProduct($_POST['id']))
	$response=array("msg"=>"Не удалось удалить товар!","status"=>false);
else
	$response=array("msg"=>"Удален товар","status"=>true);	
echo json_encode($response);