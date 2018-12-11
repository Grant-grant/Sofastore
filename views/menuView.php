<?php namespace views;?>
<?php
$mysqli = mysqli_connect(HOST, USER, PASSWORD, NAME_BD);

function getCat($mysqli){
	$sql = 'SELECT * FROM `category`';
	$res = $mysqli->query($sql);
	$cat = array();
	while($row = $res->fetch_assoc()){
		$cat[$row['id']] = $row;
	}
	return $cat;
}

function getTree($dataset) {
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

$cat  = getCat($mysqli); 
$tree = getTree($cat);

function tplMenu($category){
	$menu = '<li>
		<a href="'. $category['url'] .'" title="'. $category['title'] .'">'.$category['title'].'</a>';
		if(isset($category['childs'])){
			$menu .= '<ul>'.showCat($category['childs']).'</ul>';
		}
	$menu .= '</li>';	
	return $menu;
}

function showCat($data){
	$string = '';
	foreach($data as $item){
		$string .= tplMenu($item);
	}
	return $string;
}

$cat_menu = showCat($tree);
echo '<nav class="wrapper"><ul style="position: absolute;  z-index: 2;   top: 235px;"><li><a href="/index"><img src="../public/images/menu/home.png" style="max-height: 25px;"></a></li>'. $cat_menu .'<li><a href="/feedback">Контакты</a></li></ul></nav>';
?>