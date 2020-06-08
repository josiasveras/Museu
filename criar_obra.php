<?php    
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<html>
    <head>

        <meta charset="UTF-8">

        <!-- Estilo customizado canvas -->
        <link rel="stylesheet" type="text/css" href="css/estilo_canvas.css">
    
        <!-- JS canvas -->
        <script src="js/canvas.js" type="module" defer="/script"></script>

        <title>Museu SENAC</title>

    </head>
    <body>
        
                <!-- Início nav -->
                
                    <header>
                        <nav>
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="./visualizar_obras.php">Exposições</a></li>
                            </ul>
                        </nav>
                    </header>
                
                <!-- Fim nav -->
       
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
            <div class="group linewidths for-shapes" style="display: block;">
                <div class="item active" data-line-width="1" title="1 Pixel">
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
            <div class="group linewidths for-brush" style="display: none;">
                <div class="item active" data-brush-size="4" title="4 Pixel">
                    <div class="linewidth" style="width: 4px; height: 4px;"></div>
                </div>
                <div class="item" data-brush-size="6" title="6 Pixel">
                    <div class="linewidth" style="width: 6px; height: 6px;"></div>
                </div>
                <div class="item" data-brush-size="8" title="8 Pixel">
                    <div class="linewidth" style="width: 8px; height: 8px;"></div>
                </div>
                <div class="item" data-brush-size="10" title="10 Pixel">
                    <div class="linewidth" style="width: 10px; height: 10px;"></div>
                </div>
                <div class="item" data-brush-size="12" title="12 Pixel">
                    <div class="linewidth" style="width: 12px; height: 12px;"></div>
                </div>                    
            </div>
        </div>
        <!-- Fim toolbox left -->

        <canvas id="canvas" width="800" height="600"></canvas>

        <!-- Início toolbox right -->
        <div class="toolbox right">
            <div class="group swatches">
                <div class="item" data-color="#ffffff">
                    <div class="swatch" style="background-color: #ffffff;"></div>
                </div>
                <div class="item active" data-color="#000000">
                    <div class="swatch" style="background-color: #000000;"></div>
                </div>
                <div class="item" data-color="#ff0000">
                    <div class="swatch" style="background-color: #ff0000;"></div>
                </div>
                <div class="item" data-color="#00ff00">
                    <div class="swatch" style="background-color: #00ff00;"></div>
                </div>
                <div class="item" data-color="#0000ff">
                    <div class="swatch" style="background-color: #0000ff;"></div>
                </div>
                <div class="item" data-color="00ffff">
                    <div class="swatch" style="background-color: #00ffff;"></div>
                </div>
                <div class="item" data-color="#ff00ff">
                    <div class="swatch" style="background-color: #ff00ff;"></div>
                </div>
                <div class="item" data-color="#ffff00">
                    <div class="swatch" style="background-color: #ffff00;"></div>
                </div>
                <div class="item" data-color="#c46f0f">
                    <div class="swatch" style="background-color: #c46f0f;"></div>
                </div>
                <div class="item" data-color="#fd8f27">
                    <div class="swatch" style="background-color: #fd8f27;"></div>
                </div>
                <div class="item" data-color="#0099ff">
                    <div class="swatch" style="background-color: #0099ff;"></div>
                </div>
                <div class="item" data-color="#ff009d">
                    <div class="swatch" style="background-color: #ff009d;"></div>
                </div>
            </div>
        </div>
        <!-- Início toolbox right -->

    </body>
</html>