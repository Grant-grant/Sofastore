<?php
  class _MenuController 
  {
	protected static $instance; 
	private function __construct() 
	{		
	}	
	public static function getInstance()
	{
		if (!is_object(self::$instance))
		{
		self::$instance = new self;
		}
		return self::$instance;
	}	 
	public function  getMenu() 
	{	
	   $print="<ul>";	 

			if ($name=="Вход" && $_SESSION["User"]!="")
			{
				$print.='<li><a href="/enter">'.$_SESSION["User"].'</a> [ <a href="/enter?out=1"><span style="font-size:10px">выйти</span></a> ]</li>';
			}	
			else 
			{
				$print.='<nav>
							<ul>
								<li><a href="/index">Home</a></li>
								<li><a href="/Sofa">Диваны и кресла</a>
									<ul>
										<li><a href="/pryamyie">Прямые</a></li>
										<li><a href="/uglovyie-d">Угловые</a></li>
										<li><a href="/modulnyie">Модульные</a></li>
										<li><a href="/kresla">Кресла</a></li>
										<li><a href="/pufyi">Пуфы</a></li>
									</ul>
								</li>
								 <li><a href="/Closet">Шкафы</a>
								   <ul>
										<li><a href="/kupe">Купе</a></li>
										<li><a href="/uglovyie-sh">Угловые</a></li>
										<li><a href="/raspashnyie">Распашные</a></li>
										<li><a href="/garderobnyie">Гардеробные</a></li>
									</ul>		 
								 </li>
								 <li><a href="/Bedroom">Спальня</a>
											 <ul>
										<li><a href="/krovati">Кровати</a></li>
										<li><a href="/matrasyi">Матрасы</a></li>
										<li><a href="/prikrovatnyie_tumbyi">Прикроватные тумбы</a></li>
										<li><a href="/komodyi">Комоды</a></li>
										<li><a href="/banketki">Банкетки</a></li>
									</ul>
								 </li>
								 <li><a href="/Hall">Прихожая</a>
											 <ul>
										<li><a href="/prihojie">Прихожие</a></li>
										<li><a href="/shkafyi-kupe">Шкафы-купе</a></li>
										<li><a href="/veshalki">Вешалки</a></li>
										<li><a href="/komodyi">Комоды</a></li>
										<li><a href="/obuvnitsyi">Обувницы</a></li>
									</ul></li>
								 <li><a href="/Kitchen">Кухня</a>
											 <ul>
										<li><a href="/kuhonnyie_garnituryi">Кухонные гарнитуры</a></li>
										<li><a href="/kuhonnyie_divanyi_i_ugolki">Кухонные диваны и уголки</a></li>
										<li><a href="/stolyi_i_obedennyie_gruppyi">Столы и обеденные группы</a></li>
										<li><a href="/stulya_dlya_kuhni">Стулья для кухни</a></li>									
									</ul></li>		 
								 <li><a href="/Children">Детская</a>
									<ul>
										<li><a href="/modulnyie_detskie">Модульные детские</a></li>
										<li><a href="/detskie_krovati">Детские кровати</a></li>
										<li><a href="/detskie_divanyi">Детские диваны</a></li>
									</ul></li>
								 <li><a href="/Office">Кабинет</a>
											 <ul>
										<li><a href="/knijnyie_shkafyi_i_stellaji">Книжные шкафы и стеллажи</a></li>
										<li><a href="/stolyi_kompyuternyie">Столы компьютерные</a></li>
										<li><a href="/kompyuternyie_kresla_i_stulya">Компьютерные кресла и стулья</a></li>
										<li><a href="/ofisnyie_divanyi">Офисные диваны</a></li>
										<li><a href="/ofisnyie_kresla">Офисные кресла</a></li>
									</ul></li>
								 <li><a href="/Other">Прочее</a>
									<ul>
										<li><a href="/tovaryi_dlya_hraneniya">Товары для хранения</a></li>
										<li><a href="/sredstva_po_uhodu_za_mebelyu">Средства по уходу за мебелью</a></li>
										<li><a href="/prochee">Прочее</a></li>
									</ul></li>
								 <li><a href="/feedback">contact us</a></li>
							</ul>
					</nav>';   
		}		
	   $print.="</ul>";	
	   return  $print;	 
	}
 }
