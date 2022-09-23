<?php
require('/home/ldaniel/Desktop/fpdf184/fpdf.php');

function generarPdf(){
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf -> SetFont('Arial','B',18);
    $pdf -> Cell(60,20, 'Nombre: ');
    $pdf -> Cell(60,20, 'Empresa: ');

    $pdf -> Cell(60,20, $Nombre);

    $pdf -> Output();
}



//mantener datos en campos input
$Nombre = '';
$error = false;
if(isset($_GET['nombre'])) {
    $Nombre = $_GET['nombre'];
    if($Nombre == ''){
        $Nombre = '';
        $error = true;
    }
} else {
    $Nombre = '';
    $error = false;
}

$Empresa = '';
if(isset($_GET['empresa'])) {
    $Empresa = $_GET['empresa'];
    if($Empresa == ''){
        $Empresa = '';
        $error = true;
    }
} else {
    $Empresa = '';
    $error = false;
}

$Representante = '';
if(isset($_GET['representante'])) {
    $Representante = $_GET['representante'];
    if($Representante == ''){
        $Representante = '';
        $error = true;
    }
} else {
    $Representante = '';
    $error = false;
}

$Fecha = '';
if(isset($_GET['fecha'])) {
    $Fecha = $_GET['fecha'];
    if($Fecha == ''){
        $Fecha = '';
        $error = true;
    }
} else {
    $Fecha = '';
    $error = false;
}

//generar pdf que de alguna forma funciona xd
if ($error == true){
    //echo 'trueeeee';
} else{
    $Nombre = $_GET['nombre'];
    $Empresa = $_GET['empresa'];
    $Representante = $_GET['representante'];
    $Fecha = $_GET['fecha'];
    generarPdf();
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .pageCont{
            display: flex;
            justify-content: center;
            align-items: center;
            height:90vh;
        }
        .mainCont{
            background-color: antiquewhite;
            padding:15px;
        }
        form{
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="pageCont">
        <div class="mainCont">
            <h3>Crea tu carta de motivación</h3>
            <form action="" method="get">
                <label>Nombre: </label> <input class="textoInp" type="text" name="nombre" id="" value="<?=$Nombre?>" ><br>
                <label>Empresa: </label> <input class="textoInp" type="text" name="empresa" id="" value="<?=$Empresa?>" ><br>
                <label>Representante: </label> <input class="textoInp" type="text" name="representante" id="" value="<?=$Representante?>" ><br>
                <label>Fecha: </label> <input class="textoInp" type="date" name="fecha" id="" value="<?=$Fecha?>" ><br>
                
                <input class="boton" type="submit" value="Generar PDF">
            </form>
            <?php if($error){
                echo '<h3 class="error">ERROR</h3>';
            }?>
        </div>
    </div>
</body>
</html>