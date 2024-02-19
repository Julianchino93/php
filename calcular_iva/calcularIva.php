<?php 
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$valorIva = 21;
$precioConIva = 0;
$precioSinIva = 0;
$diferenciaIva = 0;


if($_POST){
    $valorIva = $_POST["lstIva"];
    $precioConIva = ($_POST["txtprecioConIva"]) > 0 ? $_POST["txtprecioConIva"] : 0;
    $precioSinIva = ($_POST["txtprecioSinIva"]) > 0 ? $_POST["txtprecioSinIva"] : 0;

    if($precioSinIva > 0){
        $precioConIva = $precioSinIva * ($valorIva/100+1);
        
    }
    if($precioConIva > 0){
        $precioSinIva = $precioConIva /($valorIva/100+1);
    }
    $diferenciaIva = $precioConIva - $precioSinIva;

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Calcular IVA</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Calcular IVA</h1>
            </div>
        </div>
        <div class="row">
        <div class="col-3 offset-2">
            <form method="POST" action="">
                <div class="py-2">
                    <label for="">IVA</label>
                    <select name="lstIva" id="lstIva" class="form-control">
                        <option value="19">19</option>
                        <option value="21" selected>21</option>
                    </select>
                </div>
                <div class="py-2">
                    <label for="">Precio con IVA</label>
                    <input type="text" name="txtprecioConIva" id="txtprecioConIva" class="form-control">
                </div>
                <div class="py-2">
                    <label for="">Precio sin IVA</label>
                    <input type="text" name="txtprecioSinIva" id="txtprecioSinIva" class="form-control">
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </div>
            </form>
        </div>
        <div class="col-3 offset-2">
            <table class="table table-hover">
                 <thead>
                    <tr>
                        <th>IVA</th>
                        <td> <?php echo $valorIva ?>%</td>
                        
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Precio sin IVA</th>
                        <td> $<?php echo number_format($precioSinIva,2,",","."); ?></td> 
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>Precio con IVA</th>
                        <td> $<?php echo number_format($precioConIva,2,",",".");  ?></td>  
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>IVA Cantidad</th>
                        <td> $<?php echo number_format($diferenciaIva,2,",",".");  ?></td>  
                    </tr>
                </thead>
            </table>
            
        </div>
        </div>
    </main>
    
</body>
</html>