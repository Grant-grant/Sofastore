<?php
if($id=models\CategoryModel::getInstance()->addCategory($_POST)){
	$response=array("msg"=>"Не удалось создать категорию!","status"=>false);
} else {
$response=array("msg"=>"Создана категория","status"=>true);
}	
echo json_encode($response);