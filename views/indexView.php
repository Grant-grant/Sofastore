<?php namespace views;?>

<div class="wrapper">
<?php require 'marketingView.php';?>	
	<section class="center wrapper">
		<div class="row">
<?php
$mysqli = mysqli_connect(HOST, USER, PASSWORD, NAME_BD);
function getCat2($mysqli){
	$sql = 'SELECT * FROM `category` where `title` like "Д%"';
	$res = $mysqli->query($sql);
	$cat = array();
	while($row = $res->fetch_assoc()){
		$cat[$row['id']] = $row;
	}
	return $cat;
}
function getTree2($dataset) {
	$tree = array();
	foreach ($dataset as $id => &$node) {    
		if (!$node['parent']){
			$tree[$id] = &$node;
		}else{ 
            $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}
	return $tree;
}
$cat  = getCat2($mysqli); 
$tree = getTree2($cat);
function tplMenu2($category){
	$menu = '<div class="blockb"><a href="/'. $category['url'] .'" title="'. $category['title'] .'"><img src="public/images/labelhot/pop-cat.png" alt="slide2" class="label-home" /><h2 class="blockv descr">Популярная категория<br><span>'.$category['title'].'</span></h2></a></div>';	
	return $menu;
}
function showCat2($data){
	$string = '';
	foreach($data as $item){
		$string .= tplMenu2($item);
	}
	return $string;
}
$cat_menu2 = showCat2($tree);
echo '<nav class="wrapper"><ul>'. $cat_menu2 .'</ul></nav>';
?>	
		</div>
<div class="row">
<?php
$mysqli = mysqli_connect(HOST, USER, PASSWORD, NAME_BD);
function getproduct3($mysqli){
	$sql = 'SELECT * FROM `product` where `name` like "Д%" limit 0,2';
	$res = $mysqli->query($sql);
	$product = array();
	while($row = $res->fetch_assoc()){
		$product[$row['id']] = $row;
	}
	return $product;
}
function getTree3($dataset) {
	$tree = array();
	foreach ($dataset as $id => &$node) {    
		if (!$node['parent']){
			$tree[$id] = &$node;
		}else{ 
            $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}
	return $tree;
}
$product  = getproduct3($mysqli); 
$tree = getTree3($product);
function tplMenu3($productegory){
	$menu = '<div class="blockb"><a href="/pryamyie/'.$productegory['url'] .'" title="'. $productegory['name'] .'"><img src="public/images/labelhot/pop-prod.png" alt="slide2" class="label-home" /><h2 class="blockv descr">Популярный товар<br><span>'.$productegory['name'].'</span></h2></a></div>';	
	return $menu;
}
function showproduct3($data){
	$string = '';
	foreach($data as $item){
		$string .= tplMenu3($item);
	}
	return $string;
}
$product_menu3 = showproduct3($tree);
echo '<nav class="wrapper"><ul>'. $product_menu3 .'</ul></nav>';
?>	
</div>
	</section>	
<?php require 'sliderView.php';?>			
</div>
