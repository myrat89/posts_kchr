<?php
			include 'connect_db.php'; // подключаем внешний фаил базы данных 2

					$query = $conn->query("SELECT * FROM `public` ORDER BY id DESC LIMIT 5"); // вывод из тоблицы в обратном порядке
					while($row = $query->fetch_assoc()){		
						$User_name = $row['User_name'];
						$Heder_text = $row['heading'];
						$messages = $row['Text_messages'];
						$img1 = $row['img1'];
						$price = $row['maney'];
						$data = $row['data'];
						$id = $row['id'];
						$regions = $row['regions'];

				$div_href = "<div class='conteiner_href'>
								<div class='post_conteiner_img'>
									<a href='/ADD_advertisement/$id.php' title='$Heder_text'><img src='$img1' class='img_post'></a>
								</div>
								<p class='heder_text_post'><a href='/ADD_advertisement/$id.php' class='href_posts' title='$Heder_text'>$Heder_text</a></p>
								<p class='price_post'>$price &#8381;</p>
								<p class='user_name_post'>$User_name</p>
								<p class='regions_post'>Карачаево-Черкесская Республика $regions</p>
								<p class='data_post'>Дата $data</p>
							
							</div>";

							echo $div_href;
				
					}
	// $query = $conn->query("SELECT * FROM `public`WHERE `moderation_karabash` = '1' ORDER BY id DESC LIMIT 5")
				
?>

