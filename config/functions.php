<?php
interface InterFunctions
{
    public function getMenu();
	public function getSmalCart();
}

class SpecialFunctions implements InterFunctions
{
	public function getMenu(){
		return controllers_menuController::getInstance()->getMenu();
	}

	public function getSmalCart(){
		return models_smalCartModel::getInstance()->getCartData();
	}	
}

$retro = new SpecialFunctions();
$retro->getMenu();
$retro->getSmalCart();

$menu=$retro::getMenu();
$smal_cart=$retro::getSmalCart();
$category_list= models_categoryModel::getInstance()->getCategoryList_UL(0);