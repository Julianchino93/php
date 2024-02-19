<?php 
function contar($aArray){
    $contador = 0;
    foreach($aArray as $item){
           $contador++;
    }
    return $contador;
 }

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

echo "la cantidad de productos es" . contar($aProductos);


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>