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

                                echo '<!-- Trigger/Open The Modal 
                                        <button id="myBtn">Open Modal</button>-->
                                        <div class="btnExpObraCont">
                                        <button id="myBtn" class="btnExpObra">Expor obra</button>
                                     </div>';

                        } 
                    ?>
                    <!-- Fim botão logado/não logado -->

<!-- Início modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

            <span class="close">&times;</span>

        <div class="containerForm">
          <form method="POST" enctype="multipart/form-data">

            <label for="nomeObra">Nome da obra</label>
            <input type="text" id="nome-obra" name="nomeObra">

            <label for="descricao">Descrição da obra</label>
            <textarea id="descricao" name="descricao" style="height:200px"></textarea>

            <label for="btnImg">Selecione a imagem</label>
            <input type="file" id="foto-obra" name="fotoObra[]">

            <input type="submit" value="Salvar">

          </form>
        </div>


        <?php

            if (isset($_POST['nomeObra'])) 
            {

                $nome_obra = addslashes($_POST['nomeObra']);
                $descricao = addslashes($_POST['descricao']);
                //$fotoObra = addslashes($_POST['fotoObra']);
                $fotos = array();

                if (isset($_FILES['fotoObra'])) 
                {
                    for ($i=0; $i < count($_FILES['fotoObra']['name']); $i++) 
                    { 
                        //Salvando as imagens na pasta img-obras
                        $nome_arquivo = md5($_FILES['fotoObra']['name'][$i].rand(1,99)).'.png';
                        move_uploaded_file($_FILES['fotoObra']['tmp_name'][$i], 'img-obras/'.$nome_arquivo);
                        //Salvar dados para enviar ao banco
                        array_push($fotos, $nome_arquivo);
                    }
                }

                //Verificando se foi preenchido todos os campos 
                if (!empty($nome_obra) && !empty($descricao) && !empty($fotos))
                {

                    $user->salvarObra($nome_obra, $descricao, $fotos);
                    echo '<div class="alert alert-success" role="alert"> Obra cadastrada com sucesso! </div>';

                }else{

                    echo '<div class="alert alert-danger" role="alert"> Preencha todos os campos! </div>';


                }   
            }

        ?>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<!-- Fim modal -->


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
                <div class="container">

                    <div class="row">

                      <?php  

                        $dadosObra = $user->buscarObras();

                        if (empty($dadosObra)) 
                        {

                          echo '<div class="alert alert-danger"" role="alert"> Ainda não há obras cadastradas! </div>';

                        }else
                        {

                            echo '<div class="grid-container">';

                          foreach ($dadosObra as $value) 
                          {
                      ?>
                            
                              <div class="grid-item">
                                <a href="visualizar_obra_perfil.php?id=<?php echo $value['id_obra']; ?>">
                                  <img src="./img-obras/<?php echo $value['foto_obra']; ?>" style="width:100%">
                                  <div class="caption">
                                    <p><?php echo $value['nome_obra']; ?></p>
                                  </div>
                                </a>
                              </div>
                      <?php
                          }  

                          echo '</div>';

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