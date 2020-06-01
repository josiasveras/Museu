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
			

?>
