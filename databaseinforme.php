<?php
	
	class Database3{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="acme";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		

		public function read(){
			$sql = "SELECT placa,marca,conductor.primer_nombre  as conductor, propietario.primer_nombre as propietario
            FROM ((vehiculo
           INNER JOIN conductor ON vehiculo.id = conductor.id)
           INNER JOIN propietario ON vehiculo.id = propietario.id);";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
	}
	
	

?>	

