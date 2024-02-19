<?php 
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

//Preguntar si existe  el archivo
if(file_exists("archivo.txt")){
// Vamos  a leerlo y almacenamos el contenido en $aClientes
$jsonClientes = file_get_contents("archivo.txt");    
// Convertir jsonClientes  en un array llamado aClientes
$aClientes = json_decode($jsonClientes, true);

}

//Si no existe el archivo
//Creamos un $aCliente inicializado como un array vacio
 else{
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >=0? $_GET["pos"] : "";
if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen = "";

if($pos >=0){
    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){ 
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo"]["tmp_name"];
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
            $nombreImagen ="$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
    }
     //Eliminar la imagen anterior
    if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/" .$aClientes[$pos]["imagen"])){
        unlink("imagenes/" .$aClientes[$pos]["imagen"]);
    } 
    
    }else{
        //mantener el nombre imagen que teniamos antes
        $nombreImagen = $aClientes[$pos]["imagen"];

    }
    // Actualizar
    $aClientes[$pos] =array(
        "dni" => $dni,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
        "imagen" => $nombreImagen
    );
} else {
    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK){ 
    $nombreAleatorio = date("Ymdhmsi");
    $archivo_tmp = $_FILES["archivo"]["tmp_name"];
    $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
    if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
        $nombreImagen ="$nombreAleatorio.$extension";
        move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
}
}
    //insetar
    $aClientes[] =array(
        "dni" => $dni,
        "nombre" => $nombre,
        "telefono" => $telefono,
        "correo" => $correo,
        "imagen" => $nombreImagen
    );
}
    $_SESSION["listadoClientes"] = $aClientes;
//Convertir el array de $aClientes a json  %strJson
$jsonClientes = json_encode($aClientes);
//Almacenar el json en el archivo.txt
file_put_contents("archivo.txt", $jsonClientes);
}


if(isset($_GET["do"])&& $_GET["do"] == "eliminar"){
    // Eliminar del array aClientes la posicion a borrar unset()
    unset($aClientes[$pos]);

    //Convertir el array de $aClientes a json  %strJson
    $jsonClientes = json_encode($aClientes);
    //Almacenar el json en el archivo.txt
    file_put_contents("archivo.txt", $jsonClientes);
    header("Location: index.php");
    
}








?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.2-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Registro de clientes</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div>
                        <label for="">DNI :*</label>
                        <input type="text" name="txtDni" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["dni"] : "";?>">
                    </div>
                    <div>
                        <label for="">Nombre :*</label>
                        <input type="text" name="txtNombre" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"] : "";?>">
                    </div>
                    <div>
                        <label for="">Telefono :*</label>
                        <input type="text" name="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"] :"";?>">
                    </div>
                    <div>
                        <label for="">Correo :*</label>
                        <input type="text" name="txtCorreo" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"] :"";?>">
                    </div>
                    <div class="mt-2">
                        <label for="">Archivo adjunto:</label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png">
                        <small class="d-block">Archivos admitidos .jpg .jpeg .png</small>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
                        <a href="index.php" class="btn btn-danger" id="btnNuevo">Nuevo</a>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach($aClientes as $pos => $aCliente) : ?>
                        <tr>
                        <td>
                            <?php if($aCliente["imagen"] != "" ) : ?>
                                <img src="imagenes/<?php echo $aCliente["imagen"]; ?>" alt="" class="img-thumbnail"></td>
                            <?php endif ?>
                            <td><?php echo $aCliente["dni"] ?></td>
                            <td><?php echo $aCliente["nombre"] ?></td>
                            <td><?php echo $aCliente["correo"] ?></td>
                            <td> 
                                <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="fa-solid fa-pencil"></i></a> 
                                <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash"></i></a> 
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>