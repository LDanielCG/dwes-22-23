<?php
require_once('./fpdf184/fpdf.php');

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

//generar pdf y comprobaciones
if ($error != true){
    $Nombre = $_GET['nombre'];
    $Empresa = $_GET['empresa'];
    $Representante = $_GET['representante'];
    $Fecha = $_GET['fecha'];

    if($_GET['nombre'] != "" && $_GET['empresa'] != "" && $_GET['representante'] != "" && $_GET['fecha'] != ""){
        generarPdf($Nombre,$Empresa,$Representante,$Fecha);
    }
}
function generarPdf($Nb, $Em, $Rep, $Fec){
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf -> SetFont('Arial','B',18);
    $pdf -> SetMargins(20,20,20);
    $pdf -> Cell(0,20, utf8_decode('Carta de recomendación'),0,0,'C');
    $pdf -> Ln();
    $pdf -> SetFont('Arial','',11);
    $pdf -> Cell(0,20, 'A quien corresponda,');
    $pdf -> Ln();
    $pdf -> MultiCell(0,7, utf8_decode('Yo, ' . $Rep . ', director de ' . $Em . ', hago constar mediante la presente que ' . $Nb . ', trabajó en esta empresa desde el 20 de enero de 2018 al 31 de mayo de 2019 en el departamento de informática, trabajando bajo mis órdenes directas.'));
    $pdf -> Ln();
    $pdf -> MultiCell(0,7, utf8_decode('Es por ello que es para mí un placer recomendar al Sr. ' . $Nb . ' para el puesto que ofertan en el departamento de informática de su empresa. Le puedo asegurar que incorporará un gran activo a su equipo, ya que tiene experiencia en el dicho campo. Además, es una persona muy trabajadora y muy confiable, en la que se pueden delegar tareas importantes.'));
    $pdf -> Ln();
    $pdf -> Cell(0,7, utf8_decode('Reciba un cordial saludo.'));
    $pdf -> Ln();
    $pdf -> Cell(0,7, utf8_decode('Atentamente'));
    $pdf -> Ln();
    $pdf -> Cell(0,7, utf8_decode($Rep));
    $pdf -> Ln();
    $pdf -> Cell(0,7, utf8_decode('Director de ' . $Em));
    $pdf -> Ln();
    $pdf -> Cell(0,7, utf8_decode('Firmado a día ' . $Fec),0,0,'R');
    $pdf -> Output();
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
        * {
            box-sizing: border-box;
            font-family: 'Lucida Console',monospace;
        }
        body{
            background-color: darkslategray;
        }
        .pageCont{
            display: flex;
            justify-content: center;
            align-items: center;
            height:90vh;
        }
        .mainCont{
            padding:15px;
            background-color: rgba(55, 46, 95, 0.5);
            border: 3px solid #2a2a3c;
            display: flex;
            flex-direction: column;
            align-items: center;  
            justify-content: flex-start;
        }
        form{
            display: flex;
            flex-direction: column;
        }
        label {
            text-shadow: 0 0 5px aqua;
            color: aqua;
            font-size: 12px;
            padding-bottom: 5px;
        }
        .error {
            text-shadow: 0 0 7px #ff0030;
            color: #ff2c54;
            border: 1px solid #ff0030;
            padding: 30px 97px;
            margin:0;
            margin-top:10px;
        }
        .titulo{
            text-shadow: 0 0 5px #f96bb8;
            color: #f96bb8;
        }
        .textoInp {
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0));
            transform: scale(1);
            margin:5px;
            transition: 0.5s;
        }
        .textoInp:hover {
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.86));
            transform: scale(1.1);
        }
        .boton {
            margin:2px;
            transform: scale(1);
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0));
            transition: 0.5s;
            
        }
        .boton:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.86));
        }
    </style>
</head>
<body>
    <div class="pageCont">
        <div class="mainCont">
            <h3 class="titulo">Crea tu carta de motivación</h3>
            <form action="" method="get">
                <label>Nombre: </label> <input class="textoInp" type="text" name="nombre" id="" value="<?=$Nombre?>" >
                <label>Empresa: </label> <input class="textoInp" type="text" name="empresa" id="" value="<?=$Empresa?>" >
                <label>Representante: </label> <input class="textoInp" type="text" name="representante" id="" value="<?=$Representante?>" >
                <label>Fecha: </label> <input class="textoInp" type="date" name="fecha" id="" value="<?=$Fecha?>" >
                
                <input class="boton" type="submit" value="Generar PDF">
            </form>
            <?php if($error){
                echo '<h3 class="error">ERROR</h3>';
            }?>
        </div>
    </div>
</body>
</html>