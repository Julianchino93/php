<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
$nombre = "Julian Torres Huaman";
$edad = "30";
$aPeliculas = array("Peppa pig","Simon","el chavo");
print_r($aPeliculas);
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
            <div class="col-12 text-center p-4">
                <h1>Lista de Productos</h1>
            </div>

            <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th>Fecha:</th>
                    <td><?php echo date("d/m/Y");?></td>
                </tr>
                <tr>
                    <th>Nombre y Apellido:</th>
                    <td><?php echo $nombre; ?></td>
                </tr>
                <tr>
                    <th>Edad:</th>
                    <td><?php echo $edad;?></td>
                </tr>
                <tr>
                    <th>Peliculas Favoritas</th>
                    <td> <?php echo $aPeliculas[1];?> <br>
                        
                            </td>
                </tr>
            </table>
            </div>
        </div>
        
    </main>
    
</body>
</html>