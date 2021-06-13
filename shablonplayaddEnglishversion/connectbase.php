<?php

//подключаемся

	$servername = 'localhost';
	$database = 'u995511_root';
	$username = 'u995511_root';
	$password = '8T3x0Z3x';

	// Устанавливаем соединение
	$conn = mysqli_connect($servername, $username, $password, $database);
	// Проверяем соединение
	if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
	}

?>