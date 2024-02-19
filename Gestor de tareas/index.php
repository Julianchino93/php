<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);






if(file_exists("archivo.txt")){
    $jsonTareas = file_get_contents("archivo.txt");
    $aTareas = json_decode($jsonTareas, true);

}else{
    $aTareas = array();
}

if(isset($_GET["id"]) && $_GET["id"] >= 0){
    $id = $_GET["id"];
}else{
    $id = "";
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Verifica los campos obligatorios

}
if($_POST){
    $titulo = trim($_POST["txtTitulo"])  ;
    $prioridad = $_POST["lstPrioridad"] = isset($_POST["lstPrioridad"]) ? ($_POST["lstPrioridad"]) : "" ;
    $usuario = $_POST["lstUsuario"] = isset($_POST["lstUsuario"]) ? ($_POST["lstUsuario"]) : "";
    $estado = $_POST["lstEstado"] = isset($_POST["lstEstado"]) ? ($_POST["lstEstado"]) : "" ;
    $descripcion = trim($_POST["txtDescripcion"]);
if($id >= 0){
    $aTareas[$id] =array(
        "fecha" => $aTareas[$id]["fecha"],
        "prioridad" => $prioridad,
        "usuario" => $usuario,
        "estado" =>  $estado,
        "titulo" => $titulo,
        "descripcion"  => $descripcion
    );
}else{

    $aTareas[] =array(
        "fecha" => date("d/m/Y"),
        "prioridad" => $prioridad,
        "usuario" => $usuario,
        "estado" =>  $estado,
        "titulo" => $titulo,
        "descripcion"  => $descripcion
    );
}
}
$jsonTareas = json_encode($aTareas);
file_put_contents("archivo.txt",$jsonTareas);
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset($aTareas[$id]);

$jsonTareas = json_encode($aTareas);
file_put_contents ("archivo.txt",$jsonTareas);
header("Location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.2-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/fontawesome-free-6.4.2-web/css/all.min.css">
    <title>Gestor de tareas</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <form action="" method="POST">
        <div class="row">
            <div class="col-4">
                <label for="lstPrioridad">Prioridad</label>
                <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                    <option value="" disabled selected>seleccionar</option> 
                    <option <?php echo $id >=0 && $aTareas[$id]["prioridad"] == "Alta"? "selected" : ""; ?> value="Alta">Alta</option>
                    <option <?php echo $id >=0 && $aTareas[$id]["prioridad"] == "Media"? "selected" : ""; ?> value="Media">Media</option>
                    <option <?php echo $id >=0 && $aTareas[$id]["prioridad"] == "Baja"? "selected" : ""; ?> value="Baja">Baja</option>
                </select>
            </div>
            <div class="col-4">
                <label for="lstUsuario">Usuario</label>
                <select name="lstUsuario" id="lstUsuario"  class="form-control">
                    <option value="" disabled selected>seleccionar</option>
                    <option <?php echo $id>=0 && $aTareas[$id]["usuario"] == "Ana"? "selected" : "";?>value="Ana">Ana</option>
                    <option <?php echo $id>=0 && $aTareas[$id]["usuario"] == "Bernabe"? "selected" : "";?> value="Bernabe">Bernabe</option>
                    <option <?php echo $id>=0 && $aTareas[$id]["usuario"] == "Daniela"? "selected": ""; ?>value="Daniela">Daniela</option>
                </select>
            </div>
            <div class="col-4">
            <label for="lstEstado">Estado</label>
                <select name="lstEstado" id="lstEstado" class="form-control">
                    <option value="" disabled selected>seleccionar</option>
                    <option <?php echo $id>=0 && $aTareas[$id]["estado"] == "Sin asignar"? "selected" : ""; ?> value="Sin asignar">Sin asignar</option>
                    <option <?php echo $id>=0 && $aTareas[$id]["estado"] == "Asignado"? "selected" : "";?> value="Asignado">Asignado</option>
                    <option <?php echo $id>=0 && $aTareas[$id]["estado"] == "En proceso"? "selected" : "";?> value="En proceso">En proceso</option>
                    <option <?php echo $id>=0 && $aTareas[$id]["estado"] == "Terminado"? "selected" : ""; ?> value="Terminado">Terminado</option>
                </select>
            </div>
            <div>
                <label for="txtTitulo">Titulo</label>
                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?php echo isset($aTareas[$id])?  $aTareas[$id]["titulo"] : ""; ?>">
            </div>
            <div>
                <label for="txtDescripcion">Descripcion</label>
                <input type="text" id="txtDescripcion" name="txtDescripcion" class="form-control" value="<?php echo isset($aTareas [$id])? $aTareas[$id]["descripcion"] : ""; ?>">
            </div>
            <div class="py-3 text-center">
                <button type="submit" class="btn btn-primary">ENVIAR</button>
                <a href="index.php" class="btn btn-secondary">CANCELAR</a>
            </div>
        </div>
        </form>
        <?php if (count($aTareas) > 0): ?>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Insercion</th>
                        <th>Titulo</th>
                        <th>Prioridad</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($aTareas as $id => $tarea) : ?>
                    <tr>
                        <td><?php echo ($id + 1); ?></td>
                        <td><?php echo $tarea["fecha"]; ?></td>
                        <td><?php echo $tarea["titulo"]; ?></td>
                        <td><?php echo $tarea["prioridad"]; ?></td>
                        <td><?php echo $tarea["usuario"]; ?></td>
                        <td><?php echo $tarea["estado"]; ?></td>
                        <td>
                            <a href="index.php?id=<?php echo $id; ?>&do=editar" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i></a>
                            <a href="index.php?id=<?php echo $id; ?>&do=eliminar" class="btn btn-secondary"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else :     ?>
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif;?>
        
    </main>
    
</body>
</html>