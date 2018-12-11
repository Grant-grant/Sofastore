<script src="../public/js/jquery.form.js"></script>	
<script src="../public/js/loader.js"></script>	
<?php
		$model=new models_catalogModel;	
		$catalog=[];
		
		$model->category_id=models_categoryModel::getInstance()->getCategoryList($category_id); 
		$model->category_id[]=$category_id;
		
		$catalog=$model->getList($page,5);
		$list_categories=models_categoryModel::getInstance()->getCategoryTitleList();
		$array_categories=$model->category_id=models_categoryModel::getInstance()->getHierarchyCategory(0);	
		
		$categories="<select id='category_select' name='category'>";
		$categories.="<option selected value='0'>Все</option>";
		$categories.=models_categoryModel::getInstance()->getTitleCategory($array_categories);	
		$categories.="</select>";

		$pagination=$catalog['pagination'];
		unset($catalog['pagination']);
?>

<h1>Каталог товаров</h1>
	<a href="#" rel="creat_new_product" class="button"> Добавить товар</a>
	<br/><br/><b>Категория товаров</b> <?=$categories?>
	<table class="catalog_table"><tr><th>ID</th><th>Категория</th><th>Изображение</th><th>Артикул</th><th>Название</th><th>Описание</th><th>Цена</th><th>Старая цена</th><th>Цвет</th><th>Размер</th><th>Цвет ножек</th><th>Спальное место</th><th>Посадочное место</th><th>Фасад/Каркас</th><th>Механизм</th><th>Наполение</th><th>Бельевой ящик</th><th>Съёмный чехол</th><th>Комплект:</th></tr>	 
	<?	foreach ($catalog as $data){?>
		<tr id="<?=$data['id']?>">
		<td class="id"><?=$data['id']?></td>
		<td id="<?=$data['cat_id']?>" class="cat_id"><?=$list_categories[$data['cat_id']]?></td>
		<td class="image_url"><?if(!$data['image_url']){$data['image_url']="none.png";}?><img class="uploads" src="../uploads/<?=$data['image_url']?>"/></td>
		<td class="code"><?=$data['code']?></td>
		<td class="name"><?=$data['name']?></td>
		<td class="desc" id="<?=$data['id']?>"><?=$data['desc']?></td>
		<td class="price"><?=$data['price']?></td>
		<td class="old_price"><?=$data['old_price']?></td>		
		<td class="color"><?=$data['color']?></td>
		<td class="size"><?=$data['size']?></td>
		
		<td class="color_legs"><?=$data['color_legs']?></td>
		<td class="sleep_size"><?=$data['sleep_size']?></td>		
		<td class="set_size"><?=$data['set_size']?></td>
		<td class="fasad_karkas"><?=$data['fasad_karkas']?></td>
		<td class="mechanism"><?=$data['mechanism']?></td>
		<td class="filling"><?=$data['filling']?></td>			
		<td class="drawer"><?=$data['drawer']?></td>
		<td class="removable_cover"><?=$data['removable_cover']?></td>	
		
		<td class="complekt"><?=$data['complekt']?></td>	
		
		<td><a href="#" rel="edit" id="<?=$data['id']?>">Редактировать</a></td>
		<td><a href="#" rel="del" id="<?=$data['id']?>">Удалить</a></td>
		</tr>
	<?}?>
	<tr><td colspan="22"><?=$pagination?></td></tr>
	</table>	
	
	<div class="creat_product">
		<div class="popwindow">
			<div class="title_popwindow">
				Новый товар		
			</div>
			<div class="close_popwindow">
				<a href="#" rel="cancel_creat_new_product" >
				<img  src="css/images/icons/close.png"/>
				</a>
			</div>
		</div>	
		<table border="1">	
		<tr>
			<td>Название:</td><td><input type="text" name="name"/></td>
			<td rowspan="4">Изображение:
			<div class="btn_load_img">
				<form id="imageform" method="post" enctype="multipart/form-data" action="loadimage.php">
				<input type="file" name="photoimg" id="photoimg" />
				</form>	
			</div>			
			<div class="btn_cansel_load_img">
				<a href="#" id="form_del_img"  alt="Отменить" title="Отменить"><img  src="css/images/cancal_upload.png"/></a>
			</div>				
			<div id="preview"></div>
			</td>
		</tr>
		<tr><td>Артикул:</td><td><input type="text" name="code"/></td></tr>
		<tr><td>Цена:</td><td><input type="text" name="price"/> руб</td></tr>
		<tr><td>Старая цена:</td><td><input type="text" name="old_price"/> руб</td></tr>
		<tr><td>Категория:</td><td>				
				<select id='new_prod_category' name='category'>
				<option selected value='0'>Все</option>
				<?=models_categoryModel::getInstance()->getTitleCategory($array_categories);?>	
				</select></td></tr>
		<tr><td>Описание:</td><td colspan="2"><textarea name="description" style="width:100%; height: 150px;"></textarea></td></tr>
		<tr><td>Цвет:</td><td><input type="text" name="color" /></td></tr>
		<tr><td>Размер:</td><td><input type="text" name="size"/></td></tr>				
		<tr><td>Цвет ножек:</td><td><input type="text" name="color_legs"/></td></tr>
		<tr><td>Спальное место:</td><td><input type="text" name="sleep_size"/></td></tr>		
		<tr><td>Посадочное место:</td><td><input type="text" name="set_size"/></td></tr>
		<tr><td>Фасад/Каркас:</td><td><input type="text" name="fasad_karkas"/></td></tr>		
		<tr><td>Механизм:</td><td><input type="text" name="mechanism"/></td></tr>
		<tr><td>Наполнение:</td><td><input type="text" name="filling"/></td></tr>		
		<tr><td>Бельевой ящик:</td><td><input type="text" name="drawer"/></td></tr>
		<tr><td>Съемный чехол:</td><td><input type="text" name="removable_cover"/></td></tr>
		
		<tr><td>Комплект:</td><td><input type="text" name="complekt"/></td></tr>		
		<tr><td colspan="3" style="height:40px; text-align:right;"><a href="#" rel="save_new_product" class="button" >Сохранить</a></td></tr>
		</table>
	</div>
	
	<div class="edit_product">
		<div class="popwindow">
			<div class="title_popwindow">
				Редактировать товар		
			</div>
			<div class="close_popwindow">
			<a href="#" rel="cancel_edit_product" >
			<img  src="css/images/icons/close.png"/>
			</a>
			</div>
		</div>			
		<table border="1">	
			<tr><td>Название:</td><td><input type="text" name="edit_name" /></td><td rowspan="4">Изображение:
			<div class="edit_btn_load_img">			
			<form id="edit_imageform" method="post" enctype="multipart/form-data" action="loadimage.php">
			<input type="file" name="edit_photoimg" id="edit_photoimg" />
			</form></div>			
			<div class="edit_btn_cansel_load_img">
				<a href="#" id="edit_form_del_img"  alt="Отменить" title="Отменить"><img  src="css/images/cancal_upload.png"/></a>
			</div>			
			<div id="edit_preview">				
			</div></td></tr>
			
			<tr><td>Артикул:</td><td><input type="text" name="edit_code"/></td></tr>
			<tr><td>Цена:</td><td><input type="text" name="edit_price"/> руб</td></tr>
			<tr><td>Старая цена:</td><td><input type="text" name="edit_old_price"/> руб</td></tr>
			<tr><td>Категория:</td><td>
			
			<select id='edit_category' name='category'>
			<option selected value='0'>Все</option>
			<?=models_categoryModel::getInstance()->getTitleCategory($array_categories);?>	
			</select>				
			</td></tr>				
			<tr><td>Описание:</td><td colspan="2"><textarea name="edit_description" style="width:100%; height: 150px;"></textarea></td></tr>
			<tr><td>Цвет:</td><td><input type="text" name="edit_color" /></td></tr>
			<tr><td>Размер:</td><td><input type="text" name="edit_size"/></td></tr>
			
			<tr><td>Цвет ножек:</td><td><input type="text" name="edit_color_legs"/></td></tr>
			<tr><td>Спальное место:</td><td><input type="text" name="edit_sleep_size"/></td></tr>		
			<tr><td>Посадочное место:</td><td><input type="text" name="edit_set_size"/></td></tr>
			<tr><td>Фасад/Каркас:</td><td><input type="text" name="edit_fasad_karkas"/></td></tr>		
			<tr><td>Механизм:</td><td><input type="text" name="edit_mechanism"/></td></tr>
			<tr><td>Наполнение:</td><td><input type="text" name="edit_filling"/></td></tr>		
			<tr><td>Бельевой ящик:</td><td><input type="text" name="edit_drawer"/></td></tr>
			<tr><td>Съемный чехол:</td><td><input type="text" name="edit_removable_cover"/></td></tr>
			
			<tr><td>Комплект:</td><td><input type="text" name="edit_complekt"/></td></tr>			
			<tr><td colspan="3" style="height:40px; text-align:right;">
			<a href="#" rel="save_edit_product" class="button" >Сохранить</a>
			</td></tr>
		</table>
		<input type="hidden" name="edit_id"/>
	</div>	
