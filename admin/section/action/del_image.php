<?php
$model=new models\ProductModel;	
$id=$_POST['id'];
unset($_POST['url']);
unset($_POST['id']);
$array['image_url']="";
$model->updateProduct($array,$id);