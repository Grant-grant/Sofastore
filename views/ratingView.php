<link rel="stylesheet" href="../template/rating.css"> 
<div id="rating">
<div class="paramot">Комфорт:</div>
<div><div class="stars"></div><p class="progressing" id="p1"></p></div>
<div class="rating" id="param1">5.0</div>
<div class="paramot">Доставка:</div>
<div><div class="stars"></div><p class="progressing" id="p2"></p></div>
<div class="rating" id="param2">5.0</div>
<div class="paramot">Качество:</div>
<div><div class="stars"></div><p class="progressing" id="p3"></p></div>
<div class="rating" id="param3">5.0</div>

<div class="paramot">Общая оценка:</div>
<div><div id="sum_stars"></div><p id="sum_progress"></p></div>
<div id="summ">5.00</div>
<input id="el_<?=$product["id"]?>" type="submit" value="Отправить!">
<p id="message"></p>
</div>

<script >
$(document).ready(function(){
 function move(e, obj){
    var summ=0;
    var id = obj.next().attr('id').substr(1);
    var progress = e.pageX - obj.offset().left;
    var rating = progress * 5 / $('.stars').width();
    $('#param'+id).text(rating.toFixed(1));
    obj.next().width(progress);
    $('.rating').each(function(){ summ += parseFloat($(this).text()); });
    summ = summ / $('.rating').length;
    $('#sum_progress').width(Math.round($('.stars').width() * summ / 5));
    $('#summ').text(summ.toFixed(2));
 }
 $('#rating .stars').click(function(e){
    $(this).toggleClass('fixed');
    move(e, $(this));
 });
 $('#rating .stars').on('mousemove', function(e){
    if ($(this).hasClass('fixed')==false) move(e, $(this));
 });
 $('#rating [type=submit]').click(function(){
    summ = parseFloat($('#summ').text());
    jQuery.post('<?php
if (is_numeric($_POST["obj_id"])) $obj=$_POST["obj_id"];
else $obj='';
if ($_POST["rating"]>=0 and $_POST["rating"]<=5) $ocenka=$_POST["rating"];
else $ocenka='';
if ($ocenka!='' and $obj>0) {
 $time=$_SERVER['REQUEST_TIME'];
 $ip=$_SERVER['REMOTE_ADDR'];
 $db=mysqli_connect(HOST, USER, PASSWORD, NAME_BD) or die();
 $res=mysqli_query($db,"DELETE FROM votes WHERE date<".($time-604800));
 $res=mysqli_query($db,"SELECT count(id) FROM votes WHERE id_product=".$obj." and ip=INET_ATON('".$ip."')");
 $number=mysqli_fetch_array($res);
 if ($number[0]==0) {
    $res=mysqli_query($db,"INSERT INTO votes (date,id_product,ip,rating) values (".$time.",".$obj.",INET_ATON('".$ip."'),".$ocenka.")");
    $res=mysqli_query($db,"UPDATE ".NAME_BD." SET points=(points+".$ocenka."), votes=(votes+1) WHERE id=".$obj." LIMIT 1");
    echo 'Спасибо, Ваш голос учтен!';
 }
 else echo 'Вы уже сегодня голосовали!';
}
?>', {  obj_id: $(this).attr('id').substr(3),
        rating: summ }, notice);
 });
 function notice(){
	$('#message').fadeOut(500, function(){ $(this).text('Спасибо, Ваш голос учтен'); }).fadeIn(1000).fadeOut(2000);
 }
});
</script>