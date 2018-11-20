<?php
class _EnterController extends _BaseController  
{
    function __construct()	 
	{
		if($_REQUEST['login']||$_REQUEST['pass'])
		{		
			$model=new models\EnterModel;
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