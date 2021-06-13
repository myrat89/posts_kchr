<?php include "connectbase.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="robots" content="noindex, nofollow"/>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Adding comments to the site</title>
</head>
<body>
<div class="wrappers">
	<label><p class="navigation"><input type="radio" class="rad" value="left" name="position" checked>Left</p></label>
	<label><p class="navigation"><input type="radio" class="rad" value="center" name="position">Center</p></label>
	<label><p class="navigation"><input type="radio" class="rad" value="right" name="position">Оn right</p></label>
	<h2 class="headline_text">Add comment</h2>
		<div class="conteiner_comment_form">
			<div class="nav_name">
				<p class="text_user">Name</p>
				<p class="text_user" id="child1">Surname</p>
			</div>
			<form action="savecomments.php" method="post">
				<input type="text" name="username" class="textname"  required maxlength="35">
				<input type="text" name="firstname" class="textname"  required maxlength="35">
				<h3 class="heder_comment_text">Comment</h3>
				<textarea class="text_message" name="comment_message" required></textarea>
				<input type="submit" name="post_comment" class="post_comment" value="add comments">
			</form>

		</div>
		<h2>Comments(<span id="number_box"></span>):</h2>
			<?php include "output_comments.php"; ?>
</div>			
	<script src="commentjs.js"></script>
</body>
</html>