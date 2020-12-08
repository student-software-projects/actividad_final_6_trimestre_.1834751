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
                    <div class="col-sm-8"><h2>Agregar <b>Vehiculo</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("databasevehiculo.php");
				$vehiculo= new Database2();
				if(isset($_POST) && !empty($_POST)){
					$placa = $vehiculo->sanitize($_POST['placa']);
					$color = $vehiculo->sanitize($_POST['color']);
					$marca = $vehiculo->sanitize($_POST['marca']);
					$tipo_Vehiculo = $vehiculo->sanitize($_POST['tipo_Vehiculo']);
					$conductor = $vehiculo->sanitize($_POST['conductor']);
					$propietario = $vehiculo->sanitize($_POST['propietario']);
					$res = $vehiculo->create($placa, $color, $marca, $tipo_Vehiculo, $conductor,$propietario);
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
					<label>Placa</label>
					<input type="text" name="placa" id="placa" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Color </label>
					<input type="text" name="color" id="color" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-12">
					<label>Marca</label>
					<textarea  name="marca" id="marca" class='form-control' maxlength="255" required></textarea>
				</div>
				<div class="col-md-6">
					<label>Tipo Vehiculo</label>
					<select  class='form-control' name="tipo_Vehiculo" id="tipo_Vehiculo">
                    <option value="Particular">Particular</option>
                    <option value="Publico">Publico</option>
                  </select>
				</div>
				<div class="col-md-6">
					<label>Conductor</label>
					<input type="text" name="conductor" id="conductor" class='form-control' maxlength="64" required>
				
				</div>

				<div class="col-md-6">
					<label>Propietario</label>
					<input type="text" name="propietario" id="propietario" class='form-control' maxlength="64" required>
				
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