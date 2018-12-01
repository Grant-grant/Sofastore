<?php
if($id=models_categoryModel::getInstance()->delCategory($_POST['id']))
	$response=array("msg"=>"Не удалось удалить категорию!","status"=>false);
else
	$response=array("msg"=>"Удалена категория","status"=>true);	
echo json_encode($response);