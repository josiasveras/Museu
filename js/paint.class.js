import Point from './point.model.js';

import {TOOL_LINE, TOOL_RECTANGLE, TOOL_CIRCLE, TOOL_TRIANGLE, TOOL_PAINT_BUCKET, TOOL_PENCIL, TOOL_BRUSH, TOOL_ERASER} from './tool.js';

import { getMouseCoordsOnCanvas, findDistance } from  './utility.js';

import Fill from './fill.class.js';

export default class Paint{

	constructor(canvasId){

		this.canvas = document.getElementById(canvasId);
		this.context = canvas.getContext("2d");

		this.undoStack = [];
		this.undoLimit = 3;
	}

	set activeTool(tool){
		this.tool = tool;
	}

	set lineWidth(linewidth){
		this._lineWidth = linewidth;
		this.context.lineWidth = this._lineWidth;
	}

	set brushSize(brushsize){
		this._brushSize = brushsize;
	}

	set selectedColor(color){
		this.color = color;
		this.context.strokeStyle = this.color;
	}

	init(){
		this.canvas.onmousedown = e => this.onMouseDown(e);
	}

	//Função com a lógica para utilizar as ferramentas clicando o mouse
	onMouseDown(e){

		this.savedData = this.context.getImageData(0, 0, this.canvas.clientWidth, this.canvas.height);

		if (this.undoStack.length >= this.undoLimit) this.undoStack.shift();
		this.undoStack.push(this.savedData);

		this.canvas.onmousemove = e => this.onMouseMove(e);
		document.onmouseup = e => this.onMouseUp(e);

		this.starPos = getMouseCoordsOnCanvas(e, this.canvas);

		if (this.tool == TOOL_PENCIL || this.tool == TOOL_BRUSH){
			this.context.beginPath();
			this.context.moveTo(this.starPos.x, this.starPos.y);
		
		}else if(this.tool == TOOL_PAINT_BUCKET){
			new Fill(this.canvas, this.starPos, this.color);
			//new Fill(this.canvas, Math.round(this.starPos.x), Math.round(this.starPos.y), this.color);
		}else if (this.tool == TOOL_ERASER) {
			this.context.clearRect(this.starPos.x, this.starPos.y, this._brushSize, this._brushSize);	
		}

	}

	//Função com a lógica para utilizar as ferramentas movimentando o mouse
	onMouseMove(e){
		this.currentPos = getMouseCoordsOnCanvas(e, this.canvas);
		
		switch(this.tool){
			case TOOL_LINE:
			case TOOL_RECTANGLE:
			case TOOL_CIRCLE:
			case TOOL_TRIANGLE:
				this.drawShape();
				break;

			case TOOL_PENCIL:
				this.drawFreeLine(this._lineWidth);
				break;

			case TOOL_BRUSH:
				this.drawFreeLine(this._brushSize);
				break;
			case TOOL_ERASER:
				this.context.clearRect(this.currentPos.x, this.currentPos.y, this._brushSize, this._brushSize);
			default:
				break;
		}
	}

	onMouseUp(e){
		this.canvas.onmousemove = null;
		document.onmouseup = null;
	}

	//Função com a lógica para desenhar as formas geométricas
	drawShape(){

		this.context.putImageData(this.savedData, 0, 0);

		this.context.beginPath();

		if (this.tool == TOOL_LINE){

			this.context.moveTo(this.starPos.x, this.starPos.y);
			this.context.lineTo(this.currentPos.x, this.currentPos.y);

		}else if(this.tool == TOOL_RECTANGLE){

			this.context.rect(this.starPos.x, this.starPos.y, this.currentPos.x - this.starPos.x, this.currentPos.y - this.starPos.y);

		}else if(this.tool == TOOL_CIRCLE){

			let distance = findDistance(this.starPos, this.currentPos);
			this.context.arc(this.starPos.x, this.starPos.y, distance, 0, 2 * Math.PI, false);

		}else if(this.tool == TOOL_TRIANGLE){

			this.context.moveTo(this.starPos.x + (this.currentPos.x - this.starPos.x) / 2, this.starPos.y);
			this.context.lineTo(this.starPos.x, this.currentPos.y);
			this.context.lineTo(this.currentPos.x, this.currentPos.y);
			this.context.closePath();

		}

		this.context.stroke();	

	}

	//Função com a lógica para desenhar a linha
	drawFreeLine(lineWidth){
		this.context.lineWidth = lineWidth;
		this.context.lineTo(this.currentPos.x, this.currentPos.y);	
		this.context.stroke();
	}

	//Função com a lógica para implementar a ferramenta de desfazer a ação
	undoPaint(){
		if (this.undoStack.length > 0) {
			this.context.putImageData(this.undoStack[this.undoStack.length - 1], 0, 0);
			this.undoStack.pop();
		}else{
			alert("Não é mais possível desfazer a ação!");	
		}
	}

}