<?php

    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: login.php");
        exit;
    }else{
        $id = $_SESSION['id_usuario'];
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
        
        <?php 

            $dadosUsuario = $user->selectUserById($id);

            if (isset($_POST['nome'])) {
                //Recebendo o que o usuário digita nos inputs
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                //$senha = addslashes($_POST['senha']);
                $idade = addslashes($_POST['idade']);

                //Verificando se os campos não estão vazios
                if (!empty($nome) && !empty($email) && !empty($idade)) {
                      
                    $user->updateUser($id, $nome, $email, $idade);
                    header("Refresh:0");

                }else{

                    echo '<div class="alert alert-danger"" role="alert"> Preencha todos os campos! </div>';

                }

            }

        ?>

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

                <br><br><br><br>
                <!-- Início containerForm -->
                <div class="containerForm">
      
                    <h2 style="text-align:center;">Perfil público</h2>
                    <h3 style="text-align:center;">Informações sobre você</h3>

                    <form method="POST">

                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $dadosUsuario['nome_usuario']; ?>">
                      
                        <label for="email">Endereço de email</label>
                        <input type="email" id="email" name="email" value="<?php echo $dadosUsuario['email']; ?>">
                      
                      
                        <label for="dtNasc">Idade</label>
                        <input type="number" maxlength="3" id="idade" name="idade" value="<?php echo $dadosUsuario['idade']; ?>">
                       
                        <input type="submit" value="Salvar">
                    </form>
                    
                </div>
                <!-- Fim containerForm -->

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