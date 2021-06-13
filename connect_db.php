<?php

//подключаемся

	$servername = 'localhost';
	$database = 'db_reclam';
	$username = 'root';
	$password = 'root';

	// Устанавливаем соединение
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Проверяем соединение
	if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
	}

?>