<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
if($_POST){
    $Nombre = $_REQUEST["txtNombre"];
    $Dni = $_REQUEST["txtDni"];
    $Telefono = $_REQUEST["txtTelefono"];
    $Edad = $_REQUEST["txtEdad"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Datos personales</h1>
            </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Telefono</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php echo $Nombre; ?></td>
                    <td> <?php echo $Dni; ?></td>
                    <td> <?php echo $Telefono ?></td>
                    <td> <?php echo $Edad ?></td>
                </tr>
            </tbody>
        </table>    
        </div>

    </main>
    
</body>
</html>