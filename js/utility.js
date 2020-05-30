import Point from './point.model.js';

export function getMouseCoordsOnCanvas(e, canvas){
	//Retornando o tamanho do elemento "canvas" com o valor das propriedades: "left, top, right, bottom, x, y, width, height"
	let rect = canvas.getBoundingClientRect();
	let x = e.clientX - rect.left;
	let y = e.clientY - rect.top;
	return new Point(x, y);//Retornando a instância da classe "Point" para facilitar a reutilização da mesma
}