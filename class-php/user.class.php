<?php 

	Class User{

		private $pdo;

		//Conexão com o banco de dados, construtor da classe (primeiro trecho código que será acessado ao instanciar a classe)
		public function __construct($dbname, $host, $user, $senha){

			try {

				$this->pdo = new \PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);

				//echo '<pre>'; print_r($pdo); echo '</pre>';
				
			} catch (PDOException $e) {

				echo "Erro com o banco de dados: ".$e->getMessage();

				//Se pegar esse erro todo o código é parado 
				exit();
				
			} catch (Exception $e) {

				echo "Erro genérico: ".$e->getMessage();
				
			}
		}

		//Função para inserir os dados do usuário no banco
		public function createUser($nome, $email, $senha, $dt_nasc, $genero){

			//Verificando se já tem o email cadastrado antes de cadastrar o usuário
			$cmd = $this->pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
			$cmd->bindValue(":e",$email);
			$cmd->execute();

			if ($cmd->rowCount() > 0)//Email já existe no banco 
			{

				return false;

			}else //Email não foi encontrado no banco
			{
				//Inserindo usuário no banco
				$cmd = $this->pdo->prepare("INSERT INTO usuarios (nome_usuario, email, senha, dt_nasc, genero) VALUES (:n, :e, :s, :dn, :g)");

				$cmd->bindValue(":n",$nome);
				$cmd->bindValue(":e",$email);
				$cmd->bindValue(":s",$senha);
				$cmd->bindValue(":dn",$dt_nasc);
				$cmd->bindValue(":g",$genero);
				$cmd->execute();

				return true;

			}


		}

		//Função para retornar os dados do usuário no banco
		public function selectUser(){

			$res = array();

			$cmd = $this->pdo->query("SELECT * FROM usuarios");

			//echo($cmd);

			//"$res" recebe os dados de "$cmd" trannformandos-os em array usando o metódo "fetchAll()"
			$res = $cmd->fetchAll(PDO::FETCH_ASSOC);


			//echo '<pre>'; print_r($res); echo '</pre>';

			return $res;

			//echo();
			

		}

		//Função para atualizar os dados do usuário no banco
		public function updateUser(){
			
		}

		//Função para deletar os dados do usuário no banco
		public function deleteUser(){
			
		}

		/*//Inserindo dados
		$res = $pdo->prepare("INSERT INTO usuarios(nome_usuario, email, senha, dt_nasc, genero) VALUES (:n, :e, :s, :dn, :g)");
		$res->bindValue(":n", "Miriam");
		$res->bindValue(":e", "miriam@museu.com.br");
		$res->bindValue(":s", "123");
		$res->bindValue(":dn", "1995-05-25");
		$res->bindValue(":g", "feminino");
		$res->execute();

		//INSERT INTO `usuarios`(`nome_usuario`, `email`, `senha`, `dt_nasc`, `genero`) VALUES ('Jorzias Veras','jorzias_veras@museu.com.br',(md5(123)),'1991-01-28','M');*/

	}	

?>