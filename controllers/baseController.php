<?php
  class controllers_baseController  {
     private $member; 		
     function __set($name,$val)	 {	     
	     $this->member[$name] = $val;
     }
     function __get($name) 	 {
		  return $this->member;	
     }  		 
 }