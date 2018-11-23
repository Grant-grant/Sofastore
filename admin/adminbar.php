<link rel="stylesheet" href="admin/css/bar.css" />
	<div id="admin_header">
		<div class="logo"></div>		
		<div class="menu">
			<ul>
				<li ><a href="/admin" id="look">Панель управления</a></li>
			</ul>
		</div>
		<div class="user">
			<a href="#"><?=$_SESSION["User"]?></a> (<a href="/enter?out=1">Выход</a>)
		</div>
	</div>