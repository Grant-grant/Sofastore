<?php
	$model=new models_catalogModel;	
	$catalog=array();
	
	$model->category_id=models_categoryModel::getInstance()->getCategoryList($category_id); 
	$model->category_id[]=$category_id;
	
	$catalog=$model->getPageList($page);
	$list_categories=models_categoryModel::getInstance()->getCategoryTitleList();
	$array_categories=$model->category_id=models_categoryModel::getInstance()->getHierarchyCategory(0);		

	$categories.= "<ul id='category-tree'>";
	$categories.= models_categoryModel::getInstance()->getCategoryTree();	
	$categories.= "</ul>";

	$pagination=$catalog['pagination'];
	unset($catalog['pagination']);	
	
	$select_categories="<select id='category_edit_select' name='select_parent_category'>";
	$select_categories.="<option selected value='0'>Все</option>";
	$select_categories.= models_categoryModel::getInstance()->getTitleCategory($array_categories);	
	$select_categories.="</select>";
?>	

<ul id="contextMenu">
	<li><a href="#" rel="edit_category">&nbsp;&nbsp;Редактировать</a></li>
	<li><a href="#" rel="creat_new_category">&nbsp;&nbsp;Добавить подкатегорию</a></li>
	<li><a href="#" rel="delete_category">&nbsp;&nbsp;Удалить</a></li>
	<li style="border-top: gray 1px solid; margin-top:5px;"><a href="#" rel="cansel_context">&nbsp;&nbsp;Отмена</a></li>
</ul>
<h1>Редактор категорий</h1>
 <div id="category-editor">
<div id="category-head">
<a href="#" rel="creat_new_category" id="0" class="button" style="margin-top:3px; float:left;">&nbsp;&nbsp;Добавть категорию</a>
</div>

<?=$categories?>
</div>

<div class="creat_category">
		<div class="popwindow">
			<div class="title_popwindow">
				Новая категория	
			</div>		
			<div class="close_popwindow">
				<a href="#" rel="cancel_creat_new_category" >
				<img  src="css/images/icons/close.png"/>
				</a>
			</div>
		</div>			
		<table border="1">		
		<tr><td>Родительская категория: </td><td id="parent_name"></td></tr>
		<tr><td>Название:</td><td><input type="text" name="category_name"/></td></tr>		
		<tr><td colspan="3" style="height:40px; text-align:right;">	<a href="#" rel="save_new_category" class="button" >Сохранить</a></td></tr>
		</table>
		<div style="display:none" id="parent_id">0</div>
</div>

<div class="edit_category">
		<div class="popwindow">
			<div class="title_popwindow">
				Редактировать категорию
			</div>		
			<div class="close_popwindow">
				<a href="#" rel="cancel_edit_category" >
				<img  src="css/images/icons/close.png"/>
				</a>
			</div>
		</div>
		
		<table border="1">	
		<tr><td>Родительская категория: </td><td id="parent_name"><?=$select_categories?></td></tr>
		<tr><td>Название:</td><td><input type="text" name="edit_name"/></td></tr>	
		<tr><td colspan="3" style="height:40px; text-align:right;">
				<a href="#" rel="save_edit_category" class="button" >Сохранить</a>
		</td></tr>
		</table>
		<div style="display:none" id="edit_id"></div>
</div>