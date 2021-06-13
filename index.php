<!DOCTYPE html>
<html lang="ru">
<head>
	<link href="/styles/mystyle.css" rel="stylesheet">
	<meta name = "description" content = "Подать объявления в Карачаево-Черкесской Республики, сельскохозяйственные животные" />
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="/images/favicon.svg" type="image/svg+xml" />	
	<title>Бесплатная доска самых свежих объявлений в Карачаево-Черкесской Республике КЧР</title>
    <meta name="google-site-verification" content="kUms7_B-nfX-FJcWlNZK76A9ZcN7bpIdzzKpJ2WPcqo" />
    <meta name="yandex-verification" content="b98e45aeca01ff6a" />
</head>
<body>
		<div class="wrapper_home">	
			<?php
				include "conteiner_reclam_left.php"; // левый рекламный блок
				include "conteiner_reclam_rigth.php"; // правый рекламный блок
				include "heder_home.php"; // подключаем вангешний шаблон заголовка 1
				include "enterAllDB.php"; // вывод содержимого из базы данных 2 
			?>

		</div>
	</div>					
</div>
			<?php include "futer.php" ?>	
   	<script src="/scripts_js/jqre.js"></script>
	<script src="/scripts_js/jquery.maskedinput.js"></script>
	<script src="/scripts_js/detect.js"></script>
    <script src="/scripts_js/script_reclam.js"></script>
   	<script src="/scripts_js/AJAX.js"></script> 
	<script>
		jQuery(function($){
		$("#id_telefon").mask("+7 (999) 999-99-99");
		});	
	</script>

</body>
</html>