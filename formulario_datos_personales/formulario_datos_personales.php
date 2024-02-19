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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Datos Personales</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Datos Personales</h1>
            </div>
        </div>
        <form method="POST" action="resultado.php">
            <div class="py-3">
                <label for="">Nombre:*</label>
                <input type="text" id="txtNombre" name="txtNombre" class="form-control">
            </div>
            <div class="py-3">
                <label for="">DNI:*</label>
                <input type="text" id="txtDni" name="txtDni" class="form-control">
            </div>
            <div class="py-3">
                <label for="">Telefono:*</label>
                <input type="tel" id="txtTelefono" name="txtTelefono" class="form-control">
            </div>
            <div class="py-3">
                <label for="">Edad:*</label>
                <input type="number" id="txtEdad" name="txtEdad" class="form-control">
            </div>
            <div class="py-3">
                <button type="submit" class="btn btn-primary">ENVIAR</button>
            </div>
        </form>

    </main>
    
</body>
</html>