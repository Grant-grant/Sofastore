<?php namespace views;
$rubl = 'руб.';
?>
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
				<?php if ($item['old_price']==0.00) {
				$item['old_price']='';
				$rubl = '';
				}?>				
				<b class="PricePD"><?=$item["price"]?> руб.</b><s> <?=$item["old_price"]?> <?php echo $rubl;?></s>
				</span>
				<div class="product_buy ">				
						<a class="buy-k-k" href="<?=$addcart2?>">Add</a>
				</div>			
			</div>
			</div>
		<?php $i++;}		
		echo $pager;
?>
</div>
	<?php require 'vkcommView.php';?>