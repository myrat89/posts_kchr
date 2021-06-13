<?php include "connect_db.php" ?>
<div class="conteiner_futer">
		<div class="box_forms_futer">
			<form id="form_futer" method="post">
				<p class="text_forms_futer">Отзывы и предложения</p>
					<input type="text" name="User_name" id="User_name" placeholder="Имя" required>
					<input type="text" name="User_Email" id="User_Email" placeholder="E-mail" required>
					<textarea name="User_message" id="User_message" placeholder="сдесь вы можете оставить свои отзывы и предложения, а также пожелания по улучшению данного сервиса" required></textarea>
					<input type="submit" name="submits" value="Отправить" id="submits">
			</form>
		</div>
</div>		
	<?php
		if (isset($_POST['submits'])) {
			$messages = $_POST['User_message'];
			$username = $_POST['User_name'];
			$email = $_POST['User_Email'];
			$data = date("d-m-Y в G:i:s");
				$mess = "INSERT INTO `usermessage`(`name`, `email`, `messages`, `data`) VALUES ('$username', '$email', '$messages', '$data')";

					if (mysqli_query($conn, $mess)) { // проверяем все ли правильно добавилось
				 	   echo '<script>';
							echo 'alert("Ваше сообщение получено администрацией, спасибо за ваш отклик мы обязательно рассмотрим ваш отзыв ");';
						echo '</script>';
					}

					else {
						  echo "Error: " . $mess . "<br>" . mysqli_error($conn);
					}
		}
	?>