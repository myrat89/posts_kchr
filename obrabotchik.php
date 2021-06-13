<?php
include "connect_db.php";
$start = $_POST['startpost'];
$chethik = $_POST['chethik'];
				
					$fils = $conn->query("SELECT * FROM `public` ORDER BY id DESC LIMIT {$start}, $chethik");
					foreach ($fils as $public) {
					
						$imgHome = $public['img1'];
						$userName = $public['User_name'];
						$hederText = $public['heading'];
						$id = $public['id'];
						$message = $public['Text_messages'];
						
					echo "<div class='conteiber_post'>
											<div class='box_img'><img src='$imgHome' class='img'></div>
													<p class='hederText'>$hederText</p>
													<p class='id'> id $id</p>
													<p class='name'>$userName</p>
														<form action='config.php' method='post'>
															<input type='hidden' name='id' value='$id'>
																<input type='text' name='NameConfig' placeholder='Изменить имя' class='inpText'>
																<input type='text' name='HederConfig' placeholder='Изменить заголовок' class='inpText'>
																<textarea name='messageConfig' placeholder='Изменить текст сообщения' class='textMesseg'></textarea>
																<button class='confg_buts' name='but_post'>Редактировать</button>
																<input type='submit' value='Удалить' name='submit' class='button_delete' title='Удалить рекламный пост'>
														</form>

									  </div>";
									 
			}	
		
