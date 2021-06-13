			
			// запрос №2
			let arr = document.createElement("div"); arr.id = "wrapper"; 
			let reqs = new XMLHttpRequest();
			reqs.open('POST', '/posts.php', true);
			reqs.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
			reqs.send(); // отправка данных на сервер			
			reqs.addEventListener("readystatechange", function() {
				if (reqs.status === 200) {
					if (reqs.readyState === 4) {		
						arr.innerHTML = reqs.response;
					}
				}
			});


			/*===========================================*/
			let startpost = 10;
			let chethik = 10;
			const con_post = document.getElementsByClassName("conteiber_post")[startpost - 1]; //контенера
			let scriolls = document.getElementsByClassName("sroll");
			let postLength = document.getElementsByClassName("conteiber_post").length;
			window.addEventListener("scroll", function() {
			let scrollHeight = document.documentElement.scrollHeight;
			let clientHeight = document.documentElement.clientHeight;						
			let result = scrollHeight - clientHeight; 
				scriolls[1].innerHTML = result;
				scriolls[2].innerHTML = this.pageYOffset;
				scriolls[3].innerHTML = document.getElementsByClassName("conteiber_post").length;		
				if (this.pageYOffset === result) {
					setTimeout(configPanel, 100); // запускаем функцию с интервалом 
					setTimeout(dynamicSharse, 100); // запускаем функцию с интервалом 
					let posts = "startpost=" + startpost + "&chethik=" + chethik; // погтовка к отправке данных на сервер
					let request = new XMLHttpRequest();
					request.open('POST', '/obrabotchik.php', true); 
   					request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
					request.send(posts); // отправка данных на сервер
					request.addEventListener("readystatechange", function() {
						if(request.readyState === 4) {
							if (request.status === 200) {
								if (postLength !== arr.children.length) {
									document.getElementsByTagName("script")[0].insertAdjacentHTML("beforeBegin", request.response); // встовляем данные в конец страницы
									startpost = startpost + postLength;
											
								}
								else {
									return false;
								}	
							}
						}   
							
		
					});	

				}
//document.documentElement.getBoundingClientRect().bottom < document.documentElement.clientHeight
			});
	function dynamicSharse() {		
			const conteiners = document.querySelectorAll(".conteiber_post");
			const inp_sharshe = document.getElementById("text_sharsh");
			const button_sharshe = document.getElementById("but_sharsh");

				function sharshe() {  
					for(let i = 0; i < conteiners.length; i++) {				
						const ids = conteiners[i].childNodes[9][0];

						if (inp_sharshe.value.trim() !== ids.value) {
							ids.parentNode.parentNode.style.display = "none";
						}
					}
				}	

				button_sharshe.addEventListener("click", function() {
				if (inp_sharshe.value === "") {
				  	alert("Поле поиска пустое ведите значения id в поле поиска, и повторите попытку");
				  	return false;
				}	
				
				sharshe(); // вызов функции
				
				});

				inp_sharshe.addEventListener("input", function() {
					for(let i = 0; i < conteiners.length; i++) {
						conteiners[i].style.display = "block";
					}
				})
				inp_sharshe.addEventListener("keydown", function(event) {
					if (event.code === "Enter" || event.code === "NumpadEnter") {
						sharshe();	
					}
					
				});

	}	
	
	dynamicSharse(); // вызов главной функции

		// кнопка редактирования
		function configPanel() {
			const conteiner_Post = document.getElementsByClassName("conteiber_post");
				const button_config = document.getElementsByClassName("confg_buts");
				const formss = document.getElementsByTagName("form"); // массив форм
					for(let i = 0; i < button_config.length; i++) {
						button_config[i].addEventListener("click", function(event) {
						if (this.innerHTML === "Редактировать") {
							event.preventDefault();
							for(let y = 0; y < conteiner_Post.length; y++) {
								if (y !== i) {
									continue;
								}
								conteiner_Post[y].style.height = "320px";
								this.innerHTML = "Сохранить изменения";
								this.style.left = "400px";
							}											
						}	
						
					  });				
	
					}
		}				
		configPanel(); // немедленый запуск функции
	// passwor_user
	
			let but_href_password = document.getElementsByClassName("login_password_file")[0];
			const info_baner = document.createElement("div"); info_baner.className = "info_baner";
			const inp_password = document.createElement("input"); inp_password.type = "password";
			const href_load = document.createElement("a"); href_load.href = "login_password.rar";
			 href_load.className = "login_password_file"; href_load.innerHTML = "Скачать фаил";
			inp_password.className = "inp_password"; inp_password.placeholder = "Ведите пароль и нажмите Enter";
				but_href_password.addEventListener("click", function(e) {
					if (this.href !== "login_password.rar") {
						e.preventDefault();
						this.replaceWith(inp_password);
							if (inp_password) {
							inp_password.addEventListener("input", function() {
								this.style.borderColor = "";
								if (document.getElementsByClassName("info_baner")[0]) {
									document.body.removeChild(info_baner);
								}
							});
								inp_password.addEventListener("keydown", function(e) {	
									if (e.code === "Enter") {
										if (this.value === "") {
											info_baner.innerHTML = "Ведите пароль";
											info_baner.style.lineHeight = "40px";
											info_baner.style.top = "-42px";
											this.after(info_baner); // встовляем											
											return false;
										}

										else if (this.value === "1989010507Km") {
											this.replaceWith(href_load);
										}
										else {
											this.style.borderColor = "red";
											info_baner.innerHTML = "Вы вели неправильный пароль";
											info_baner.style.lineHeight = "";
											info_baner.style.top = "-35px";
											this.after(info_baner); // встовляем

										}
									}
								});

							}

					}
				});
	
							
// Cache-Control: max-age=31536000