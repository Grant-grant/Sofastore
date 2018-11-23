<?php
 class models_feedbackModel extends models_dateBaseModel   
 {	  
		private $fio;
		private $email;
		private $theme;
		private $message;	
		
		function isValidData($array_data)
		{
			if(!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $array_data['email']))
			{ 
			  $error="<span style='margin-left:60px; color:red;'>E-mail не существует!</span>";	
			} 
			elseif(!trim($array_data['message']))
			{ 
			  $error="<span style='margin-left:60px; color:red;'>Введите текст сообщения!</span>";	
			}
			if($error)return $error;
			else
			{
				$this->fio=trim($array_data['fio']);
				$this->email=trim($array_data['email']);
				$this->theme=trim($array_data['theme']);
				$this->message=trim($array_data['message']);
				return false;
			}     
		}
		
		function sendMail()
		{
			$tfio = $this->fio;		
			$to_user  = $this->email; 
			$to_admin = 'Sofastore@mail.ru';
			$subject = 'Сообщение с формы обратной связи';
			$message = $this->message;
			$headers  = 'MIME-Version: 1.0'."\r\n";
			$headers .= 'Content-type: text/html;'."\r\n";
			$headers .= 'From: Sofastore.ru'.$this->theme."\r\n";		
			$array=array("name"=>$this->fio, "email"=>$this->email,	"theme"=>$this->theme, "message"=>$this->message,);		
			mail($tfio, $to_admin, $to_user, $subject, $message, $headers);	
			parent::build_query("INSERT INTO `feedback` SET",$array);	
		}	
} 