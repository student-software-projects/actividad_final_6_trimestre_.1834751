<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PROYECTO ACME</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Propietario</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("databasepropietario.php");
				$propietario= new Database1();
				
				if(isset($_POST) && !empty($_POST)){
					$numero_cedula = $propietario->sanitize($_POST['numero_cedula']);
					$primer_nombre = $propietario->sanitize($_POST['primer_nombre']);
					$segundo_nombre = $propietario->sanitize($_POST['segundo_nombre']);
					$apellidos = $propietario->sanitize($_POST['apellidos']);
					$direccion = $propietario->sanitize($_POST['direccion']);
					$telefono = $propietario->sanitize($_POST['telefono']);
					$ciudad = $propietario->sanitize($_POST['ciudad']);
					$id_propietario=intval($_POST['id_propietario']);
					$res = $propietario->update($numero_cedula, $primer_nombre, $segundo_nombre, $apellidos, $direccion,$telefono,$ciudad,$id_propietario);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_cliente=$propietario->single_record($id);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Numero de Cedula</label>
					<input type="text" name="numero_cedula" id="numero_cedula" class='form-control' maxlength="100" required  value="<?php echo $datos_cliente->numero_cedula;?>">
					<input type="hidden" name="id_propietario" id="id_propietario" class='form-control' maxlength="100"   value="<?php echo $datos_cliente->id;?>">
				</div>
				<div class="col-md-6">
					<label>Primer Nombre</label>
					<input type="text" name="primer_nombre" id="primer_nombre" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->primer_nombre;?>">
				</div>
				<div class="col-md-12">
					<label>Segundo Nombre</label>
					<textarea  name="segundo_nombre" id="segundo_nombre" class='form-control' maxlength="255" required><?php echo $datos_cliente->segundo_nombre;?></textarea>
				</div>
				<div class="col-md-6">
					<label>Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->apellidos;?>">
				</div>
				<div class="col-md-6">
					<label>Direccion</label>
					<input type="text" name="direccion" id="direccion" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->direccion;?>">
				
				</div>

				<div class="col-md-6">
					<label>Telefono</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->telefono;?>">
				
				</div>

				<div class="col-md-6">
					<label>Ciudad</label>
					<input type="text" name="ciudad" id="ciudad" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->ciudad;?>">
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            