<?php namespace views;?>
<?php
if(!$unVisibleForm):?>
<h1 class="wrapper categoryname">Регистрация</h1>
<?endif;?>
<?
if(!$unVisibleForm):
echo $msg;
?>

<form action="/reg" method="POST">
<div align="center" ><div align="center" ><div class="cat">Укажите логин и пароль для регистрации</div><br />
<br>
<b><label class="label-w">login:</label></b><input type="text" size="15" maxlength="40" name="login" value="<?=$login?>" /><br />
<br /> Введите 8 и более букв (лат.) и цифр <br />  
<b><label class="label-w">Пароль:</label></b><input type="text" size="15" name="pass" value="<?=$pass?>" pattern="[a-z0-9._%+-]{8,}" /><br />  
<b><label class="label-w">Повторите:</label></b><input type="text" size="15" name="pass" value="<?=$pass?>" pattern="[a-z0-9._%+-]{8,}" /><br />  
  <br><br><input class="my_acc2" value="Подтвердить" type="submit">   
  <a href="/enter"><input class="my_acc2 btsearch" value="Авторизация" type="button"></a>  
  </div> 
</form>

<?else:?>
<h4 class="wrapper categoryname">Всё верно</h4>
<?endif;?>
 </div> 