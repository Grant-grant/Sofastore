<?php namespace views;
$rubl = 'руб.';
$sdwn = 300;
$sfuc = 50000;
$n='none';
?>
<h1 class="categoryname"><?=$TiteCategory?></h1>
<div class="table-pr">Товары от <input class="widin" id="prsrn" type="text" name="specprice" value="<?=$sdwn?>" placeholder="<?=$sdwn?>"/>руб. до <input class="widin" id="prsra" type="text" name="specprice" value="<?=$sfuc?>" placeholder="<?=$sfuc?>"/>руб. <button class="my_acc2" id="filter">Искать</button><button class="my_acc2" id="filter2" style="display:none;">Обновить</button></div>
<?php 
foreach($Items as $item)	{
	$addcart2 = '/catalog?in-cart-product-id='.$item["id"];
	$zap = '/catalog?'.$sfuc;
			if ($item['price']>=$sfuc) $block112 = 'none';
			if($i%3==0):?> 			
			<div class="wrapper" style="clear:both;"></div>
			<?endif;?>
			<div class="wrapper col-md-4">
			<div class="product" id="<?=$item["id"]?>" style="display:<?=$block112?>">
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
<style>.hide{display:none;}
.see{display:block;}
.widin{width: 80px;font-size: 22px;}
.table-pr{
	font-size: 18px;
    border: solid 1px #a79ba7ee;
    padding: 35px;
	background:#ececec;
}
</style>
<script>
$(document).ready(function(){
$('#filter').on('click', ()=> {
	var value1=$("input#prsra").val();
	var value2=$("input#prsrn").val();
<?php 
foreach($Items as $item)	{ ?>
		if (parseInt(<?php echo $item["price"];?>) > parseInt(value1)){ 
		   $('.product#<?php echo $item["id"];?>').addClass('hide');
		}
		if (parseInt(<?php echo $item["price"];?>) < parseInt(value2)){ 
		   $('.product#<?php echo $item["id"];?>').addClass('hide');
		}
<?php $i++;}?>
$('#filter').addClass('hide');
<?php $n='block';?>
$('#filter2').css('display','inline-block');
$('input#prsra').attr('readonly', true).css('border','none').css('font-weight','bold');
$('input#prsrn').attr('readonly', true).css('border','none').css('font-weight','bold');
$('div.table-pr').css('background','#fff');
});

$('#filter2').on('click', ()=> {
location.reload();
});

});
</script>
	<?php require 'vkcommView.php';?>
