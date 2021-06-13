<?php
	$user_name = $_POST['text_name'];
	$heder_text = $_POST['heder_name'];
	$Telefon = $_POST['telefon'];
	$messages = $_POST['messages_public'];
	$imag1 = $_POST['image1']; // получаем изображения в переменную
	$imag2 = $_POST['image2'];
	$imag3 = $_POST['image3'];
	$imag4 = $_POST['image4'];
	$imag5 = $_POST['image5'];	
	$imag6 = $_POST['image6'];
	$imag7 = $_POST['image7'];
	$regions = $_POST['select_regions'];
	$price = $_POST['text_many'];
	$data = date("d-m-Y в G:i:s"); // получаем текущую дату и время
	//подключаемся

	include 'connect_db.php'; // подключаем внешний фаил базы данных
	
    $sql = "INSERT INTO `public`(`User_name`, `heading`, `Tel`, `Text_messages`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`, `img7`, `maney`, `data`, `regions`) VALUES ('$user_name', '$heder_text', '$Telefon', '$messages', '$imag1', '$imag2', '$imag3', '$imag4', '$imag5', '$imag6', '$imag7', '$price', '$data', '$regions')"; 
			// добовляем записи в таблицу с базой данных
    

if (mysqli_query($conn, $sql)) { // проверяем все ли правильно добавилось
    echo '<script>';
		echo 'alert("Спасибо за ваше объявление оно скоро будет добавлено на сайт после модерации");';
	echo '</script>';

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
		$query = $conn->query("SELECT * FROM `public`"); // вывод из тоблицы в обратном порядке
					while($row = $query->fetch_assoc()){		
						$User_name = $row['User_name'];
						$Heder_text = $row['heading'];
						$Telefon = $row['Tel'];
						$messages = $row['Text_messages'];
						$img1 = $row['img1'];
						$img2 = $row['img2'];
						$img3 = $row['img3'];						
						$img4 = $row['img4'];
						$img5 = $row['img5'];
						$img6 = $row['img6'];
						$img7 = $row['img7'];
						$price = $row['maney'];
						$data = $row['data'];
						$id = $row['id'];
						$regions = $row['regions'];
							$conteiner1;
							$conteiner2;
							$conteiner3;
							$conteiner4;
							$conteiner5;
							$conteiner6;
							$conteiner7;
							if(empty($img1)) {
								$conteiner1 = "";
							}
							else {
								$conteiner1 = "<div class='coneiner_box_img'><img src='$img1' class='img'></div>";
							}
							if(empty($img2)) {
								$conteiner2 = "";
							}
							else {
								$conteiner2 = "<div class='coneiner_box_img'><img src='$img2' class='img'></div>";
							}
							if(empty($img3)) {
								$conteiner3 = "";
							}
							else {
								$conteiner3 = "<div class='coneiner_box_img'><img src='$img3' class='img'></div>";
							}
							if(empty($img4)) {
								$conteiner4 = "";
							}
							else {
								$conteiner4 = "<div class='coneiner_box_img'><img src='$img4' class='img'></div>";
							}
							if(empty($img5)) {
								$conteiner5 = "";
							}
							else {
								$conteiner5 = "<div class='coneiner_box_img'><img src='$img5' class='img'></div>";
							}
							if(empty($img6)) {
								$conteiner6 = "";
							}
							else {
								$conteiner6 = "<div class='coneiner_box_img'><img src='$img6' class='img'></div>";
							}
							if(empty($img7)) {
								$conteiner7 = "";
							}
							else {
								$conteiner7 = "<div class='coneiner_box_img'><img src='$img7' class='img'></div>";
							}
					
							$div_box = "<div class='box_div_publik'>
								<div class='box_big_image'>
									<div id='divfilter'></div>
									<img class='box_end_img' src='$img1'>
								</div>
									<p id='id_number'>id $id</p>
										<div class='box_div_img_lenta'>
											$conteiner1
											$conteiner2
											$conteiner3
											$conteiner4
											$conteiner5
											$conteiner6
											$conteiner7
										</div>
											<h1 id='hedername'>$User_name</h1>
											<h2 id='tel'>$Telefon</h2>
											<h2 id='price'> Цена $price ₽</h2>
											<h2 id='heder_text'>$Heder_text</h2>
											<p id='date'>Дата публикации: $data</p>
											<p id='messages'>$messages</p>
											
										
							</div>";

							$fail = fopen(__DIR__."/ADD_advertisement/". $id. ".". "php", "w+"); // запись и чтение из файла всего один раз с перезаписью
							fwrite($fail, "<!DOCTYPE html><html lang = 'ru'>
								<head>
									<link rel='shortcut icon' href='/images/favicon.svg' type='image/svg+xml' />
									<meta name = 'description' content = '$Heder_text' />
									<meta charset='utf-8' />	
									<link href='/styles/mystyle.css' rel='stylesheet'>
									<title>$Heder_text</title>
									<style>
										.box_reclam_public{
											height:auto;
										}
										.box_div_publik{
											box-shadow:none;
										}
									</style>
								</head>
								<body>
								<div class='wrapper_home'>
									<?php
									include ('../conteiner_reclam_left.php'); 
									include ('../conteiner_reclam_rigth.php'); 
									include ('../heder_home.php'); 
									?>
									$div_box
								</div>
							</div>	
								<?php include ('../futer.php'); ?>
                                	<script src='/scripts_js/jqre.js'></script>
                                	<script src='/scripts_js/jquery.maskedinput.js'></script>
                                	<script src='/scripts_js/detect.js'></script>
                                    <script src='/scripts_js/script_reclam.js'></script>
									<script>
										jQuery(function($){
										$('#id_telefon').mask('+7 (999) 999-99-99');
										});	
									</script>

								</body>
								</html>");
						
					
							fclose($fail);
							
			
}
mysqli_close($conn);
	echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
	exit();


			

?>