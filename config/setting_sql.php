<?php
 define('HOST', 'localhost'); 		
 define('USER', 'root'); 			
 define('PASSWORD', 'j79ago43'); 			
 define('NAME_BD', 'Sofastore');		
 $connect = mysqli_connect(HOST, USER, PASSWORD, NAME_BD)or die("Невозможно установить соединение c базой данных".mysqli_error($connect));
	mysqli_query($connect,'SET names "utf8"');  