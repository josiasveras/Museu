//JAVASCRIPT USANDO O PADRÃO ES6:

import Tool from './tool.class.js';


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

			let selectedTool = item.getAttribute("data-tool");

			switch (selectedTool) {
				case Tool.TOOL_LINE:
				case Tool.TOOL_RECTANGLE:
				case Tool.TOOL_CIRCLE:
				case Tool.TOOL_TRIANGLE:
				case Tool.TOOL_PENCIL:
					//Tornar visível o conteúdo das classes "group linewidths for-shapes"
					document.querySelector(".group.for-shapes").style.display = "block";
					//Tornar invísivel o conteúdo das classes "group linewidths for-brush"
					document.querySelector(".group.for-brush").style.display = "none";
					break;

				case Tool.TOOL_BRUSH:
					//Tornar visível o conteúdo das classes "group linewidths for-brush"
					document.querySelector(".group.for-brush").style.display = "block";
					//Tornar invisível o conteúdo das classes "group linewidths for-shapes"
					document.querySelector(".group.for-shapes").style.display = "none";
					break;

				default:
					//Tornar invisível ambos os conteúdos das classes "group linewidths for-shapes" e "group linewidths for-brush"
					document.querySelector(".group.for-shapes").style.display = "none";
					document.querySelector(".group.for-brush").style.display = "none";
			}

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




