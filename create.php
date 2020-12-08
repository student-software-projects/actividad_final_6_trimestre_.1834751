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
                    <div class="col-sm-8"><h2>Agregar <b>Conductor</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$conductor= new Database();
				if(isset($_POST) && !empty($_POST)){
					$numero_cedula = $conductor->sanitize($_POST['numero_cedula']);
					$primer_nombre = $conductor->sanitize($_POST['primer_nombre']);
					$segundo_nombre = $conductor->sanitize($_POST['segundo_nombre']);
					$apellidos = $conductor->sanitize($_POST['apellidos']);
					$direccion = $conductor->sanitize($_POST['direccion']);
					$telefono = $conductor->sanitize($_POST['telefono']);
					$ciudad = $conductor->sanitize($_POST['ciudad']);
					
					$res = $conductor->create($numero_cedula, $primer_nombre, $segundo_nombre, $apellidos, $telefono,$direccion,$ciudad);
					if($res){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron insertar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Numero de Cedula</label>
					<input type="text" name="numero_cedula" id="numero_cedula" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Primer Nombre </label>
					<input type="text" name="primer_nombre" id="primer_nombre" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-12">
					<label>Segundo Nombre</label>
					<textarea  name="segundo_nombre" id="segundo_nombre" class='form-control' maxlength="255" required></textarea>
				</div>
				<div class="col-md-6">
					<label>Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-6">
					<label>Direccion</label>
					<input type="text" name="direccion" id="direccion" class='form-control' maxlength="64" required>
				
				</div>

				<div class="col-md-6">
					<label>Telefono</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="64" required>
				
				</div>

				<div class="col-md-6">
					<label>Ciudad</label>
					<input type="text" name="ciudad" id="ciudad" class='form-control' maxlength="64" required>
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            