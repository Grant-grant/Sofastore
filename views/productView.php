<?php namespace views;
$addcart = '/catalog?in-cart-product-id='.$product["id"];
$rubl = 'руб.';
$block = 'block';
?>
<h1  class="wrapper fixcart"  style="clear:left;">
<a href="/catalog"><input type="button" class="my_acc" value="Назад в каталог"></a>
</h1>
	<div class="card_product"><div class="wrapper">	<div class="ron product-item"><?php include($_SERVER['DOCUMENT_ROOT'].'/views/ratingView.php');?>
		<image class="widthscreen cartoon" src="/uploads/<?=$product['image_url']?>" alt="<?=$product['name']?>" title="<?=$product['name']?>" />
	</div></div></div>				
	<section class="pagepr wrapper">
		<h4 class="top-aboutp"><?=$current_category["title"]?></h4>	
		<div class="border">
		<div class="name-aboutp"><?=$product['name']?></div>	
		<div class="descrip-aboutp"><?=$product['desc']?>	</div>
		<?php if ($product['old_price']==0.00) {
			$product['old_price']='' ;
			$rubl = '';
		}
		if ($product['size']=='') $block0 = 'none';
		if ($product['fasad_karkas']=='') $block1 = 'none';
		if ($product['filling']=='') $block2 = 'none';
		if ($product['mechanism']=='') $block3 = 'none';
		if ($product['drawer']=='') $block4 = 'none';
		if ($product['removable_cover']=='') $block5 = 'none';
		if ($product['sleep_size']=='') $block6 = 'none';
		if ($product['complekt']=='') $block7 = 'none';
		if ($product['color_legs']=='') $block8 = 'none';
		if ($product['set_size']=='') $block9 = 'none';			
		?>
		<div class="PricePD"><?=$product['price']?> руб. <span> <s> <?=$product['old_price']?></s> <?php echo $rubl;?></span></div>
		<div><a href="<?=$addcart?>"><div class="bottomcart"><img src="../public/images/cart3.png" alt="cart3" class="cartred">Add to Cart</div></a></div>
		</div>		
		<div class="border">
		<table class="tablesecta">
		<tr class="box-mater"><td class="mater">Цвет:<span> <?=$product['color']?></span></td></tr>
		<tr style="display:<?=$block0?>" class="box-mater"><td class="mater">Размер:<span> <?=$product['size']?></span></td></tr>
		<tr style="display:<?=$block1?>" class="box-mater"><td class="mater">Каркас:<span> <?=$product['fasad_karkas']?></span></td></tr>
		<tr style="display:<?=$block2?>" class="box-mater"><td class="mater">Наполнение:<span> <?=$product['filling']?></span></td></tr>
		<tr style="display:<?=$block3?>" class="box-mater"><td class="mater">Механизм:<span> <?=$product['mechanism']?></span></td></tr>
		<tr style="display:<?=$block4?>" class="box-mater"><td class="mater">Бельевой ящик:<span> <?=$product['drawer']?></span></td></tr>
		<tr style="display:<?=$block5?>" class="box-mater"><td class="mater">Чехол:<span> <?=$product['removable_cover']?></span></td></tr>		
		</table>		
		<table class="tablesecta" >
		<tr style="display:<?=$block6?>" class="box-mater"><td class="mater">Спальное место:<span> <?=$product['sleep_size']?></span></td></tr>
		<tr style="display:<?=$block7?>" class="box-mater"><td class="mater">Состав комплекта:<span> <?=$product['complekt']?></span></td></tr>	
		<tr style="display:<?=$block8?>" class="box-mater"><td class="mater">Цвет ножек:<span> <?=$product['color_legs']?></span></td></tr>
		<tr style="display:<?=$block9?>" class="box-mater"><td class="mater">Сидячее место:<span> <?=$product['set_size']?></span></td></tr>
		</table>
		
		
		</div>		
	</section>	
	<?php require 'vkcommView.php';?>
