<!DOCTYPE html>
<html lang="pt-br">

<html>
    <head>

        <meta charset="UTF-8">

        <!-- Estilo customizado canvas -->
        <link rel="stylesheet" type="text/css" href="css/estilo_canvas.css">

        <title>Museu SENAC</title>

    </head>
    <body>
        
        <!-- Início toolbox left -->
        <div class="toolbox left">
            <div class="group commands">
                <div class="item" data-command="undo" title="Undo">
                    <img src="img/undo-icon.png">
                </div>
                <div class="item" data-command="download" title="Download">
                    <img src="img/download-icon.png">
                </div>               
            </div>
            <div class="group shapes">
                <div class="item active" data-tool="line" title="Line Tool">
                    <img src="img/line-icon.png">
                </div>
                <div class="item" data-tool="rectangle" title="Rectangle">
                    <img src="img/rect-icon.png">
                </div>
                <div class="item" data-tool="circle" title="Circle">
                    <img src="img/circle-icon.png">
                </div>
                <div class="item" data-tool="triangle" title="Triangle">
                    <img src="img/triangle-icon.png">
                </div>                    
            </div>
            <div class="group tools">
                <div class="item" data-tool="pencil" title="Pencil Tool">
                    <img src="img/pencil-icon.png">
                </div>
                <div class="item" data-tool="brush" title="Brush Tool">
                    <img src="img/brush-icon.png">
                </div>
                <div class="item" data-tool="paint-bucket" title="Paint Bucket">
                    <img src="img/paint-bucket-icon.png">
                </div>
                <div class="item" data-tool="eraser" title="Eraser">
                    <img src="img/eraser-icon.png">
                </div>
            </div>
            <div class="group linewidths">
                <div class="item" data-line-width="1" title="1 Pixel">
                    <div class="linewidth" style="width: 1px; height: 1px;"></div>
                </div>
                <div class="item" data-line-width="2" title="2 Pixel">
                    <div class="linewidth" style="width: 2px; height: 2px;"></div>
                </div>
                <div class="item" data-line-width="3" title="3 Pixel">
                    <div class="linewidth" style="width: 3px; height: 3px;"></div>
                </div>
                <div class="item" data-line-width="4" title="4 Pixel">
                    <div class="linewidth" style="width: 4px; height: 4px;"></div>
                </div>
                <div class="item" data-line-width="5" title="5 Pixel">
                    <div class="linewidth" style="width: 5px; height: 5px;"></div>
                </div>                    
            </div>
        </div>
        <!-- Fim toolbox left -->

        <canvas id="canvas" width="640" height="480"></canvas>

        <!-- Início toolbox right -->
        <div class="toolbox right">
            <div class="group swatches">
                            
            </div>
        </div>
        <!-- Início toolbox right -->

    </body>
</html>