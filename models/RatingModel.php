<?php
namespace models;

 class RatingModel extends DateBaseModel   
 {	  
		private $estimate;
		private $id_product;
		
		function isValidData($array_data)
		{
				$this->estimate=trim($array_data['estimate']);
				$this->id_product=trim($array_data['id_product']);
		}
		
		function sendMail()
		{
			$testimate = $this->estimate;		
			$tid_product  = $this->id_product; 
			$array=array("estimate"=>$this->estimate, "id_product"=>$this->id_product,);		
			
			parent::build_query("INSERT INTO `rating` SET",$array);	
		}	
} 