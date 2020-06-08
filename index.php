
<!DOCTYPE html>
<html>
    <head>
        <title>Museu SENAC</title>
        <meta charset="UTF-8">

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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="visualizar_obras.php">Exposições</a></li>
                        <li><a href="criar_obra.php">Criar obra</a></li>
                    </ul>
                    
                    
                </nav>
                <!-- Fim nav -->

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

            </header>
            <!-- Fim header -->

            <!-- Início principal -->
            <div id="principal">

                <!-- Início conteudo -->
                <div id="conteudo">
                    <section id="capa">
                        <img src="img/museu.png">
                    </section>

                    <section id="postagens">

                        <article id="video">

                            <h3>Vídeo: conheça o museu</h3>
                            <iframe width="310" height="170" src="https://www.youtube.com/embed/RGUYb-hivrc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </article>

                        <article id="mapa">

                            <h3>Mapa: encontre o museu</h3>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14616.735644396385!2d-46.70927817221119!3d-23.66938020137955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5036539648d5%3A0x78501a72680ea23a!2sCentro%20Universit%C3%A1rio%20Senac%20-%20Santo%20Amaro!5e0!3m2!1spt-BR!2sbr!4v1587918626316!5m2!1spt-BR!2sbr" width="310" height="170" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                        </article>

                        <article id="exposicoes">
                            <h3>Exposições</h3>
                            <ul>
                                <li>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                </li>
                                <li>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                </li>
                                <li>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                </li>
                                <li>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                </li>
                                <li>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                </li>
                                <li>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                </li>
                                <li>
                                    <a href="#"><strong>Veja todos (65)</strong>></a>
                                </li>
                            </ul>

                        </article>

                        <article id="historia">
                            <h3>200 anos de história</h3>

                            <p>O Museu Senac tem por missão: <b><i>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non tincidunt nibh. Suspendisse gravida facilisis sem in congue. Pellentesque at nunc ligula. Praesent ac nibh egestas, ultricies dolor quis, ultricies dolor. Cras mattis augue at libero gravida tempor. Morbi interdum ac diam at malesuada. Etiam scelerisque vehicula quam, vitae convallis tortor pretium id. Fusce efficitur sapien ut massa luctus, vel commodo tellus viverra. Pellentesque fermentum orci nibh, quis gravida elit interdum a."</b></i></p>
                            <a>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non tincidunt nibh. Suspendisse gravida facilisis sem in congue. Pellentesque at nunc ligula. Praesent ac nibh egestas, ultricies dolor quis, ultricies dolor. Cras mattis augue at libero gravida tempor.</a>
                            <a href="#"><strong>Leia mais</strong></a>
                        </article>

                    </section>

                </div>
                <!-- Fim conteudo -->

                <!-- Início aside -->
                <aside>
                    <section id="depoimento">
                        <img src="img/depoimento.png">
                    </section>

                    <!-- Início visita -->
                    <!-- <section id="visita">
                        <h4>Faça uma visita</h4>
                        <form>
                            <fieldset>
                                <legend>Selecione uma data</legend>

                                <label for="data">Data</label>
                                <input class="campo" type="text" id="data" value="dd/mm/aaaa">

                                <label for="qtd">Qtd pessoas</label>
                                <input class="campo" style="width: 30px;" type="text" id="qtd" value="1">

                            </fieldset>

                            <input class="botao" type="submit" value="Verificar disponibilidade">

                        </form>
                    </section> -->
                    <!-- Fim visita -->

                    <section id="galeria">
                        <h4>Galeria de fotos</h4>

                        <a href="#">
                            <img src="img/imagem1.jpg" height="93" width="93px">
                        </a>

                        <a href="#">
                            <img src="img/imagem2.jpg" height="93" width="93px">
                        </a>

                        <a href="#">
                            <img src="img/imagem3.jpg" height="93" width="93px">
                        </a>
                        
                        <a href="#">
                            <img src="img/imagem4.jpg" height="93" width="93px">
                        </a>


                    </section>

                </aside>
                <!-- Fim aside -->

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