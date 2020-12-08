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
                    <div class="col-sm-8"><h2>Informe <b>Final</b></h2></div>
                </div>
                <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>placa</th>
                        <th>marca</th>
                        <th>conductor</th>
                        <th>propietario</th>
                        
                    </tr>
                </thead>
                <?php 
                include ('databaseinforme.php');
                $Vehiculo = new Database3();
                $listado=$Vehiculo->read();
                ?>
                <tbody>
                <?php 
                    while ($row=mysqli_fetch_object($listado)){
                        $placa=$row->placa;
                        $marca=$row->marca;
                        $conductor=$row->conductor;
                        $propietario=$row->propietario;
                ?>
                    <tr>
                        <td><?php echo $placa;?></td>
                        <td><?php echo $marca;?></td>
                        <td><?php echo $conductor;?></td>
                        <td><?php echo $propietario;?></td>
                    </tr>   
                <?php
                    }
                ?>
                    
                    
                          
                </tbody>
            </table>


            
        </div>
    </div>  
</html>                            