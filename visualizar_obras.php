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

<!-- Início modal -->
        <!-- Trigger/Open The Modal 
<button id="myBtn">Open Modal</button>-->
<div class="dropdown">
    <button id="myBtn" class="dropbtn">Expor obra</button>
            <!-- <div class="dropdown-content">
                <a href="salvar_imagem.php">Expor obra</a>
                <a href="cadastro_usuario.php">Nova obra</a>
            </div> -->
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">

            <span class="close">&times;</span>

            <form method="POST" enctype="multipart/form-data" style="height: 100%">
                <div class="form-group">
                    <label for="nomeObra">Nome da obra</label>
                    <input type="text" class="form-control" id="nome-obra" name="nomeObra">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição da obra</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="btnImg">Selecione a imagem</label>
                    <input type="file" class="form-control-file" id="foto-obra" name="fotoObra[]">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>

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