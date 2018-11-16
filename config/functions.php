<?php
interface InterFunctions
{
    public function getMenu();
	public function getSmalCart();
}

class SpecialFunctions implements InterFunctions
{
	public function getMenu(){
		return _MenuController::getInstance()->getMenu();
	}

	public function getSmalCart(){
		return models\SmalCartModel::getInstance()->getCartData();
	}	
}

$retro = new SpecialFunctions();
$retro->getMenu();
$retro->getSmalCart();

$menu=$retro::getMenu();
$smal_cart=$retro::getSmalCart();
$category_list=models\CategoryModel::getInstance()->getCategoryList_UL(0);