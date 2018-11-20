<?php namespace views;
$addcart = '/catalog?in-cart-product-id='.$product["id"];
?>
<h1  class="wrapper fixcart"  style="clear:left;">
<a href="/catalog"><input type="button" class="my_acc" value="Назад в каталог"></a>
</h1>
	<div class="card_product"><div class="wrapper">	<div class="product_image ron product-item"><?php include($_SERVER['DOCUMENT_ROOT'].'/views/RatingView.php');?>
		<image class="prod-imag widthscreen" src="/uploads/<?=$product['image_url']?>" alt="<?=$product['name']?>" title="<?=$product['name']?>" />
	</div></div></div>				
	<section class="pagepr wrapper">
		<h4 class="top-aboutp"><?=$current_category["title"]?></h4>	
		<div class="border">
		<div class="name-aboutp"><?=$product['name']?></div>	
		<div class="descrip-aboutp"><?=$product['desc']?>	</div>
		</div>
		<div class="border">
		<div class="box-mater">
		<div class="mater">Цвет:<span> <?=$product['color']?></span></div><div class="mater">Размер:<span> <?=$product['size']?></span></div>
		</div>
		<div class="box-mater">
		<div class="mater">Каркас:<span> <?=$product['fasad_karkas']?></span></div><div class="mater">Наполнение:<span> <?=$product['filling']?></span></div>
		</div>
		<div class="box-mater">
		<div class="mater">Механизм:<span> <?=$product['mechanism']?></span></div><div class="mater">Бельевой ящик:<span> <?=$product['drawer']?></span></div><div class="mater">Чехол:<span> <?=$product['removable_cover']?></span></div>
		</div>
		<div class="PricePD"><?=$product['price']?> руб. <span> <s> <?=$product['old_price']?></s> руб.</span></div>
		<div><a href="<?=$addcart?>"><div class="bottomcart"><img src="../public/images/cart3.png" alt="cart3" class="cartred">Add to Cart</div></a></div>
		</div>
		<div class="border box-mater">
		<div class="new-text">
		<div class="box-mater"><div class="mater">Дополнительные параметры</div></div>		
		<div class="box-mater"><div class="mater">Спальное место:<span> <?=$product['sleep_size']?></span></div><div class="mater">Состав комплекта:<span> <?=$product['complekt']?></span></div></div>	
		<div class="box-mater"><div class="mater">Цвет ножек:<span> <?=$product['color_legs']?></span></div><div class="mater">Сидячее место:<span> <?=$product['set_size']?></span></div></div>
		</div>
		</div>		
	</section>	