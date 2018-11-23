<?php
class controllers_enterController extends controllers_baseController  
{
    function __construct()	 
	{
		if($_REQUEST['login']||$_REQUEST['pass'])
		{		
			$model=new models_enterModel;
			$resultValid=$model->ValidData($_REQUEST['login'],$_REQUEST['pass']);
			$this->unVisibleForm=$resultValid['unVisibleForm'];
			$this->userName=$resultValid['login'];
			$this->msg=$resultValid['msg'];
			$this->login=$resultValid['login'];
			$this->pass=$resultValid['pass'];			
			if($_REQUEST['location']) header('Location: '.$_REQUEST['location']);
		}
		else 
		{
			if($_SESSION["Auth"]) $this->unVisibleForm=true;	
			if($_REQUEST['out']=="1")
			{
			$_SESSION["Auth"]=false;
			$_SESSION["User"]="";
			$_SESSION["role"]="";
			$this->unVisibleForm=false;	
			}
		}
	}		 
}