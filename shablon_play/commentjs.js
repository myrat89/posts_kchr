// скрипт подсчет количество комментариев 

const span_numbers = document.getElementById("number_box"); 
const total_comments = document.getElementsByClassName("conteiner_comments");
function addcomments() {
	span_numbers.innerHTML = total_comments.length; // добовляем количество комментариев
}

addcomments(); // вызываем функцию

/*=======================================================================*/
// работа с radio 

const conteinerwrappers = document.getElementsByClassName("wrappers")[0];
const radios = document.getElementsByClassName("rad");
for (let i = 0; i < radios.length; i++) {
	radios[i].addEventListener("change", function() {
		if (this.value === "left") {
			conteinerwrappers.style.marginLeft = "";
			conteinerwrappers.style.left = "1%";
		}
		if (this.value === "center") {
			conteinerwrappers.style.left = "50%";
			conteinerwrappers.style.marginLeft = "-340px";
		}	
		if (this.value === "right") {
			conteinerwrappers.style.marginLeft = "-680px";
			conteinerwrappers.style.left = "100%";
		}		


	});
	

	}

	
//radios.removeAttribute("checked");
//dataset.chakeds
//data-position="false"