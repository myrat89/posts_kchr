<?php
include "connect_db.php"; // подключаем базу
$id = $_POST['id'];       // получаем id с input type hidden
	if (isset($_POST['submit'])) {
		$conn->query("DELETE FROM `public` WHERE id = $id");
		$files = __DIR__. '/ADD_advertisement/'. $id. '.php';
		unlink($files); // так же удаляем сам файил 
				echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
				exit();

	}
		if (isset($_POST['but_post'])) {
			$name = $_POST['NameConfig'];
			$heder = $_POST['HederConfig'];
			$message = $_POST['messageConfig'];
				if ($name !== "" && $heder !== "" && $message !== "") {
					$configs = $conn->query("UPDATE `public` SET `User_name` = '$name', `heading` = '$heder', `Text_messages` = '$message' WHERE id = $id");
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
				}
				if ($name !== "" && $heder !== "") {
					$configs = $conn->query("UPDATE `public` SET `User_name` = '$name', `heading` = '$heder' WHERE id = $id");
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
				}
				if ($name !== "" && $message !== "") {
					$configs = $conn->query("UPDATE `public` SET `User_name` = '$name', `Text_messages` = '$message' WHERE id = $id");
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
				}
				if ($heder !== "" && $message !== "") {
					$configs = $conn->query("UPDATE `public` SET `heading` = '$heder', `Text_messages` = '$message' WHERE id = $id");
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
				}
				if ($name !== "") {
					$configs = $conn->query("UPDATE `public` SET `User_name` = '$name' WHERE id = $id");
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
				}
				if ($heder !== "") {
					$configs = $conn->query("UPDATE `public` SET `heading` = '$heder' WHERE id = $id");
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
				}
				if ($message !== "") {
					$configs = $conn->query("UPDATE `public` SET `Text_messages` = '$message' WHERE id = $id");
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
				}
				else {
					echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';
					exit();
					
				}
				

		}
	
	

			//$configs = $conn->query("UPDATE `public` SET `User_name` = '$name', `heading` = '$heder', `Text_messages` = '$message' WHERE id = $id");
			//echo '<meta http-equiv = "Refresh" content = "0; URL = configadmin.php">';


?>