
<!DOCTYPE html>
<html>
    <head>
        <title>Museu SENAC</title>
        <meta charset="UTF-8">

        <!-- Normalize CSS -->
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        
        <!-- Estilo customizado -->
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

        <!-- html5shiv para fazer com que os navegadores que não reconheçam as novas tags HTML5, passem a reconhecê-las -->
        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
        <![endif]-->

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
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Exposições</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </nav>
                <!-- Fim nav -->

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
                                    <a href="#">Os assustadores insetos</a>
                                </li>
                                <li>
                                    <a href="#">O crânio de Luzia, a mulher mais antiga do Brasil</a>
                                </li>
                                <li>
                                    <a href="#">Preguiça gigante e tigre-dentes-de-sabre</a>
                                </li>
                                <li>
                                    <a href="#">Plantas do Brasil Central</a>
                                </li>
                                <li>
                                    <a href="#">Teresa Cristina: A imperatriz Arqueóloga</a>
                                </li>
                                <li>
                                    <a href="#">Arte com Dinossauros - Paleoarte</a>
                                </li>
                                <li>
                                    <a href="#"><strong>Veja todos (65)</strong>></a>
                                </li>
                            </ul>

                        </article>

                        <article id="historia">
                            <h3>200 anos de história</h3>

                            <p>O Museu Nacional tem por missão: <b><i>"Descobrir e interpretar fenômenos do mundo natural e as culturas humanas, difundindo o seu conhecimento com base na realização de pesquisas, 
                            organização de coleções, formação de recursos humanos e educação científica, assim como atuar na preservação do patrimônio científico, histórico, 
                            natural e cultural em benefício da sociedade."</b></i></p>
                            <a>O Museu é uma instituição autônoma, integrante do Fórum de Ciência e Cultura da Universidade Federal do Rio de Janeiro, vinculada ao Ministério da Educação que completou 200 anos em 2018.</a>
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
                    <section id="visita">
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
                    </section>
                    <!-- Fim visita -->

                    <section id="galeria">
                        <h4>Galeria de fotos</h4>

                        <a href="">
                            <img src="img/imagem1.jpg" height="93" width="93px">
                        </a>

                        <a href="">
                            <img src="img/imagem2.jpg" height="93" width="93px">
                        </a>

                        <a href="">
                            <img src="img/imagem3.jpg" height="93" width="93px">
                        </a>
                        
                        <a href="">
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