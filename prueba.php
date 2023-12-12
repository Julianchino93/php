<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

/*
$aAuto =array();
$aAuto["color"]=array("Negro","Verde");
$aAuto["marca"]=("Toshota");
$aAuto["anio"]=("1998");
$aAuto["precio"]=("800");

echo "El auto " . $aAuto["marca"] . " del año " . $aAuto["anio"] . " es de color " . $aAuto["color"][1] . " y su valor es " . $aAuto["precio"];
*/

/*Ejercicio A */
/*
$stock = 33;
if ($stock > 40 && $stock<=35){
    echo "Hay stock";
}
else {
   echo "No hay stock";
}
*/
/*Ejercicio B*/

$valor = rand(1,5);

if($valor %2 == 0){
  echo "El numero $valor no es numero primo";
}
else {
    echo "El numero $valor es primo";
}



?>
