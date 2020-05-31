import Point from './point.model.js';

//Função para pegar as coordenadas do mouse no elemento canvas
export function getMouseCoordsOnCanvas(e, canvas){
	//Retornando o tamanho do elemento "canvas" com o valor das propriedades: "left, top, right, bottom, x, y, width, height"
	let rect = canvas.getBoundingClientRect();
	let x = e.clientX - rect.left;
	let y = e.clientY - rect.top;
	return new Point(x, y);//Retornando a instância da classe "Point" para facilitar a reutilização da mesma
}

//Função para calcular a distância entre as coodenadas X e Y utilizando a fórmula de distância d=√((x_2-x_1)²+(y_2-y_1)²
export function findDistance(coord1, coord2){
	
	let exp1 = Math.pow(coord2.x - coord1.x, 2);
	let exp2 = Math.pow(coord2.y - coord1.y, 2);

	let distance = Math.sqrt(exp1 + exp2);

	return distance;

}