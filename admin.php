<?php include "connect_db.php" ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="robots" content="noindex, nofollow"/>
	<meta charset="utf-8">
	<title>Автиризация Администратора</title>
		<style>
			.conteiner_forms{
				width:450px;
				height:200px;
				position: relative;
				left:20px;
				background: #FFFFFF;
				display: inline-block;
			}	
			.box_text{
				display: block;
				width:90%;
				height:41px;
				position: relative;
				left:50%;
				margin-left:-207px;
				margin-top: 20px;
				border-radius: 30px;
				background-color: #F0F0F0;
				border:none;
				outline: none;
				padding-left: 20px;
				font-size: larger;
			}
			#boxid{
				background-color:#E0E0E0;
			}
			#buts{
				position: relative;
				left:343px;
				top:19px;
				padding:15px 27px;
				border:none;
				background:linear-gradient(#00B4F0, #00B4EC);
				border-radius: 30px;
				color:#93FFFF;
				cursor: pointer;
				font-size: 17px;
				outline: none;
				transition: color 0.5s;
			}
			#buts:hover{
				color:#fff;
			}
			.errortext{
				color:red;
			}
		</style>
</head>
<body>
	
	<h1>Автарицация администратора сайта</h1>
		<div class="conteiner_forms">	
			<form action="" method="post">
				<input type="text" name="User_name" placeholder="Login" required class="box_text">
				<input type="password" name="password" placeholder="Password" required class="box_text" id="boxid">
				<input type="submit" value="Войти" id="buts" name="but">
			</form>
<?php
			if (isset($_POST['but'])) {	
				$login = $_POST['User_name'];
				$password = $_POST['password'];
					$admins = $conn->query("SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password'");
					if (mysqli_num_rows($admins) > 0) {
						echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
						exit();
					}
					else {
						echo "<p class='errortext'>Невырный логин или пароль</p>";
					}
					
				
			}
			
				//echo '<meta http-equiv = "Refresh" content = "0; URL ='. 'configadmin'. '.php'. '">';

?>
		</div>
</body>
</html>