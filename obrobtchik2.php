<?php
include "connect_db.php";

$newsatrt = $_POST['startpost'];
$newsatrt2 = $_POST['startposttwo'];
	$filshome = $conn->query("SELECT * FROM `public` ORDER BY id DESC LIMIT {$newsatrt}, $newsatrt2");
	foreach ($filshome as $poblichome) {				
			$User_name = $poblichome['User_name'];
			$Heder_text = $poblichome['heading'];
			$messages = $poblichome['Text_messages'];
			$img1 = $poblichome['img1'];
			$price = $poblichome['maney'];
			$data = $poblichome['data'];
			$id = $poblichome['id'];
			$regions = $poblichome['regions'];

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

?>