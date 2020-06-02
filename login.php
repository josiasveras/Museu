<?php 

	require_once "./class-php/user.class.php";
	$user = new User("museu", "localhost", "root", "");

?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="css/estilo_login.css">
	</head>

	<body>

		<div id="corpo-form">
			<h1>Entrar</h1>
			<form class="login" method="POST">
				<input type="text" name="nome" placeholder="Usuário">
				<input type="password" name="senha" placeholder="Senha">
				<input type="submit" name="acessar" value="ACESSAR">
				<a href="cadastro_usuario.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
			</form>
		</div>

		<?php 

			if (isset($_POST['email'])) {
				echo '<div class="alert alert-danger"" role="alert"> Preencha todos os campos! </div>';

                //Recebendo o que o usuário digita nos inputs
                //$nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                //$dt_nasc = addslashes($_POST['dtNasc']);
                //$genero = addslashes($_POST['genero']);

                //Verificando se os campos não estão vazios
                if (!empty($email) && !empty($senha)) {

                	if ($user->loginUser($email, $senha)) {

                		header("location: index.php");
                		
                	}else{

                		echo '<div class="alert alert-danger"" role="alert"> Email e/ou senha incorretos! </div>';

                	}

                }else{

                	echo '<div class="alert alert-danger"" role="alert"> Preencha todos os campos! </div>';

                }
            }

		?>

	</body>

</html>