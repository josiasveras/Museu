import { getMouseCoordsOnCanvas, findDistance } from  './utility.js';

import Point from "./point.model.js";

//Implementação da lógica de preenchimento de cores da ferramenta balde de tinta usando o Flood fill algorithm. 
export default class Fill{

	constructor(canvas, point, color){
		this.context = canvas.getContext("2d");

		this.imageData = this.context.getImageData(0, 0, this.context.canvas.width, this.context.canvas.height);

		const targetColor = this.getPixel(point);

		//console.log(targetColor);

		const fillColor = this.hexToRgba(color);

		this.fillStack = [];

		this.floodFill(point, targetColor, fillColor);

		this.fillColor();

	}

	//Função com a lógica do Flood fill algorithm usado para preencher as formas com a ferramenta balde de tinta
	floodFill(point, targetColor, fillColor){
		if(this.colorsMatch(targetColor, fillColor)) return;

		const currentColor = this.getPixel(point);

		if(this.colorsMatch(currentColor, targetColor)){
			this.setPixel(point, fillColor);

			this.fillStack.push([new Point(point.x + 1, point.y), targetColor, fillColor]);
			this.fillStack.push([new Point(point.x - 1, point.y), targetColor, fillColor]);
			this.fillStack.push([new Point(point.x, point.y + 1), targetColor, fillColor]);
			this.fillStack.push([new Point(point.x, point.y - 1), targetColor, fillColor]);

		}
	}

	//Função com a lógica do Flood fill algorithm usado para preencher as formas com a ferramenta balde de tinta
	fillColor(){
		if (this.fillStack.length){

			let range = this.fillStack.length;

			for (let i = 0; i < range; i++){
				this.floodFill(this.fillStack[i][0], this.fillStack[i][1], this.fillStack[i][2]);
			}

			this.fillStack.splice(0, range);

			this.fillColor();

		}else{
			this.context.putImageData(this.imageData, 0, 0);
			this.fillStack = [];
		}
	}

	/*getPixel(point){
		//Possível origem do bug no "//console.log(targetColor); undefined"
		if(point.x < 0 || point.y < 0 || point.x >= this.imageData.width, point.y >= this.imageData.height){
			return [-1, -1, -1, -1]; //Cor impossível
		}else{
			const offset = (point.y * this.imageData.width + point.x) * 4;

			return
			[
				this.imageData.data[offset + 0], //vermelho
				this.imageData.data[offset + 1], //verde
				this.imageData.data[offset + 2], //azul
				this.imageData.data[offset + 3] //alfa
			];
		}

	}*/

	//Função com a lógica do Flood fill algorithm usado para preencher as formas com a ferramenta balde de tinta
	getPixel(point) {
        
        if (point.x < 0 || point.y < 0 || point.x >= this.imageData.width || point.y >= this.imageData.height) {
            return [-1, -1, -1, -1];  //Cor impossível
        } else {
            
            const offset = (point.y * this.imageData.width + point.x) * 4;

            return [this.imageData.data[offset + 0], //vermelho
            this.imageData.data[offset + 1], //verde
            this.imageData.data[offset + 2], //azul
            this.imageData.data[offset + 3] //alfa
            ]
        }
    }

    //Função com a lógica do Flood fill algorithm usado para preencher as formas com a ferramenta balde de tinta
	setPixel(point, fillColor){
		const offset = (point.y * this.imageData.width + point.x) * 4;
		
		this.imageData.data[offset + 0 ]	= fillColor[0]; // vermelho
		this.imageData.data[offset + 1 ]	= fillColor[1]; // verde
		this.imageData.data[offset + 2 ]	= fillColor[2]; // azul
		this.imageData.data[offset + 3 ]	= fillColor[3]; // alfa
	}

	//Função com a lógica do Flood fill algorithm usado para preencher as formas com a ferramenta balde de tinta
	colorsMatch(color1, color2){
		return color1[0] === color2[0] && color1[1] === color2[1]
			   && color1[2] === color2[2] && color1[3] === color2[3];
	}

	//Função com a lógica do Flood fill algorithm usado para preencher as formas com a ferramenta balde de tinta
	hexToRgba(hex){
		var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
		return[
			parseInt(result[1], 16),
			parseInt(result[2], 16),
			parseInt(result[3], 16),
			255
		];
	}

}