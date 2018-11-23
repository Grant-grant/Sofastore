<?php namespace views;?>

</div></div>
<h1 class="wrapper  categoryname" >Контакты</h1>
<?php if($error){ echo $error;}?><br/>
<?php
if($dislpay_form){?>
<form class="wrapper"  action="" method="post">
<div class="table_order_form"> 
<b>Ф.И.О.:</b>&nbsp;&nbsp;<input type="text" name="fio" value="<?=$_REQUEST['fio']?>"/></br>
<b>E-mail<span style="color: red;">*</span>:</b>&nbsp;<input type="text" name="email" value="<?=$_REQUEST['email']?>"/></br>
<b>Тема:</b>&nbsp;&nbsp;&nbsp;<textarea name="theme"><?=$_REQUEST['theme']?></textarea></br>
<b>Текст:</b>&nbsp;&nbsp;&nbsp;<textarea name="message"><?=$_REQUEST['message']?></textarea></br>
</div>
<br/>
<input class="my_acc2" type="submit" name="send" value="Отправить сообщение">
</form>
<?}
else{ 
echo $message; 
}
?>
	<?php require 'vkcommView.php';?>