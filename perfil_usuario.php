<?php

    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }

    require "./class-php/user.class.php";
    $user = new User("museu", "localhost", "root", "");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Museu SENAC</title>
        <?php require "./head.php"; ?>
    </head>

    <body>

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
                        <li><a href="./criar_obra.php" target="_blank">Criar obra</a></li>
                    </ul>
                </nav>
                <!-- Fim nav -->

            </header>
            <!-- Fim header -->

            <!-- Início principal -->
            <div id="principal">

                <!-- Início form-wrapper -->
                <div class="form-wrapper">
      
                    <br><br><br><br><br><br>
                    <h2 style="text-align:center;">Perfil público</h2>
                    <h3 style="text-align:center;">Informações sobre você</h3>

                    <?php 

                        /*$data = $user->selectUser();

                        if (count($data) > 0) {
                                foreach ($data as $key => $value) {
                                    
                                }
                        }*/
                    ?>

                    <form>
                      <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                      </div>
                      <div class="form-group">
                        <label for="email">Endereço de email</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="dtNasc">Data de nascimento</label>
                        <input type="text" class="form-control" id="dtNasc" name="dtNasc">
                      </div>
                      <div class="form-group">
                        <label for="genero">Gênero</label>
                        <input type="text" class="form-control" id="genero" name="genero">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                    
                </div>
                <!-- Fim form-wrapper -->

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