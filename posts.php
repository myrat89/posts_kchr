<?php
			include 'connect_db.php'; // подключаем внешний фаил базы данных 2

					$query = $conn->query("SELECT * FROM `public` ORDER BY id DESC"); // вывод из тоблицы в обратном порядке
					while($row = $query->fetch_assoc()){		
						$id = $row['id'];
						
						echo "<p class='conteiner_href'>id=$id</p>";
				
					}
				
/* <ifModule mod_expires.c>

 ExpiresActive On
 #кэшировать флэш и изображения на одну неделю
 ExpiresByType image/x-icon "access plus 7 days"
 ExpiresByType image/jpeg "access plus 7 days"
 ExpiresByType image/png "access plus 7 days"
 ExpiresByType image/gif "access plus 7 days"
 ExpiresByType application/x-shockwave-flash "access plus 7 days"
 #кэшировать css, javascript и текстовые файлы на одну неделю
 ExpiresByType text/css "access plus 1 days"
 ExpiresByType text/javascript "access plus 1 days"
 ExpiresByType application/javascript "access plus 1 days"
 ExpiresByType application/x-javascript "access plus 1 days"
 #кэшировать html и htm файлы на один день
 ExpiresByType text/html "access plus 120 minutes"
 #кэшировать xml файлы на десять минут
 ExpiresByType application/xhtml+xml "access plus 10 minutes"
</ifModule>
cache-control:public

*/