<?php
$id=$_POST['id'];

if(models_categoryModel::getInstance()->editCategory($id,$_POST)) 
$response=array("msg"=>"Не удалось изменить категорию!", "status"=>false); 
 else $response=array("msg"=>"Изменена категория!", "status"=>true);
echo json_encode($response);