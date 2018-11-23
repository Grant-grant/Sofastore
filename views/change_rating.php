<?php
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
?>