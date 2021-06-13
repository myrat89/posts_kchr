<?php include "connectbase.php"; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="robots" content="noindex, nofollow"/>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Добавления коментариев на сайт</title>
</head>
<body>
<div class="wrappers">
	<label><p class="navigation"><input type="radio" class="rad" value="left" name="position" checked>Слева</p></label>
	<label><p class="navigation"><input type="radio" class="rad" value="center" name="position">По центру</p></label>
	<label><p class="navigation"><input type="radio" class="rad" value="right" name="position">Справа</p></label>
	<h2 class="headline_text">Добавить коменатрий</h2>
		<div class="conteiner_comment_form">
			<div class="nav_name">
				<p class="text_user">Имя</p>
				<p class="text_user" id="child1">Фамилия</p>
			</div>
			<form action="savecomments.php" method="post">
				<input type="text" name="username" class="textname"  required maxlength="35">
				<input type="text" name="firstname" class="textname"  required maxlength="35">
				<h3 class="heder_comment_text">Комментарий</h3>
				<textarea class="text_message" name="comment_message" required></textarea>
				<input type="submit" name="post_comment" class="post_comment" value="Отправить комментарий">
			</form>

		</div>
		<h2>Комментарии(<span id="number_box"></span>):</h2>
			<?php include "output_comments.php"; ?>
</div>			
	<script src="commentjs.js"></script>
</body>
</html>