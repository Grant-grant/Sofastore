<?php
namespace models;

class EnterModel extends DateBaseModel
{	 
	  function ValidData($login,$pass)	  
	  {
	    $sql = parent::query("SELECT * FROM `user` WHERE login='%s' and pass='".md5(md5($pass))."'",$login,$pass);
	    if( parent::num_rows($sql))    
		{ 
			$row=parent::fetch_assoc($sql);
			$_SESSION["Auth"]=true;  
			$_SESSION["User"]=$login;  
			$_SESSION["role"]=$row["role"];  
		} 
		else $_SESSION["Auth"]=false;  

		if (!$_SESSION["Auth"])
		{
			$msg="<div align='center'><em class='wrapper'><span style='color:red'>Данные введены не верно!</span></em></div>";
		}	
		else 
		{
			$msg="<div align='center'><em class='wrapper'><span style='color:green'>Вы верно ввели данные!</span></em></div>";
			$unVisibleForm=true;
		}		
		$result=array("unVisibleForm"=>$unVisibleForm,
						"userName"=>$login,
						"msg"=>$msg,
						"login"=>$login,
						"pass"=>$pass,);
		return $result;		
	  }
} 