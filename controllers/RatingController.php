<?php
class _RatingController extends _BaseController  
{  
    function __construct()	 
	{				
		$this->dislpay_form = true; 
			if(isset($_REQUEST["send"]))
			{ 
				$rating = new models\RatingModel;	
				$error=$rating->isValidData($_REQUEST); 
				if($error)$this->error=$error; 
				else
				{			
					$rating->sendMail();
					header('Location: /rating?thanks=1');
					exit;
				}
			}			
			if(isset($_REQUEST["thanks"]))
			{
					$this->message="<div class='wrapper' style='clear:left;'><h2>Спасибо, ваше сообщение отправленно!</h2></div>";
					$this->dislpay_form = false;
			}
	}	
}