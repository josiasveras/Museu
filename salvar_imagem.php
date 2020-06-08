<?php 

	require_once "./class-php/user.class.php";
   $user = new User("museu", "localhost", "root", "");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Museu Senac</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 

	</head>
	<body>

		<div class="jumbotron" style="background-color: #f4f2ec; height: 600px; width: 600px; ">

			<form method="POST" enctype="multipart/form-data">
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

	</body>
</html>