<?php 
include "connectbase.php";

if (isset($_POST['post_comment'])) {
	$username = $_POST['firstname'];
	$firstname = $_POST['username'];
	$messages = $_POST['comment_message'];
	$data = date("d.m.Y в G:i:s");

	$repiat_table = "INSERT INTO `comments`(`User_name`, `First_name`, `messages`, `data`) VALUES ('$username', '$firstname', '$messages', '$data')";


if (mysqli_query($conn, $repiat_table)) { // проверяем все ли правильно добавилось
    echo '<script>';
		echo 'alert("Спасибо за комментарий он будет добавлен на сайт после модерации");';
	echo '</script>';


} else {
      echo "Error: " . $repiat_table . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
	echo '<meta http-equiv = "Refresh" content = "0; URL = index.php">';
	exit();



}