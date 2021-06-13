window.addEventListener("load", function() {
			// ошибка зпуска сервиса explorer
				if (navigator.userAgent.search(/MSIE/) > 0 || navigator.userAgent.search(/NET CLR /) > 0) {
					alert("Данный интернет сервис не корректно работает на браузере Internet Explorer и Edge пожалуйста воспользуйтись другим браузером, и повторите попытку");
					return false;
				}
			const brawserName = detect.parse(navigator.userAgent);
			if(brawserName.browser.family === "Edge") {
				alert("Данный интернет сервис не корректно работает на браузере Internet Explorer и Edge пожалуйста воспользуйтись другим браузером, и повторите попытку");
				return false;
			}

			const conteinerContent = document.getElementsByClassName("box_reclam_public")[0]; 
		
			// скрипт валидации формы файлов изображения	
			let forms = document.getElementById("forms_data"); // глобальный массив формы 
			let button_submit = document.getElementById("button_form"); // получаем кнопку
			const selectRegions = document.getElementsByClassName("select-css")[0];
			button_submit.addEventListener("click", valid_form);
			function valid_form(event) {
			if (document.getElementsByClassName("box_chaked")[0].dataset.chakeds === "false") {
				alert("Вы не установили галочку я не робот");
				return false;
			}
			else {
				if (selectRegions.value === "Выберите регион из списка") {
					event.preventDefault();
					alert("Выберите регион из списка и повторите попытку");
				}
				if(!document.getElementsByClassName("is")[0]) { // валидация инпута на пустое значение файла input type file
					event.preventDefault();
					alert("Добавте файлы фотографии в количестве не более 7 шт");
				} 
			}	

			}


			// скрип пердворительного вывода изображения на клиентской стороне
			let labels = document.getElementsByClassName("label_file")[0];
			let x = 0; 
			let arry_p = document.getElementsByTagName("p"); 	 // глобальный массив параграфов
			let infiles = document.getElementsByClassName("files"); // глобальная переменная files
			let span_number = document.getElementById("sp_numb"); 
			let zoom_text_error = document.createElement("p"); zoom_text_error.className = "zoom_text_error"; // пораграф ошибки	
				zoom_text_error.innerHTML = "Вы достигли максимального количество фотографий";
			let boxHome = document.getElementsByClassName("div_end_img")[0];
			// валидация формы на тип файла

			infiles[0].addEventListener("change", function() { // обработка события на input file 
				x++; // счетчик input type hidden name
				if (span_number.innerHTML == "0") {
					alert("Вы достигли максимального количество фотографий");
					let error = document.getElementsByClassName("div_img_zoom")[6]; error.after(zoom_text_error);  // втовка текста ошибки
					return false;

				}	

				
					let buton_delet = document.createElement("button"); buton_delet.className = "buton_delet"; buton_delet.innerHTML = "&#10006"; 
						buton_delet.title = "Удалить фото";
					let div_img_zoom = document.createElement("div"); div_img_zoom.className = "div_img_zoom";
					let is = document.createElement("img"); is.className = "is"; is.src = "";	
					let inp_hidden = document.createElement("input"); inp_hidden.type = "hidden"; inp_hidden.name = "image" + x; inp_hidden.value = "";
					inp_hidden.className = "inp_hidden";
					let fil_img = this.files[0];
					
					if (fil_img.size > 7242880) { // проверка на размер файла фото
						alert("Вы превысили максимально допустимый размер файла, фаил не должен превышать 6 мб");

					}

				else { // иначе добовлять фаил фото 

					if (fil_img.type == "image/png" || fil_img.type == "image/jpeg") {
						let rider = new FileReader(); 
						rider.readAsDataURL(fil_img); 
						rider.addEventListener("load", function() {
						is.src = rider.result; // встовляем в src считанный фаил изображения
							
							is.addEventListener("load", function() {				
								let xWidth = this.width;
								let yHeight = this.height; 
								let canvas = document.createElement("canvas");
								 if(xWidth > 4000) {
										xWidth = Math.round(xWidth / 4); 
										yHeight = Math.round(yHeight / 4); 
									}
									if(xWidth > 3000) {
										xWidth = Math.round(xWidth / 3); 
										yHeight = Math.round(yHeight / 3); 
									}
									if(xWidth > 2000) {
										xWidth = Math.round(xWidth / 2); 
										yHeight = Math.round(yHeight / 2); 
									}
									if(xWidth > 1500) {
										xWidth = Math.round(0.8 * xWidth); 
										yHeight = Math.round(0.8 * yHeight); 
									}
									canvas.width = xWidth;
									canvas.height = yHeight;
									ctx = canvas.getContext("2d");
			    					ctx.drawImage(is, 0, 0, canvas.width, canvas.height);
									let image = document.createElement("img");
									image.className = "is";
									image.src = canvas.toDataURL("image/jpeg", 0.7);
								div_img_zoom.prepend(image);
								div_img_zoom.append(buton_delet); // встовляем кнопку удаления
								labels.before(div_img_zoom); // встовляем div с фото на страницу
								inp_hidden.value = image.src; // встовляем в  value input type hidden значение фото
								image.after(inp_hidden); // втавка тега input hidden
								span_number.innerHTML = + span_number.innerHTML - 1;
							

							
					});

					buton_delet.addEventListener("click", function(event) { //событие удаления
							event.preventDefault();
							div_img_zoom.parentNode.removeChild(div_img_zoom);  // удаляем блок div с фото
							let DeletText = document.getElementsByClassName("zoom_text_error")[0]; // получаем параграф
							span_number.innerHTML = + span_number.innerHTML + 1; // добовляем счетчик к удалению фото
							x--; // обнуляем счетчик
							infiles[0].value = ""; // очищаем содержимое input type file для повторного получения файла
							let mass = ["image1", "image2", "image3", "image4", "image5", "image6", "image7"]; 
						let inp_hiddens = document.getElementsByClassName("inp_hidden");
							if (inp_hidden.name == "image1") { //удалено первое фото
								if (inp_hiddens[5]) {
									inp_hiddens[5].name = mass[5];
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
									inp_hiddens[0].name = mass[0];
								}
								if (inp_hiddens[4]) {
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
									inp_hiddens[0].name = mass[0];
								}
								if (inp_hiddens[3]) {
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
									inp_hiddens[0].name = mass[0];
								}
								if (inp_hiddens[2]) {
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
									inp_hiddens[0].name = mass[0];
								}
								if (inp_hiddens[1]) {
									inp_hiddens[1].name = mass[1];
									inp_hiddens[0].name = mass[0];
								}
								if (inp_hiddens[0]) {
									inp_hiddens[0].name = mass[0];
								}			
									
							}

							if (inp_hidden.name == "image2") { //удалено первое фото
								if (inp_hiddens[5]) {
									inp_hiddens[5].name = mass[5];
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
								}
								if (inp_hiddens[4]) {
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
								}
								if (inp_hiddens[3]) {
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
								}
								if (inp_hiddens[2]) {
									inp_hiddens[2].name = mass[2];
									inp_hiddens[1].name = mass[1];
								}
								if (inp_hiddens[1]) {
									inp_hiddens[1].name = mass[1];
								}

							}		

							
							if (inp_hidden.name == "image3") { //удалено первое фото
								if (inp_hiddens[5]) {
									inp_hiddens[5].name = mass[5];
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
								}
								if (inp_hiddens[4]) {
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
								}
								if (inp_hiddens[3]) {
									inp_hiddens[3].name = mass[3];
									inp_hiddens[2].name = mass[2];
								}
								if (inp_hiddens[2]) {
									inp_hiddens[2].name = mass[2];
								}
							
								
							}
							if (inp_hidden.name == "image4") { //удалено первое фото
								if (inp_hiddens[5]) {
									inp_hiddens[5].name = mass[5];
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
								}
								if (inp_hiddens[4]) {
									inp_hiddens[4].name = mass[4];
									inp_hiddens[3].name = mass[3];
								}
								if (inp_hiddens[3]) {
									inp_hiddens[3].name = mass[3];
								}		
								
							}
							if (inp_hidden.name == "image5") { //удалено первое фото
								if (inp_hiddens[5]) {
									inp_hiddens[5].name = mass[5];
									inp_hiddens[4].name = mass[4];
								}
								if (inp_hiddens[4]) {
									inp_hiddens[4].name = mass[4];
								}
								
							}

							
							if (inp_hidden.name == "image6") { //удалено первое фото
								if (inp_hiddens[5]) {
									inp_hiddens[5].name = mass[5];		
								}

							}
						
							if (DeletText) {
									boxHome.removeChild(DeletText); // удаляем текст ошибки
								}
								
					});

					
				});		

				}
				
						else {
							alert("Выбран не правильный формат файла, выберит формат файла изображения и повторите попытку");
						}	
					
			}	
				this.value = "";
			});


			// скрипт навидения мыши на изображения 

			let but_clouse = document.createElement("button"); but_clouse.id = "but_clouse"; but_clouse.innerHTML = "&#10006"; but_clouse.title = "Закрыть окно"; // кнопка закрытия окна
			let box_wrapper = document.getElementsByClassName("wrapper_heder_html")[0];  //box opacity
			let div_box_big_img = document.createElement("div"); div_box_big_img.id = "div_box_big_img"; // div img
			let imgbig = document.createElement("img"); imgbig.id = "imgbig"; imgbig.src = "";								
			let box_conteiner = document.getElementsByClassName("box_div_publik");
			let small_img = document.getElementsByClassName("img"); // получаем массив картинок
			let big_img = document.getElementsByClassName("box_end_img"); // 
			let div_img = document.getElementsByClassName("box_big_image")[0];
			let divfilter = document.getElementById("divfilter"); 
			let divim = document.createElement("img"); divim.className = "divim"; 
			
			if (divfilter) {
				divfilter.style.backgroundImage = "url(" + " ' " + small_img[0].src + " ' " + ")";		
			}

			for (let i = 0; i < small_img.length; i++) { // событие на мелких картинках
				small_img[i].addEventListener("click", fun_click_img);
				small_img[i].addEventListener("mouseover", fun_mouseover_img);
				small_img[i].addEventListener("mouseout", fun_mouseout_img);	
				
				function fun_click_img() {
					
					for (let i = 0; i < small_img.length; i++) {
						if(small_img[i].id == "border_img") {
							small_img[i].removeAttribute("id");
						}
						this.id = "border_img";
					}	

					document.getElementsByClassName("box_end_img")[0].src = this.src;
					divfilter.style.backgroundImage = "url(" + " ' " + this.src + " ' " + ")";
						
			}


				function fun_mouseover_img() {
					this.id = "border_img";
					
					
				}
				function fun_mouseout_img() {
					if (big_img.length === 0) {
						this.removeAttribute("id");
					}
				for (let i = 0; i < big_img.length; i++) {	
						if (this.src != big_img[i].src) { 
							this.removeAttribute("id");
						}
					}
				}
			}

			// скрипт checkbox

			let conteinerchak = document.getElementById("con");
			let buts_submit_form = document.getElementById("button_form");
			conteinerchak.addEventListener("click", function() {
				if (this.dataset.chakeds === "false") {
					this.style.backgroundImage = "url(/images/Checked_Checkbox-80_icon-icons.com_57358.svg)";
					buts_submit_form.style.opacity = "1";
					buts_submit_form.removeAttribute("disabled");
					this.dataset.chakeds = "true";
				}
				else {
					this.style.backgroundImage = "none";
					buts_submit_form.style.opacity = "0";
					buts_submit_form.setAttribute("disabled", "disabled");
					this.dataset.chakeds = "false";
				}


			});
				let prace = document.getElementById("id_many");  prace.addEventListener("change", function() {
						string = this.value; 
						string = string.replace(/(\d)(?=(\d{3})+(\D|$))/g, '$1 '); // вывод цифыр с раделителем на input
						this.value = string;
					
				});

	// клик мышью на картинке большого формата box_end_img (изображение на весь экран)
			let box_end_imgs = document.getElementsByClassName("box_end_img")[0]; 
			let arrayImg = []; let zet = 0;
		if (box_end_imgs)	{
			box_end_imgs.addEventListener("click", function() { // клик мышью на фото с правой стороны
			imgbig.src = this.src; 
			div_box_big_img.append(but_clouse); // вставка кнопки закрытия
			div_box_big_img.prepend(imgbig); // вставка картинки в блок div 
			document.body.prepend(div_box_big_img); // блок div с картинкою
			document.body.style.backgroundColor = "#333";
			box_wrapper.style.opacity = "0.2";
			document.body.style.overflow = "hidden";
			box_wrapper.style.pointerEvents = "none";
			document.getElementById("but_clouse").addEventListener("click", function() {
					document.body.removeAttribute("style");
					box_wrapper.removeAttribute("style");
					if (div_box_big_img) {
						div_box_big_img.parentNode.removeChild(div_box_big_img); // удаляем div с картинкой 
					}
				});
				
				document.getElementById("imgbig").addEventListener("click", function() {
				/*========================================*/
				arrayImg = small_img;
				zet++; zet%=arrayImg.length;
				this.src = arrayImg[zet].src;	
				 

				});	
			});	
								
	}							

	// скрипт счетчика количество постов в поиске 
	const total_post = document.getElementsByClassName("total_post")[0]; 
	if (total_post) {
		total_post.innerHTML = document.getElementsByClassName("conteiner_href").length;
	}


// количество водимых символов в заголовке id_text
	const box_number = document.getElementById("span_number_two"); 
	const inputText = document.getElementById("id_text");
		inputText.addEventListener("input", function(event) {
			if(event.inputType != "deleteContentBackward" && event.inputType != "deleteContentForward"){
				box_number.innerHTML--;
				if (box_number.innerHTML === "0") {
					box_number.style.color = "red";
				}
				
			}
			else {
				box_number.innerHTML++;
				box_number.style.color = "";

			}
			if (this.value == "") {
				box_number.innerHTML = "115";
			}


		});
	// тренировка
	
});