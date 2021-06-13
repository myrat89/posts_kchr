<?php 
include "connect_db.php";
	$fils = $conn->query("SELECT * FROM `public` ");
	foreach ($fils as $public) {
		$id = $public['id'];
		echo "<p class='id_post'>$id</p>";
	}	
