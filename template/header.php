		<div id="header" class="wrapper">
			</br>		
			<div class="logo">
			</div>		
          <section class="box2">
			<a href="/enter"><div class="my_aut" style="float:right;">Authentication</div></a>
			<div class="smalcart">				
				<br/>				
				<?if  ($smal_cart['cart_count']>0) {?>	
				<a class=""  href='/cart'><p class="goodchek"><?=$smal_cart['cart_count']?> </p></a><b> К Оплате:</b><br><b class="PricePD-header"><?=$smal_cart['cart_price']?> руб.</b>
				
				<? }?>	
			</div>	
		</section>				
		<section class="box2">
		<div class="slideshow box-slide">
		<div class="textbrand-slide"><span>G</span>RAND<span> S</span>OFA<br> <h2 class="line2">FURNITURE<span> STORE</span></h2></div>
		<div class="skype_cl">  <a href="skype:+79999999999?call"><img src="../public/images/Scype.png"></a></div>
		</div>
		</section>
			
		<div class="menu-width"><?=$menu?></div>		
			
		</div>	
		<div  class="wrapper" id="content">
