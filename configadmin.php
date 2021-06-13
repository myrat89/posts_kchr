<?php include "connect_db.php"; 

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<link rel="shortcut icon" href="/images/favicon.svg" type="image/x-icon" />	
	<meta name="robots" content="noindex, nofollow"/>
	<meta charset="utf-8">
	<title>Настройки базы данных</title>
	<style type="text/css">
		.href_home{
			position: fixed;
		}
	
		img{
			width:80px;
			height:80px;
		}
		h1{
			text-align: center;
			font-family: georgia;
			margin-bottom: 2px;
		}
		p{
			margin:8px 0px;
			font-size: 20px;

		}
		.conteiber_post{
			width:700px;
			height: 120px;
			border:1px solid #555;
			position: relative;
			left:50%;
			margin-left: -350px;
			margin-top: 6px;
			padding:5px;
			color:green;
			overflow: hidden;
			transition:height 0.75s;
			background-color: #007FBE; /**/
			color:#fff;
		}
		.box_img{
			width:120px;
			height:120px;
			position: relative;
			float: left;
			display: inline-block;
			margin-right: 10px;
		}
		.img{
			width:100%;
			height:100%;
			object-fit: cover;
		}
		.button_delete{
			position: absolute;
			left:568px;
			top:82px;
			padding:10px 27px;
			cursor: pointer;
			border:none;
			border-radius: 30px;
			background-size: 100% 100%;
			box-shadow: 1px 1px 4px #000;
			outline:none;	
			background:linear-gradient(red, #000);
			color:#fff;

		}
		.button_delete:hover {
			text-decoration: underline;			
		}
		
		.par{
			position: relative;
			
		}
		#text_sharsh{
			width:705px;
			height:34px;
			outline: none;
			position:relative;
			left:50%;
			margin-left:-350.5px;
		}
		#but_sharsh{
			height:40px;
			padding:0px 13px;
			position: relative;
			left:50%;
			font-size: 16px;
			cursor: pointer;
			top:1px;
		}
		.confg_buts{
			position:absolute;
			height:35px;
			padding:0px 13px;
			left:436px;
			top:81.5px;
			cursor: pointer;
			border:none;
			border-radius: 30px;
			background-size: 100% 100%;
			box-shadow: 1px 3px 4px #000;
			outline:none;
			background:linear-gradient(#73A3FC, #CDF8FD);
		}
		.confg_buts:hover {
			text-decoration: underline;
		}
		form{
			margin-top: 50px;
		}
		.textMesseg{
			display: block;
			width:582px;
			height:103px;
			outline: none;
			margin-top:5px;
			background-color: #f2f0f0;
		}
		.inpText{
			width:286px;
			height:30px;
			outline: none;
			background-color: #f2f0f0;
			border-width: 1px;
		}
		.messages_ahref{
			position: relative;
			text-decoration: none;
			font-size: 22px;
			display: block;
			text-align: center;
			left: 379px;
   			display: inline-block;
		}
		.messages_ahref:hover{
			text-decoration: underline;
		}
		.sroll{
			display: inline-block;
			position: fixed;
			top:150px; left:200px;
		}
		p:nth-of-type(2) { /*запомнить*/
  			top:170px;
		}
		p:nth-of-type(3) { /*запомнить*/
  			top:190px;
		}
		p:nth-of-type(4) { /*запомнить*/
  			top:210px;
		}
		.login_password_file{
		    position:relative;
		    left:401px;
		}
		.inp_password{
			position: relative;
			left:387px;
			width: 202px;
			height:20px;
			border:none;
			outline: none;
			border-bottom: 1px solid #888;
			top:-5px;
		}
		.info_baner{
			width:180px;
			height:40px;
			display: inline-block;
			position:relative;
			background-color: #111;
			border-radius: 4px;
			left: 190px;
			top:-35px;
			color:#fff; text-align: center;
			z-index: 1;
		}
		.info_baner::after{
			content: "";
			position:absolute;
			left: 20px; bottom: -20px;
			border: 10px solid transparent;
			border-top: 10px solid #111;

		}
	</style>
</head>
<body>
<a href="https://kchrpost.ru" class="href_home"><img src="/images/250px-Coat_of_Arms_of_Karachay-Cherkessia.svg.svg" title="Перейти на главную"></a>
			<p class="sroll"></p>
			<p class="sroll"></p>
			<p class="sroll"></p>
			<p class="sroll"></p>

		<h1>Панель управления Администратора</h1>
			<a href="user_message.php" class="messages_ahref">Просмотреть отзывы и предложения от пользователей</a>
			<a href="" class="login_password_file">Скачать фаил</a>
			<p class='par'><input type="text" id="text_sharsh" placeholder="Поиск по id"> <button id='but_sharsh'>Найти</button></p>		
				<?php
					$fils = $conn->query("SELECT * FROM `public` ORDER BY id DESC LIMIT 10");
					foreach ($fils as $public) {
						$imgHome = $public['img1'];
						$userName = $public['User_name'];
						$hederText = $public['heading'];
						$id = $public['id'];
						$message = $public['Text_messages'];
						
								echo "<div class='conteiber_post'>
											<div class='box_img'><img src='$imgHome' class='img'></div>
													<p class='hederText'>$hederText</p>
													<p class='id'> id $id</p>
													<p class='name'>$userName</p>
														<form action='config.php' method='post'>
															<input type='hidden' name='id' value='$id'>
																<input type='text' name='NameConfig' placeholder='Изменить имя' class='inpText'>
																<input type='text' name='HederConfig' placeholder='Изменить заголовок' class='inpText'>
																<textarea name='messageConfig' placeholder='Изменить текст сообщения' class='textMesseg'></textarea>
																<button class='confg_buts' name='but_post'>Редактировать</button>
																<input type='submit' value='Удалить' name='submit' class='button_delete' title='Удалить рекламный пост'>
														</form>

									  </div>";
					}
				?>	
		<script src="/scripts_js/adminPanel.js"></script>
		<script src="/scripts_js/load_password.js"></script>	

</body>
</html>