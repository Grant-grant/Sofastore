<?php

interface Spec 
{
    public function accept(Operation $operation);
}

interface Operation 
{
    public function visiter(loadimage $load);
}

class loadimage implements Spec 
{
	function execute()
	{
		$path = "../uploads/";
		$valid_formats = array("jpg", "png", "gif", "bmp");	
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(!empty($_FILES['photoimg']))
			{
				$file_array=$_FILES['photoimg'];
			}			
			if(empty($_FILES['photoimg']))
			{
				$file_array=$_FILES['edit_photoimg'];
			}			
			$name = $file_array['name'];
			$size = $file_array['size'];			
				
			if(strlen($name))
			{
				list($txt, $ext) = explode(".", $name);
				if(in_array($ext,$valid_formats))
				{
					if($size<(1024*1024))
					{
						$actual_image_name = str_replace(" ", "_", $txt).".".$ext;
						$tmp = $file_array['tmp_name'];
						if(move_uploaded_file($tmp, $path.$actual_image_name))
						{
							echo "<img src='".$path.$actual_image_name."' width='100'; height='100' class='preview'>";
						}
						else
						{	
							echo "Не удалось загрузить изображение";
						}
					}
					else
					{
						echo "Размер изображения больше 1 МБ";
					}			
				}
				else
				{
					echo "Формат изображения не поддерживается";
				}	
			}
			else
			{
				echo "Пожалуйста выберите файл";
			}	
			exit;
		}
	}
	public function accept(Operation $operation)
    {
        $operation->visiter($this);
    }
}

class Visit implements Operation
{
    public function visiter(loadimage $load)
    {
        $load->execute();
    }    
}

$load = new loadimage();
$visit = new Visit();

$load->accept($visit);