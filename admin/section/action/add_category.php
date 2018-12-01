<?php
if($id=models_categoryModel::getInstance()->addCategory($_POST)){
	$response=array("msg"=>"Не удалось создать категорию!","status"=>false);
} else {
$response=array("msg"=>"Создана категория","status"=>true);
}	
echo json_encode($response);