<?php
	
//Lógica para conexão com o banco de dados
/*class Connect {*/


	/*public static function getDb()
	{*/
		try {

			$conn = new \PDO("mysql:dbname=museu;host=localhost;charset=utf8", "root","");

			echo "Deu bom!";

			return $conn;

			
			
		} catch (PDOException $e) {

			echo "Erro com o banco de dados: ".$e->getMessage();

			//Se pegar esse erro todo o código é parado 
			exit();
			
		} catch (Exception $e) {

			echo "Erro genérico: ".$e->getMessage();
			
		}
	/*}*/
/*}*/
	
?>