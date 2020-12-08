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
                    <div class="col-sm-8"><h2>Listado de  <b>Conductores</b></h2></div>
                    <div class="col-sm-8">
                        <a href="create.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Conductor</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                         <th>numero_cedula</th>
                        <th>primer_nombre</th>
                        <th>segundo_nombre</th>
                        <th>apellidos</th>
                        <th>direccion</th>
                        <th>telefono</th>
						<th>ciudad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
				<?php 
				include ('database.php');
				$Conductor = new Database();
				$listado=$Conductor->read();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
						$id=$row->id;
						$numero_cedula=$row->numero_cedula;
						$primer_nombre=$row->primer_nombre;
						$segundo_nombre=$row->segundo_nombre;
                        $apellidos=$row->apellidos;
                        $direccion=$row->direccion;
                        $telefono=$row->telefono;
						$ciudad=$row->ciudad;
				?>
					<tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $numero_cedula;?></td>
                        <td><?php echo $primer_nombre;?></td>
                        <td><?php echo $segundo_nombre;?></td>
                        <td><?php echo $apellidos;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $telefono;?></td>
						<td><?php echo $ciudad;?></td>
                        <td>
						    <a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
					}
				?>
                    
                    
                          
                </tbody>
            </table>



        </div>
    </div>   

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Propietario</b></h2></div>
                    <div class="col-sm-8">
                        <a href="createpropietario.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Propietario</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>numero_cedula</th>
                        <th>primer_nombre</th>
                        <th>segundo_nombre</th>
                        <th>apellidos</th>
                        <th>direccion</th>
                        <th>telefono</th>
                        <th>ciudad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php 
                include ('databasepropietario.php');
                $Propietario = new Database1();
                $listado=$Propietario->read();
                ?>
                <tbody>
                <?php 
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->id;
                        $numero_cedula=$row->numero_cedula;
                        $primer_nombre=$row->primer_nombre;
                        $segundo_nombre=$row->segundo_nombre;
                        $apellidos=$row->apellidos;
                        $direccion=$row->direccion;
                        $telefono=$row->telefono;
                        $ciudad=$row->ciudad;
                ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $numero_cedula;?></td>
                        <td><?php echo $primer_nombre;?></td>
                        <td><?php echo $segundo_nombre;?></td>
                        <td><?php echo $apellidos;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $ciudad;?></td>
                        <td>
                            <a href="updatepropietario.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="deletepropietario.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>   
                <?php
                    }
                ?>
                    
                    
                          
                </tbody>
            </table>


            
        </div>
    </div>  



    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Vehiculos</b></h2></div>
                    <div class="col-sm-8">
                    
                        <a href="createvehiculo.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Vehiculo</a>
                         <a href="informe.php" class="btn btn-info add-new"><i class="fa"></i> informe</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>placa</th>
                        <th>color</th>
                        <th>marca</th>
                        <th>tipo_Vehiculo</th>
                        <th>conductor</th>
                        <th>propietario</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <?php 
                include ('databasevehiculo.php');
                $Vehiculo = new Database2();
                $listado=$Vehiculo->read();
                ?>
                <tbody>
                <?php 
                    while ($row=mysqli_fetch_object($listado)){
                        $id=$row->id;
                        $placa=$row->placa;
                        $color=$row->color;
                        $marca=$row->marca;
                        $tipo_Vehiculo=$row->tipo_Vehiculo;
                        $conductor=$row->conductor;
                        $propietario=$row->propietario;
                ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $placa;?></td>
                        <td><?php echo $color;?></td>
                        <td><?php echo $marca;?></td>
                        <td><?php echo $tipo_Vehiculo;?></td>
                        <td><?php echo $conductor;?></td>
                        <td><?php echo $propietario;?></td>
                        <td>
                            <a href="updatevehiculo.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        </td>
                    </tr>   
                <?php
                    }
                ?>
                    
                    
                          
                </tbody>
            </table>


            
        </div>
    </div>  
</body>
</html>                            