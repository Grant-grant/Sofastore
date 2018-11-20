<?php
namespace models;

class RegModel extends DateBaseModel 
{	 
	  function ValidData($login,$pass)	
	  {
		$login =mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD), $login);
        $pass = mysqli_real_escape_string(mysqli_connect(HOST, USER, PASSWORD, NAME_BD), $pass);
		if  (mysqli_num_rows(mysqli_query(mysqli_connect(HOST, USER, PASSWORD, NAME_BD), "SELECT login FROM user WHERE login = '".$login."'")))
		{
		echo "<div align='center' style='color:red;position: relative;top: 350px;'><b>Такой логин уже есть в базе! Выберите пожалуйста другой</b></div>"; 
		mysqli_close(mysqli_connect(HOST, USER, PASSWORD, NAME_BD));
		}		
	    else 
		{		
		$sql = "INSERT INTO `user` (`login`,`pass`) VALUES ('".$login."','".md5(md5($pass))."')";
		mysqli_query(mysqli_connect(HOST, USER, PASSWORD, NAME_BD), $sql);
			echo "<div align='center' style='position: relative;top: 350px;'><br><b>Регистрация прошла успешно!</b><br></div>";			
			$repass	= "";
		}
	}
}