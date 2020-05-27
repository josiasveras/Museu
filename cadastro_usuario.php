
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
                <br><br><br><br><br><br>
                <!-- Início form-wrapper -->
                <div class="form-wrapper">
                    <h2 style="text-align:center;">Criação de perfil público</h2>
                    <form>
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
                        <input type="password" class="form-control" id="senha" placeholder="8 ou mais caracteres">
                      </div>
                      <div class="form-group">
                        <label for="dtNasc">Data de nascimento</label>
                        <input type="text" class="form-control" id="dtNasc" name="dtNasc" placeholder="Ex: dd/mm/aaaa">
                      </div>
                      <div class="form-group">
                        <label for="genero">Gênero</label>
                        <select class="form-control" id="genero" name="genero">
                          <option value="masculino">Masculino</option>
                          <option value="feminino">Feminino</option>
                        </select>
                      </div>
                      
                      <br><br>
                      <button type="submit" class="btn btn-primary">Enviar</button>
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