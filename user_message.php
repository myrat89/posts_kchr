<?php include "connect_db.php" ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex, nofollow"/>
	<title>Отзывы и предложения от пользователей</title>
	<style>
		.boxComment{
			width:700px;
			min-height:200px;
			position:relative;
			left:50%;
			margin-left:-350px;
		}
		.email{
			display: inline-block;
			position: relative;
			left:188px;
			top:-28px;
			color:#fff;
			margin:0;
		}
		.nam{
			background-color: #777;
			padding:9px 3px;
			margin:0;
			color:#fff;
			margin-top: 10px;
			box-shadow: 1px 5px 14px #333;
		}
		.message{
			text-align: left;
			font-size: 17px;
			margin:0; 
		}
		.data{
			position:relative;
			margin:0;
			left:386px;
			top:-26px;
			color:#fff;
			display: inline-block;
		}
		h1{
			text-align: center;
			margin-top:0px;
		}
	</style>
</head>
<body>
	<div class="boxComment">
		<h1>Отзывы и предложения от пользователей</h1>
			<?php
				$msli = $conn->query("SELECT * FROM `usermessage`");
				foreach ($msli as $keys) {
					$name = $keys['name'];
					$Email = $keys['email'];
					$messages = $keys['messages'];
					$data = $keys['data'];
				echo "<p class='nam'>$name</p>
					<p class='email'>$Email</p>
					<p class='data'>$data</p>
					<p class='message'>$messages</p>";
				}

		?>
	</div>
</body>
</html>