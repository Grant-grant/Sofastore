<?php
class _FeedbackController extends _BaseController  
{  
    function __construct()	 
	{				
		$this->dislpay_form = true; 
			if(isset($_REQUEST["send"]))
			{ 
				$feed_back = new models\FeedbackModel;	
				$error=$feed_back->isValidData($_REQUEST); 
				if($error)$this->error=$error; 
				else
				{			
					$feed_back->sendMail();
					header('Location: /feedback?thanks=1');
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