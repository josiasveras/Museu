
<?php 

    require_once "./class-php/user.class.php";
    $user = new User("museu", "localhost", "root", "");

    if (isset($_GET['id']) && !empty($_GET['id']))
    {
        $id = addslashes($_GET['id']);
    }else{
        header('location: visualizar_obras.php');
    }

    $dadosObra = $user->buscarObraPorId($id);
    $imagemObra = $user->buscarImagemObraPorId($id);
    //var_dump($imagemObra);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Museu SENAC</title>
        <?php require "./head.php"; ?>

    </head>

    <body>

                    <!-- Início botão logado/não logado -->
                    <?php

                        session_start();  
                        
                        if(!isset($_SESSION['id_usuario'])){
                                                   
                    ?>
                                <div class="dropdown">
                                    <button class="dropbtn">Não Logado</button>
                                    <div class="dropdown-content">
                                        <a href="login.php">Login</a>
                                        <a href="cadastro_usuario.php">Inscrever-se</a>
                                    </div>
                                </div>
                    <?php
                        }else{

                            /*session_start();*/

                            echo'<div class="dropdown">
                                    <button class="dropbtn">Logado</button>
                                    <div class="dropdown-content">
                                        <a href="perfil_usuario.php">Perfil</a>
                                        <a href="logout.php">Sair</a>
                                    </div>
                                </div>';

                        } 
                    ?>
                    <!-- Fim botão logado/não logado -->

        <!-- Início container -->
        <div id="container">

            <!-- Início header -->
            <header>
                <div id="logo">
                    <h1><a href="">MuSenac</a></h1>
                </div>

                <!-- Início nav -->
                <nav>
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./visualizar_obras.php">Exposições</a></li>
                        <li><a href="./criar_obra.php">Criar obra</a></li>
                    </ul>
                </nav>
                <!-- Fim nav -->

            </header>
            <!-- Fim header -->

            <!-- Início principal -->
            <div id="principal">
                
                 <br><br><br><br><br><br>
                <div class="card">
                    <img src="./img-obras/<?php echo $imagemObra['nome_imagem']; ?>" alt="Card image" style="width:100%">
                    <div class="container">
                        <h4><?php echo $dadosObra['nome_obra']; ?></h4> 
                        <p><?php echo $dadosObra['descricao']; ?></p>
                        <footer>
                            <small>
                                Por <cite title="Source Title">Autor</cite>
                            </small>
                        </footer>
                    </div>
                </div>
                
                <br><br><br><br><br><br>

                <footer>
                    <p>
                        <a href="#">Home</a>
                        <a href="#">Exposições</a>
                        <a href="#">Contatos</a>
                    </p>
                    <p>
                        2020 <a href="#">Museu SENAC</a> - Todos os direitos reservados.
                    </p>
                </footer>

            </div>
            <!-- Fim principal -->

        </div>
        <!-- Fim container -->
        
    </body>
</html>