<?php namespace views;?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://www.google.com/recaptcha/api.js?onload=reCaptchaOnLoadCallback&render=explicit"></script>
<h1 class="wrapper categoryname" >Оформление заказа</h1>

<?if($error){ echo $error;}?> 
<?
if($dislpay_form){?>
<form class="wrapper form"  action="" method="post">
    <div align="center">
<table class="table_order_form"> 
<input type="hidden" value="<?=$_REQUEST['id']+1?>"/></br>
<label class="label-w"><b>Ф.И.О.:</b></label><input type="text" name="fio" value="<?=$_REQUEST['fio']?>"/></br>
<label class="label-w"><b>E-mail<span style="color: red;">*</span>:</b></label><input type="text" name="email" required value="<?=$_REQUEST['email']?>"/></br>
<label class="label-w"><b>Телефон<span style="color: red;">*</span>:</b></label><input type="text" name="phone" required value="<?=$_REQUEST['phone']?>"/></br>
<label class="label-w"><b>Адрес<span style="color: red;">*</span>:</b></label><textarea name="adres" required><?=$_REQUEST['adres']?></textarea></br>
<div class="form-captcha">
<div required class="g-recaptcha" data-sitekey="6LfaGH4UAAAAAPESpd_PjT0ile5_NdjILknEuCvI"></div>
  </div> 
</table>
<br/>

<script>
function reCaptcha(selector) {
 var $wg = $(selector); // Обращаемся к селектору (описан ниже в "вызове", в нашем случае это form-captcha)
 $wg.each(function() { // Делаем проход по этому селектору
 var id = randomString(10), // Задаем переменную для id (рандомная строка, ее функция ниже)
 $form = $(this).closest('form'); // Проходим по всей форме
 $form.find('button[type="submit"]').prop('disabled', true); // Изначально даем кнопке disabled (нельзя нажать)
  $(this).append($('<div class="g-recaptcha" id="' + id + '"></div>')); // Добавляем в form-captcha еще блок с рандомным id
   grecaptcha.render(id, { // Используем функции самой рекапчи
   sitekey: $(this).find('.g-recaptcha').data('sitekey') || '', // Находим элемент с нашим дата-атрибутом
   callback: function(response) {
    if (!!response) { 
     $form.find('button[type="submit"]').prop('disabled', false); // Если условие (нажатие галочки) выполнено, убираем disabled у кнопки
    }
   }
  });
 });
};
 
// Функция рандомной строки как id
function randomString(length) {
 var chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz'.split(''),
 result = '';
 length = !length ? Math.floor(Math.random() * chars.length) : length;
 for (var i = 0; i < length; i++) {
  result += chars[Math.floor(Math.random() * chars.length)];
 }
  return result;
 }
//Вызов  
var reCaptchaOnLoadCallback = function() {
 reCaptcha('.form-captcha');
};
</script>


<button type="submit"  class="my_acc2" name="to_order" >Оформить заказ</button><a href="/cart"><input class="my_acc2" type="button" value="Назад в корзину"></a>
</div>
</form>
<?}
else{ 
echo $message; 
};
?>
<div class="wrapper">
</div>
	<?php require 'sliderView.php';?>
