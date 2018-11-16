<?php
interface InterFunctions
{
    public function getMenu();
}

class SpecialFunctions implements InterFunctions
{
	public function getMenu(){
		return _MenuController::getInstance()->getMenu();
	}	
}

$retro = new SpecialFunctions();
$retro->getMenu();

$menu=$retro::getMenu();
$category_list=models\CategoryModel::getInstance()->getCategoryList_UL(0);
