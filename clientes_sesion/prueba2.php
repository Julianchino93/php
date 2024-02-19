<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


/*Definicio
function print_f($variable){
    if(is_array($variable)){
        $archivo = fopen("datos.txt","a+");

        fwrite($archivo, "\nDatos del array ==> \n");
        foreach($variable as $item){
            fwrite($archivo,$item . "\n");
        }
        fclose($archivo);

    }else{
        file_put_contents("datos.txt",$variable);
        $contenido = "Datos de la variable ==>\n" . $variable;
        file_put_contents("datos.txt",$contenido);

    }
    echo "Archivo generado.";

}

//uso
$aNotas = array(8,9,10,7,6);
$msg = "Este es un mensaje";
print_f($aNotas);
*/
function print_f($variable){
    $archivo = fopen("datos.txt","a+"); // abrir archivo

    if(is_array($variable)){
        fwrite($archivo, "\nDatos del array ==> \n");
        foreach($variable as $item){
            fwrite($archivo,$item . "\n");
        }
    }else{
        fwrite($archivo,"\nDatos de la variable ==>\n" . $variable . "\n");
    }
    fclose($archivo); //cerrar el archivo
    echo "Archivo generado.";
}
$aNotas = array(9,8,6,7,10);
$msg = "Este es un mensaje";
print_f($aNotas);
print_f($msg);
?>