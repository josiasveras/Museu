//JAVASCRIPT USANDO O PADRÃO ES6:

import {TOOL_LINE, TOOL_RECTANGLE, TOOL_CIRCLE, TOOL_TRIANGLE, TOOL_PAINT_BUCKET, TOOL_PENCIL, TOOL_BRUSH, TOOL_ERASER} from './tool.js';
import Paint from './paint.class.js';

var paint = new Paint("canvas");
paint.activeTool = TOOL_LINE;
paint.lineWidth = 1;
paint.brushSize = 4;
paint.selectedColor = "#000000";
paint.init();

/* Início função EventListener "data-command"
---------------------------------------------------------------- */
// Capturando todos os elementos com o atributo "data-command" e adicionando neles um evento de "click"
document.querySelectorAll("[data-command]").forEach(
	item => {
		item.addEventListener("click", e =>{

			let command = item.getAttribute("data-command");

			if (command === 'undo') {
				paint.undoPaint();
			//Lógica para salvar o desenho no canvas como imagem
			}else if(command === 'download'){
				var canvas = document.getElementById("canvas");
				var image = canvas.toDataURL("image/png", 1.0).replace("image/png", "image/octet-stream");
				var link = document.createElement("a");
				link.download = "obra.png";
				link.href = image;
				link.click();

			}

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
			paint.activeTool = selectedTool;

			switch (selectedTool) {
				case TOOL_LINE:
				case TOOL_RECTANGLE:
				case TOOL_CIRCLE:
				case TOOL_TRIANGLE:
				case TOOL_PENCIL:
					//Tornar visível o conteúdo das classes "group linewidths for-shapes"
					document.querySelector(".group.for-shapes").style.display = "block";
					//Tornar invísivel o conteúdo das classes "group linewidths for-brush"
					document.querySelector(".group.for-brush").style.display = "none";
					break;

				case TOOL_BRUSH:
				case TOOL_ERASER:
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

			let linewidth = item.getAttribute("data-line-width");
			paint.lineWidth = linewidth;
		});
	}
);
/* Fim função EventListener "data-line-width"
---------------------------------------------------------------- */

/* Início função EventListener "data-brush-size"
---------------------------------------------------------------- */
document.querySelectorAll("[data-brush-size]").forEach(
	item => {
		item.addEventListener("click", e => {
			document.querySelector("[data-brush-size].active").classList.toggle("active");
			item.classList.toggle("active");

			let brushSize = item.getAttribute("data-brush-size");
			paint.brushSize = brushSize;
		});
	}
);
/* Fim função EventListener "data-brush-size"
---------------------------------------------------------------- */

/* Início função EventListener "data-color"
---------------------------------------------------------------- */
document.querySelectorAll("[data-color]").forEach(
	item => {
		item.addEventListener("click", e => {
			document.querySelector("[data-color].active").classList.toggle("active");
			item.classList.toggle("active");

			let color = item.getAttribute("data-color");

			paint.selectedColor = color;
		});
	}
);
/* Fim função EventListener "data-color"
---------------------------------------------------------------- */




