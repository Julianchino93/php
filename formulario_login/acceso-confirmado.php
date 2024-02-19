<?php 

if($_POST){
    $usuario = $_REQUEST["txtUsuario"];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Acceso confirmado</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Bienvenido <?php echo $usuario; ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi delectus numquam labore. At, exercitationem quam dolorem fugit veritatis saepe ea, voluptas quos doloribus consequatur asperiores atque excepturi? Aut, aspernatur aliquid.</p>
            </div>
        </div>
        <div>
            <a href="index.php" class="btn btn-primary">Salir</a>
        </div>
    </main>
    
</body>
</html>