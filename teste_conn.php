<?php 

try {

				$pdo = new PDO("mysql:dbname=museu;host=localhost","root","");

				echo "Deu bom!";
				
			} catch (PDOException $e) {

				echo "Erro com o banco de dados: ".$e->getMessage();

				//Se pegar esse erro todo o código é parado 
				exit();
				
			} catch (Exception $e) {

				echo "Erro genérico: ".$e->getMessage();
				
			}

			$res = array();

			$cmd = $pdo->query("SELECT * FROM usuarios");

			//echo($cmd);

			//"$res" recebe os dados de "$cmd" trannformandos-os em array usando o metódo "fetchAll()"
			$res = $cmd->fetchAll(PDO::FETCH_ASSOC);


			echo '<pre>'; print_r($res); echo '</pre>';

			return $res;

			//echo();


						//Matriz seelct
                        $data = $user->selectUser();

                        //Utilizo um "for" e dentro dele um "foreach" pois a variável "$data" é uma matriz (array dentro de array)
                        if (count($data) > 0) {
                            for ($i=0; $i < count($data); $i++) { 
                                foreach ($data[$i] as $key => $value) {
                                    if ($key != "id") {
                                        
                                    }
                                }
                            }
                        }
                    
			

?>


if (isset($_POST['nome'])) {

                //Recebendo o que o usuário digita nos inputs
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                $dt_nasc = addslashes($_POST['dtNasc']);
                $genero = addslashes($_POST['genero']);

                if (!empty($nome) && !empty($email) && !empty($senha) && !empty($dt_nasc) && !empty($genero)) {
                        //Cadastrar
                        if (!$user->createUser($nome, $email, $senha, $dt_nasc, $genero)){
                            echo "Email já cadastrado!!";  
                        }
                    
                }else{

                    echo "Preencha todos os campos!!";

                }
                     
            }