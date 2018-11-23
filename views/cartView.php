<?php namespace views;?>
<h2 class="wrapper categoryname">Корзина</h2><hr>
<?if($empty_cart):?>
		<form class="wrapper" action="/cart" method="post">
			<?=$big_cart;?>
			<input type="submit" class="my_acc2" name="refresh" value="Пересчитать"  style="margin-left:10px; margin-top:10px;" />
		</form>	
		<form class="wrapper" action="/order" method="post">
			<input type="submit" class="my_acc2" name="order" value="Оформить заказ" style="margin-left: 50%;" />
		</form>
<?else:?>
<div class="wrapper"  style="clear:left;">
<h2>Ваша корзина пуста!</h2></div>
<?endif;?>

<?php require 'marketingView.php'?>