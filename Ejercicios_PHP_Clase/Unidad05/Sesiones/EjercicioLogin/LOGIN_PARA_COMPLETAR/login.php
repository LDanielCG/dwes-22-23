<?php
require_once("./assets/claseBD.php");

function clean_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$login = "";
$password = "";
$errorList = [];
//$url = isset($_POST['hiddenURL']) ? $_POST['hiddenURL'] : '';
$url = "";
if( isset($_GET['url']) ){
    $url = $_GET['url'];
}else if( isset($_POST['hiddenURL']) ){
    $url = $_POST['hiddenURL'];
}

//Si se loguea desde login.
if (empty($url)) { $url = isset($_GET['url']) ? $_GET['url'] : './publico.php'; }

//Si tiene errores en el $_GET.
if (isset($_GET["error"])) { $errorList[] = $_GET["error"] . ". Necesitas estar logueado para acceder a esta página."; }


if (isset($_POST["submit"])) {
    if (isset($_POST["login"])) { $login = clean_input($_POST["login"]); }

    if (!filter_var($login, FILTER_VALIDATE_EMAIL)) { $errorList[] = "Usuario inválido"; }

    if (isset($_POST["password"])) { $password = clean_input($_POST["password"]); }

    try {
        //Establecer conexión con la BBDD.
        $dsn = 'mysql:host=localhost;dbname=basededatosclase';
        $user = $passwd = "alumno";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $baseDeDatos = new claseBD($dsn, $user, $passwd, $options);

        //Recupera el los datos del usuario con el email introducido.
        $select = $baseDeDatos->buscarPorMail($login);

        //Printeos de testeo.
        print_r($select[0]);
        echo "<br>emailSelect: " . $select[0]['email'] . "<br>";
        echo "passSelect: " . $select[0]['pass'] . "<br>";
        echo "login: " . $login . "<br>";
        echo "password: " . $password . "<br>";
        echo "pass hash verify: " . password_verify($password, $select[0]['pass']) . "<br>";
        echo "hiddenURL: " . $url . "<br>";
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage() . "\n";
        die();
    }

    if ($login == $select[0]['email'] && password_verify($password, $select[0]['pass'])) {
        //Inicia la sesion con el usuario de login.
        session_start();
        $_SESSION['user'] = $login;

        //Redirección a la pagina que se queria visitar.
        header('Location: ./' . $url);
        exit;
    } else {
        $errorList[] = "Clave errónea";
    }
}


?>
<html>
<head>
    <title>Inicio de sesión</title>
    <link rel="stylesheet" type="text/css" media="all" href="./assets/css/estilo.css">
</head>
<body>
    <form action="login.php" method="post" class="login">
        <p>
            <label for="login">Email:</label>
            <input type="text" name="login" id="login" value="<?= $login ?>">
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="">
        </p>

        <p>
            <input type="hidden" name="hiddenURL" id="hiddenURL" value="<?= $url ?>">
        </p>

        <?php if (count($errorList) > 0) { ?>
            <p>
                <?php foreach ($errorList as $error) { ?>
                    <div class="error"><?= $error ?></div>
                <?php } ?>
            </p>
        <?php } ?>

        <p class="login-submit">
            <label for="submit">&nbsp;</label>
            <button type="submit" name="submit" class="login-button">Login</button>
        </p>
    </form>
</body>
</html>