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
			$to_admin = 'grand-sofa@mail.ru';
			$subject = 'Сообщение с формы обратной связи grandsofa.ru';
			$message = "<b>ФИО: </b>".$this->fio."</br>";
			$message .= "<b>e-mail: </b>".$this->email."</br>";
			$message .= "<b>Тема: </b>".$this->theme."</br>";
			$message .= "<b>Сообщение: </b>".$this->message."</br>";
			$headers  = 'MIME-Version: 1.0'."\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
			$headers .= 'From: grandsofa.ru'.$this->theme."\r\n";		
			$array=array("name"=>$this->fio, "email"=>$this->email,	"theme"=>$this->theme, "message"=>$this->message,);		
			mail($to_admin, $subject, $message, $headers);	
			parent::build_query("INSERT INTO `feedback` SET",$array);	
		}	
} 
