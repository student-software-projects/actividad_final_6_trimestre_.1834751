<?php
	
	class Database2{
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
		public function create($placa,$color,$marca,$tipo_Vehiculo,$conductor,$propietario){
			$sql = "INSERT INTO `vehiculo` (placa, color, marca, tipo_Vehiculo, conductor,propietario) VALUES ('$placa', '$color', '$marca', '$tipo_Vehiculo', '$conductor','$propietario')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function read(){
			$sql = "SELECT * FROM vehiculo";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		


		public function single_record($id){
			$sql = "SELECT * FROM vehiculo where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($placa,$color,$marca,$tipo_Vehiculo,$conductor,$propietario, $id){
			$sql = "UPDATE vehiculo SET placa='$placa', color='$color', marca='$marca', tipo_Vehiculo='$tipo_Vehiculo', conductor='$conductor',propietario='$propietario' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM propietario WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

