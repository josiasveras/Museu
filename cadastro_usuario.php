<?php 
    
   require_once "./class-php/user.class.php";
   $user = new User("museu", "localhost", "root", "");

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
            <header class="headerPos">
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
                <br><br><br><br><br><br>
                <!-- Início form-wrapper -->
                <!-- <div class="form-wrapper">
                    <h2 style="text-align:center;">Criação de perfil público</h2>
                    <form method="POST">
                      <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                      </div>
                      <div class="form-group">
                        <label for="email">Endereço de email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Ex: caracter@caracter.dominio">
                      </div>
                      <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="6 caracteres">
                      </div>
                      <div class="form-group">
                        <label for="dtNasc">Idade</label>
                        <input type="number" maxlength="3" class="form-control" id="idade" name="idade">
                      </div> 
                      <br><br>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div> -->
                <!-- Fim form-wrapper -->

        <!-- Início containerForm -->
        <div class="containerForm">
          <h2 style="text-align:center;">Criação de perfil público</h2>  
          <form method="POST">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ex: caracter@caracter.dominio">

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="6 caracteres">

            <label for="idade">Idade</label>
            <input type="number" maxlength="3" id="idade" name="idade">

            <input type="submit" value="Enviar">

          </form>
        </div>
        <!-- Fim containerForm -->

        <?php 

            if (isset($_POST['nome'])) {
                //Recebendo o que o usuário digita nos inputs
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $idade = addslashes($_POST['idade']);

                //Verificando se os campos não estão vazios
                if (!empty($nome) && !empty($email) && !empty($senha) && !empty($idade)) {
                    
                        //Verificando se o usuário já está cadastrado
                        if (!$user->createUser($nome, $email, $senha, $idade)){
                            echo '<div class="alert alert-danger" role="alert"> Email já cadastrado! </div>'; 
                        
                        //Cadastrar
                        }else{
                            $user->createUser($nome, $email, $senha, $idade);
                        }

                }else{

                    echo '<div class="alert alert-danger"" role="alert"> Preencha todos os campos! </div>';

                }

            }

        ?>

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