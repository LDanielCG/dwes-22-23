<?php
    session_start();
    if( !isset($_SESSION['user']) ){
        $url = @end(explode('/', $_SERVER['REQUEST_URI']));
        setcookie("url",$url);
    }
    print_r($_SESSION);
?>

<html>
<head>
  <title>Publico</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
  <h1>PUBLICA!!</h1>
  <?php include('menu.php')?>
  <p>Información para todo tipo de gente</p>
</body>
</html>