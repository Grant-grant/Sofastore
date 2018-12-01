<?php
$model=new models_productModel;	
$id=$_POST['id'];

unset($_POST['url']);
unset($_POST['id']);

if($model->updateProduct($_POST,$id)){
$response=array("msg"=>"Не удалось изменить параметры товара","status"=>false);
} else $response=array("msg"=>"Товар изменен!","status"=>true);
echo json_encode($response);