<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array("nombre" =>"Smart TV 55\" 4KUHD",
        "marca" => "Hitachi",
        "modelo" => "55AK520",
        "stock" => 60,
        "precio" => 20000,
);
$aProductos[] = array("nombre"=>"Samsung Galaxy A30 Blanco",
  "marca" => "Samsung",
  "modelo" => "Galaxy A30",
  "stock" => 0,
  "precio" => 22000,
);
$aProductos[] =array("nombre" =>"Aire acondicionado split Inverter",
   "marca" => "Surrey",
   "modelo" => "55AI132743",
   "stock" => 5,
   "precio" => 45000,
);
 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Lista de precios</title>
</head>
<body>
    <main class="container">
    <div class="row text-center">
        <h1 class="py-5">Lista de precios</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
            <thead>
                <tr>         
            <th>Nombre</th>
            <th>Marca</th>  
            <th>Modelo</th>  
            <th>Stock</th>  
            <th>Precio</th>  
            <th>Accion</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                
                $sumatoriaPrecio =0;
                for($contador=0; $contador <count($aProductos);$contador++){
                $sumatoriaPrecio += $aProductos[$contador]["precio"];    
                
                ?>
                <tr>
                <td><?php echo $aProductos[$contador]["nombre"]; ?></td>    
                <td><?php echo $aProductos[$contador]["marca"]; ?></td>    
                <td><?php echo $aProductos[$contador]["modelo"]; ?></td>    
                <td><?php echo $aProductos[$contador]["stock"]; ?></td>    
                <td><?php echo $aProductos[$contador]["precio"]; ?></td>
                <td><button class="btn btn-primary">Comprar</button></td>    
                </tr>
                <?php  
                }
                ?>
            </tbody>    
        </table>  
        </div>
        <div class="row">
            <div class="col-12">
                <p> La sumatoria de los precios de los productos es: <?php echo $sumatoriaPrecio         ?></p>
            </div>
        </div>
        </div>
    </div>
    
</main>
    
</body>
</html>
