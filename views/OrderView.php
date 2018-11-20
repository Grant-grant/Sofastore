<?php namespace views;?>
<h1 class="wrapper categoryname" >Оформление заказа<br/><br/><a href="/cart"><input type="button" class="my_acc" value="Назад в корзину"></a></h1>

<?if($error){ echo $error;}?><br/> 
<?
if($dislpay_form){?>
<form class="wrapper"  action="" method="post">
<table class="table_order_form"> 
<input type="hidden" value="<?=$_REQUEST['id']+1?>"/></br>
<b>Ф.И.О.:</b>&nbsp;&nbsp;<input type="text" name="fio" value="<?=$_REQUEST['fio']?>"/></br>
<b>E-mail<span style="color: red;">*</span>:</b>&nbsp;<input type="text" name="email" value="<?=$_REQUEST['email']?>"/></br>
<b>Телефон<span style="color: red;">*</span>:</b><input type="text" name="phone" value="<?=$_REQUEST['phone']?>"/></br>
<b>Адрес<span style="color: red;">*</span>:</b>&nbsp;&nbsp;&nbsp;<textarea name="adres"><?=$_REQUEST['adres']?></textarea></br>

</table>
<br/>
<input class="my_acc" type="submit" name="to_order" value="Оформить заказ">
</form>
<?}
else{ 
echo $message; 
};
?>
<div class="wrapper">
<?php require 'MarketingView.php'?>
</div>