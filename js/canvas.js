//JAVASCRIPT USANDO O PADRÃO ES6:


/* Início função EventListener "data-command"
---------------------------------------------------------------- */
// Capturando todos os elementos com o atributo "data-command" e adicionando neles um evento de "click"
document.querySelectorAll("[data-command]").forEach(
	item => {
		item.addEventListener("click", e =>{
			console.log(item.getAttribute("data-command"));
		});
	}
);
/* Fim função EventListener "data-command"
---------------------------------------------------------------- */

/* Início função EventListener "data-tool"
---------------------------------------------------------------- */
// Capturando todos os elementos com o atributo "data-tool" e adicionando neles um evento de "click"
document.querySelectorAll("[data-tool]").forEach(
	item => {
		item.addEventListener("click", e => {
			//Elemento recebe a classe estilizada ".active" no "click"
			document.querySelector("[data-tool].active").classList.toggle("active");
			item.classList.toggle("active");

		});
	}	
);
/* Fim função EventListener "data-tool"
---------------------------------------------------------------- */

/* Início função EventListener "data-line-width"
---------------------------------------------------------------- */
document.querySelectorAll("[data-line-width]").forEach(
	item => {
		item.addEventListener("click", e => {
			document.querySelector("[data-line-width].active").classList.toggle("active");
			item.classList.toggle("active");	
		});
	}
);
/* Fim função EventListener "data-line-width"
---------------------------------------------------------------- */

/* Início função EventListener "data-brush-width"
---------------------------------------------------------------- */
document.querySelectorAll("[data-brush-width]").forEach(
	item => {
		item.addEventListener("click", e => {
			document.querySelector("[data-brush-width].active").classList.toggle("active");
			item.classList.toggle("active");	
		});
	}
);
/* Fim função EventListener "data-brush-width"
---------------------------------------------------------------- */

/* Início função EventListener "data-color"
---------------------------------------------------------------- */
document.querySelectorAll("[data-color]").forEach(
	item => {
		item.addEventListener("click", e => {
			document.querySelector("[data-color].active").classList.toggle("active");
			item.classList.toggle("active");	
		});
	}
);
/* Fim função EventListener "data-color"
---------------------------------------------------------------- */




