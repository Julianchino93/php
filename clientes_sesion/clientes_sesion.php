<?php 
ini_set("display_errors", 1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

session_start();
if(isset($_SESSION["listadoClientes"])){
    //Si existe la variablede session listadoClientes  asigno su contenido a aClientes
    $aClientes = $_SESSION["listadoClientes"];
 } else{
        $aClientes = array();
    }

if(isset($_POST["btnEnviar"])){
    $nombreSesion = ($_POST["txtNombre"]);
    $dniSesion = ($_POST["txtDni"]);
    $telefonoSesion = ($_POST["txtTelefono"]);
    $edadSesion = ($_POST["txtEdad"]);
// crea array que contendra el listado de clientes
    $aClientes[] =array("nombre" => $nombreSesion,
                        "dni"    => $dniSesion,
                        "telefono"    => $telefonoSesion,
                        "edad"    => $edadSesion,
);
// actualiza el contenido de variable
    $_SESSION["listadoClientes"] = $aClientes;
}
if(isset($_POST["btnEliminar"])){
    session_destroy();
    $aClientes = array();
}
if(isset($_GET["pos"])){
    $pos = $_GET["pos"];
    unset($aClientes[$pos]);
    //actualiza el array
    $_SESSION["listadoClientes"] = $aClientes;
    header("Location:clientes_sesion.php");
}


?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Tabla de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <form action="" method="POST" class="form">
                    <div class="py-2">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" id="txtNombre" name="txtNombre" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="txtDni">DNI</label>
                        <input type="text" id="txtDni" name="txtDni" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="txtTelefono">Telefono</label>
                        <input type="tel" id="txtTelefono" name="txtTelefono" class="form-control">
                    </div>
                    <div class="py-2">
                        <label for="txtedad">Edad</label>
                        <input type="text" id="txtEdad" name="txtEdad" class="form-control">
                    </div>
                    <div class="py-2">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                        <button type="submit" id="btnEliminar" name="btnEliminar" class="btn btn-danger">ELIMINAR</button>
                    </div>
                </form>
            </div>
            <div class="col-9">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>DNI:</th>
                            <th>Telefono:</th>
                            <th>Edad:</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $pos => $aCliente) : ?>
                        <tr>
                            <td><?php echo $aCliente["nombre"]; ?></td>
                            <td><?php echo $aCliente["dni"]; ?></td>
                            <td><?php echo $aCliente["telefono"];; ?></td>
                            <td><?php echo $aCliente["edad"]; ?></td>
                            <td> <a href="clientes_sesion.php?pos=<?php echo $pos; ?>"><i class="bi bi-trash"></i></a> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    
</body>
</html>