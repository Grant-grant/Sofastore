<?php namespace views;?>

<script src="http://www.google.com/recaptcha/api.js?onload=reCaptchaOnLoadCallback&render=explicit"></script>
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
<b><label class="label-w">login:</label></b><input type="text" size="15" maxlength="40" required name="login" value="<?=$login?>" /><br />
<br /> Введите 8 и более букв (лат.) и цифр <br />  
<b><label class="label-w">Пароль:</label></b><input type="password" size="15" required name="pass" value="<?=$pass?>" pattern="[a-z0-9._%+-]{8,}" /><br />  
<b><label class="label-w">Повторите:</label></b><input type="password" size="15" required name="pass" value="<?=$pass?>" pattern="[a-z0-9._%+-]{8,}" /><br />  
 
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
<div class="form-captcha">
<div required class="g-recaptcha" data-sitekey="6LfaGH4UAAAAAPESpd_PjT0ile5_NdjILknEuCvI"></div>
  </div>
  <br><br><button type="submit" class="my_acc2">Подтвердить</button>
  <a href="/enter"><input class="my_acc2 btsearch" value="Авторизация" type="button"></a>  
  </div> 
</form>

<?else:?>
<h4 class="wrapper categoryname">Всё верно</h4>
<?endif;?>
 </div> 
