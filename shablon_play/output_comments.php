<?php
include "connectbase.php";
 $output_comments = $conn->query("SELECT * FROM `comments` WHERE `moderat` = '1' ORDER BY id DESC"); 
 foreach ($output_comments as $select) {
 	$id = $select['id'];
 	$User_name = htmlspecialchars($select['User_name']);
 	$First_name = htmlspecialchars($select['First_name']);
 	$messages = htmlspecialchars($select['messages']);
 	$data = htmlspecialchars($select['data']);
 	echo "<div class='conteiner_comments'><p class='box_text_names'><span class='span_names'>$User_name $First_name</span></p><p class='box_text_messages'>$messages</p><p class='box_data'>$data</p></div>";
 }
