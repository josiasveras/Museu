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

                <br><br><br><br><br><br>
                <div class="container">

                    <div class="row">

                      <?php  

                        $dadosObra = $user->buscarObras();

                        if (empty($dadosObra)) 
                        {

                          echo '<div class="alert alert-danger"" role="alert"> Ainda não há obras cadastradas! </div>';

                        }else
                        {

                          foreach ($dadosObra as $value) 
                          {
                      ?>
                            <div class="col-md-4">
                              <div class="thumbnail">
                                <a href="visualizar_obra_perfil.php?id=<?php echo $value['id_obra']; ?>">
                                  <img src="./img-obras/<?php echo $value['foto_obra']; ?>" style="width:100%">
                                  <div class="caption">
                                    <p><?php echo $value['nome_obra']; ?></p>
                                  </div>
                                </a>
                              </div>
                            </div>
                      <?php
                          }                        
                        }
                      ?>
                    </div>
                </div>

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