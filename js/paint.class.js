import Point from './point.model.js';

import {TOOL_LINE, TOOL_RECTANGLE, TOOL_CIRCLE, TOOL_TRIANGLE, TOOL_PAINT_BUCKET, TOOL_PENCIL, TOOL_BRUSH, TOOL_ERASER} from './tool.js';

import { getMouseCoordsOnCanvas, findDistance } from  './utility.js';

export default class Paint{

	constructor(canvasId){

		this.canvas = document.getElementById(canvasId);
		this.context = canvas.getContext("2d");

	}

	set activeTool(tool){
		this.tool = tool;
	}

	init(){
		this.canvas.onmousedown = e => this.onMouseDown(e);
	}

	onMouseDown(e){

		this.savedData = this.context.getImageData(0, 0, this.canvas.clientWidth, this.canvas.height);

		this.canvas.onmousemove = e => this.onMouseMove(e);
		document.onmouseup = e => this.onMouseUp(e);

		this.starPos = getMouseCoordsOnCanvas(e, this.canvas);

		console.log(this.starPos);

	}

	onMouseMove(e){
		this.currentPos = getMouseCoordsOnCanvas(e, this.canvas);
		
		switch(this.tool){
			case TOOL_LINE:
			case TOOL_RECTANGLE:
			case TOOL_CIRCLE:
				this.drawShape();
				break;
			default:
				break;
		}
	}

	onMouseUp(e){
		this.canvas.onmousemove = null;
		document.onmouseup = null;
	}

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
		}

		this.context.stroke();	

	}

}