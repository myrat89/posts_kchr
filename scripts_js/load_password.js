			
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
	