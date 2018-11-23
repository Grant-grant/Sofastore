<?php
require "./config.php";

interface Spec2 
{
    public function accept(Operation2 $operation);
}

interface Operation2 
{
    public function visiter(Ajaxnew $zabros);
}

Class Ajaxnew implements Spec2
{
	function zabrosf(){
		if($_REQUEST['url']=="catalog.php")
		{
			if(isset($_REQUEST['page'])){
			 $page=$_REQUEST['page']; 
			 $category_id=$_REQUEST['category_id'];
			 echo "rabotaet";
			}
			require "./section/".$_REQUEST['url'];
		} 
		else 
		{
		require "./section/".$_REQUEST['url'];
		}
	}
	public function accept(Operation2 $operation)
    {
        $operation->visiter($this);
    }
}

class Visit2 implements Operation2
{
    public function visiter(Ajaxnew $zabros)
    {
        $zabros->zabrosf();
    }    
}

$zabros = new Ajaxnew();
$visit = new Visit2();

$zabros->accept($visit);