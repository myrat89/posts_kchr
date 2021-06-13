	// Ajax запросы
	let arraysResopons = document.createElement("div"); arraysResopons.id = "boxchotchik";
			let ajaxPost2 = new XMLHttpRequest();
			ajaxPost2.open('POST', '/posts2.php', true);
			ajaxPost2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
			ajaxPost2.send(); // отправка данных на сервер		
			ajaxPost2.addEventListener("readystatechange", function() {
				if(ajaxPost2.status === 200) {
					if(ajaxPost2.readyState === 4) {
						arraysResopons.innerHTML = ajaxPost2.response;

					}
			}
				
		});	
	let hederStart = 5;
	let hederChotchik = 5;
	let	posts_Heder = document.getElementsByClassName("conteiner_href");	
	window.addEventListener("scroll", function() {
		let scrollHeight = document.documentElement.scrollHeight;
		let clientHeight = document.documentElement.clientHeight;						
		let result = scrollHeight - clientHeight; 
		if(result === this.pageYOffset) {
			let datasADD = "startpost=" + hederStart + "&startposttwo=" + hederChotchik;
			let ajaxPostobrabotchik = new XMLHttpRequest();
			ajaxPostobrabotchik.open('POST', '/obrobtchik2.php', true);
			ajaxPostobrabotchik.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
			ajaxPostobrabotchik.send(datasADD); // отправка данных на сервер		
			ajaxPostobrabotchik.addEventListener("readystatechange", function() {
				if (ajaxPostobrabotchik.status === 200){
					if (ajaxPostobrabotchik.readyState === 4) {
						if(arraysResopons.children.length !== posts_Heder.length) {
							document.getElementsByClassName("box_reclam_public")[0].insertAdjacentHTML("beforeEnd", ajaxPostobrabotchik.response);
							if (hederStart < arraysResopons.children.length) {
								hederStart = hederStart + 5;
								console.log(hederStart);

							}
						
						}
				
						else {
							return false;
						}	
					}

				}
			});	

		}

	});
