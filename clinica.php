<?php 
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$aPacientes = array();
$aPacientes[] = array(
"dni"=>"94.231.930",
"nombre"=> "Julian Torres",
"edad" => "30",
"peso" => "70"
);

$aPacientes[] = array(
    "dni"=>"23.685.385",
    "nombre"=> "Gonzalo Bustamante",
    "edad" => "66",
    "peso" => "79",
);
$aPacientes[] = array(
    "dni"=>"33.678.123",
    "nombre"=> "Juan Paz",
    "edad" => "70",
    "peso" => "58",
);
$aPacientes[] = array(
    "dni"=>"23.678.564",
    "nombre"=> "Maria Zarate",
    "edad" => "65",
    "peso" => "78",
);
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
        <div class="col-12 py-3">
            <h1>Listado de pacientes</h1>
        </div>
        <table class="table table-hover border">
            <thead>
                <tr>
                <th> DNI</th>
                <th> Nombre y Apellido</th>
                <th> Edad</th>
                <th> Peso</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($aPacientes as $valor){?>
                <tr>
                <td><?php echo $valor["dni"]; ?></td>
                <td><?php echo $valor["nombre"]; ?></td>
                <td><?php echo $valor["edad"]; ?></td>
                <td><?php echo $valor["peso"]; ?></td>
                
                </tr>
                 <?php } ?>
            </tbody>
        </table>

    </main>
</body>
</html>