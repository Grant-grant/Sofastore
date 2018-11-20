<?php namespace views;?>
<?php
if(!$unVisibleForm):?>
<h1 class="wrapper categoryname">Авторизация</h1>
<?endif;?>
<?
if(!$unVisibleForm):
echo $msg;
?>

<form action="/enter" method="POST">
<div align="center" ><div align="center" >
<br>
<b>login:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="15" maxlength="40" name="login" value="<?=$login?>" /><br />
<b>Пароль:</b><input type="text" size="15" name="pass" value="<?=$pass?>" /><br /> </div> 
 <div align="center" > <br><br><input class="my_acc2 btsearch" value="Авторизоваться" id="btn_login" type="submit"><br><a href="/reg"><br />  
  <input class="my_acc2 btsearch" value="Регистрация" type="button"></a></div> 
</form>

<?else:?>
<h4 class="wrapper categoryname">Вы авторизовались как <b class="signer"> <?php echo $login; ?></b></h4>
<div class="wrapper enterback" align="center"><a href="/enter?out=1">
<b class="my_acc">Выйти из профиля</b></a></div>

<?endif;?>
</div>