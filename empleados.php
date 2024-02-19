<?php 

ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$aEmpleados= array();
$aEmpleados[]= array(
    "dni" => "33300123",
    "nombre" => "DAVID GARCIA",
    "bruto" => 70550,
);
$aEmpleados[]= array(
    "dni" => "40874466",
    "nombre" => "ANA DEL VALLE",
    "bruto" => 74700,
);
$aEmpleados[]= array(
    "dni"=> "94231930",
    "nombre"=> "JULIAN TORRES",
    "bruto"=> 330300,
);
function calcularNeto($bruto){
    return $bruto - ($bruto*0.17);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center p-3">
                <h1>Lista de empleados</h1>
            </div>

        </div>
       
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Sueldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($aEmpleados as $empleado){
                         ?>
                    <tr>
                        <td><?php echo $empleado["dni"]; ?></td>
                        <td><?php echo mb_strtoupper($empleado["nombre"]); ?></td>
                        <td><?php echo number_format( calcularNeto($empleado["bruto"]), 2, ",", ".");?></td>
                    </tr>
                <?php }
                 ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-12">
                    <p> Cantidad de empleados activos es: <?php echo count($aEmpleados); ?></p>
                </div>
                
            </div>
    </main>
    
</body>
</html>