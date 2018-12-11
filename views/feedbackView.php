<?php namespace views;?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://www.google.com/recaptcha/api.js?onload=reCaptchaOnLoadCallback&render=explicit"></script>

<h1 class="wrapper  categoryname" >Контакты</h1>
<?php if($error){ echo $error;}?><br/>
<?php
if($dislpay_form){?>
<form class="wrapper form"  action="" method="post">
<div align="center">
<div class="table_order_form"> 
<label class="label-w"><b>Ф.И.О.:</b></label><input type="text" name="fio" value="<?=$_REQUEST['fio']?>"/></br>
<label class="label-w"><b>E-mail<span style="color: red;">*</span>:</b></label><input required type="text" name="email" value="<?=$_REQUEST['email']?>"/></br>
<label class="label-w"><b>Тема:</b></label><input type="text"  name="theme" value="<?=$_REQUEST['theme']?>"/></br>
<label class="label-w"><b>Текст<span style="color: red;">*</span>:</b></label><textarea required name="message"><?=$_REQUEST['message']?></textarea></br>
<div class="form-captcha">
<div required  class="g-recaptcha" data-sitekey="6LfaGH4UAAAAAPESpd_PjT0ile5_NdjILknEuCvI"></div>
</div></div>
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
<button type="submit" id="feed" class="my_acc2" name="send">Отправить сообщение</button>
</div>
</form>
<?php }
else{ 
echo $message; 
}
?>
	<?php require 'vkcommView.php';?>
