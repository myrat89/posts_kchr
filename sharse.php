<?php include "connect_db.php";  ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="/images/favicon.svg" type="image/svg+xml" />
	<link href="/styles/mystyle.css" rel="stylesheet">
	<meta name="robots" content="noindex, nofollow"/>	
	<title>результат запросу <?php echo $_POST['text_search']; ?></title>
</head>
<body>
  <div class="wrapper_home">	
	<?php 
	include "conteiner_reclam_left.php"; // левый рекламный блок
	include "conteiner_reclam_rigth.php"; // правый рекламный блок
	include "heder_home.php";  // подключаем вангешний шаблон заголовка 1 ?>
		<h3 class="text_info">Результат поиска по запросу: <span class="text_sharses"><?php echo $_POST['text_search']; ?></span></h3>
		<p class="postsAll">Найдено страниц <span class="total_post">0</span></p>
			<?php
				$text_sharses = $_POST['text_search'];
				$text_sharses = trim($text_sharses);
				$conn_sharse = $conn->query("SELECT * FROM `public` WHERE `heading` LIKE '%$text_sharses%' ");
					foreach ($conn_sharse as $select) {
						$id = $select['id'];
						$Heder_text = $select['heading'];
						$imgHome = $select['img1'];
						$price = $select['maney'];
						$User_name = $select['User_name'];
						$data = $select['data'];
						$regions = $select['regions'];

						$div_href = "<div class='conteiner_href'>
								<div class='post_conteiner_img'>
									<img src='$imgHome' class='img_post'>
								</div>
								<p class='heder_text_post'><a href='/ADD_advertisement/$id.php' class='href_posts' title='$Heder_text'>$Heder_text</a></p>
								<p class='price_post'>$price &#8381</p>
								<p class='user_name_post'>$User_name</p>
								<p class='regions_post'>Карачаево-Черкесская Республика $regions</p>
								<p class='data_post'>Дата $data</p>
							
							</div>";

							echo $div_href;

					}
			?>
	<?php include "futer.php"; ?>
</div>
	<script src="/scripts_js/jqre.js"></script>
	<script src="/scripts_js/jquery.maskedinput.js"></script>
	<script src="/scripts_js/detect.js"></script>
	<script src="/scripts_js/script_reclam.js"></script>
	
		<script>
			const conteinr_futer = document.getElementsByClassName("conteiner_futer")[0];
			const HederConteiner = document.getElementsByClassName("wrapper_heder_html")[0];
				HederConteiner.after(conteinr_futer); // вставка футера после всех дивов
				
			jQuery(function($){
				$("#id_telefon").mask("+7 (999) 999-99-99");
			});	

		</script>
</body>
</html>