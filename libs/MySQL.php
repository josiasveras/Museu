<?php 
/**
 * 
 */
class MySQL{

	private $host = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $db = "museu";
	private $porta = "3306";
	private $conn;

	
	function __construct()
	{
		$this->conn = mysqli_connect(
			$this->host,
			$this->usuario,
			$this->senha,
			$this->db );

		if (mysqli_connect_error()) {
			printf("Erro na conexão: %d",mysqli_connect_error());
			exit();
		}
	}

	public function query($sql)
	{
		$data = array();
		if ($sql!="") {
			if ($r=mysqli_query($this->conn,$sql)) {
				$data = mysqli_fetch_assoc($r);
			}
		}

		return $data;
		
	}

	public function querySelect($sql)
	{
		$data = array();
		if ($sql!="") {
			if ($r=mysqli_query($this->conn,$sql)) {
				while ($row = mysqli_fetch_assoc($r)) {
					array_push($data,$row);
				}
			}
		}

		return $data;
		
	}

	public function queryNoSelect($sql)
	{
		$r = false;
		if ($sql!="") {
			$r=mysqli_query($this->conn,$sql);
		}

		return $r;
		
	}

	public function recuperaId()
	{
		return mysqli_insert_id($this->conn);
	}

	public function close()
	{
		mysqli_close($this->conn);
	}

}
