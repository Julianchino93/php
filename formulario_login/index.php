<?php 
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
if ($_POST){
   $usuario = $_POST["txtUsuario"];
   $contraseña = $_POST["txtContraseña"];

   if($usuario !="" && $contraseña !=""){
    header("Location: acceso-confirmado.php");
   }
   else{
    $msj = "usuario o contraseña incorrecto";
   }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Formulario</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Formulario</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if(isset($msj)) : ?>
                <div class="alert alert-danger" role="alert">       
                    <?php echo $msj; ?>
                </div>
                </div>
        </div>
        <?php endif; ?>
        <form method="POST" action="acceso-confirmado.php">
            <div class="py-2">
                <label for="">Usuario
                <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                </label>
            </div>
            <div class="py-2">
                <label for="">Contraseña
                <input type="password" name="txtContraseña" id="txtContraseña" class="form-control">
                </label>
            </div>
            <div class="py-3">
                <button type="submit" class="btn btn-primary">ENVIAR</button>
            </div>

        </form>

    </main>
    
</body>
</html>