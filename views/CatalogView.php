<?php namespace views;?>
<h1 class="wrapper categoryname"><?=$TiteCategory?></h1>

<?php 
foreach($Items as $item)	{
	$addcart2 = '/catalog?in-cart-product-id='.$item["id"];
			if($i%3==0):?> 
			<div class="wrapper" style="clear:both;"></div>
			<?endif;?>
			<div class="wrapper">
			<div class="product">
				<div class="product_image">					
					<a href="/<?=$item["category_url"]?>/<?=$item["product_url"]?>"><div class="scaleimg"><image class="retro56" src="/uploads/<?=$item["image_url"]?>" /><div class="zatemnenka"></div></div></a>
					
				</div>
				<div class="product-title">
				<a href="/<?=$item["category_url"]?>/<?=$item["product_url"]?>"><?=$item["name"]?></a>
				</div>
				<span class="product-price">
				<b>$ <?=$item["price"]?></b>
				</span>
				<div class="product_buy ">				
						<a class="buy-k-k" href="<?=$addcart2?>">Add Cart</a>
				</div>			
			</div>
			</div>
		<?php $i++;}		
		echo $pager;
?>
</div>
