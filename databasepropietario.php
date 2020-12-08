<?php
	
	class Database1{
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
		public function create($numero_cedula,$primer_nombre,$segundo_nombre,$apellidos,$direccion,$telefono,$ciudad){
			$sql = "INSERT INTO `propietario` (numero_cedula, primer_nombre, segundo_nombre, apellidos, direccion,telefono,ciudad) VALUES ('$numero_cedula', '$primer_nombre', '$segundo_nombre', '$apellidos', '$direccion', '$telefono','$ciudad')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function read(){
			$sql = "SELECT * FROM propietario";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		


		public function single_record($id){
			$sql = "SELECT * FROM propietario where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		
		public function update($numero_cedula,$primer_nombre,$segundo_nombre,$apellidos,$direccion,$telefono,$ciudad, $id){
			$sql = "UPDATE propietario SET numero_cedula='$numero_cedula', primer_nombre='$primer_nombre', segundo_nombre='$segundo_nombre', apellidos='$apellidos', direccion='$direccion',telefono='$telefono',ciudad='$ciudad' WHERE id=$id";
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

