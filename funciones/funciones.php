<?php

function conectar($host = "mysql.hostinger.mx", $user = "u499587875_ielsi", $pass = "maykolbofo", $db = "u499587875_ielsi")
{
    $conector = mysql_connect($host, $user, $pass) or die("No se pudo conectar al server" . mysql_error());
    mysql_select_db($db, $conector) or die ("Error al seleccionar la DB" . mysql_error());
    mysql_query("SET time_zone = '-6:00' ");
    return $conector;
}
conectar();


    function encabezado(){ $dominio = ""; ?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="iso-8859-1">
    <meta http-equiv= "Content-Type" content= "text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ielsi</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>../css/login.css">
    <link rel="stylesheet" type="text/css" href="s<?php echo $dominio; ?>../css/animate-custom.css">
</head>
<style>
    body {
        font-size: 12px;
    }
</style>
<body>
<?php }
function encabezado2(){ $dominio = ""; ?>
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="iso-8859-1">
    <meta http-equiv= "Content-Type" content= "text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ielsi</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>../css/login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $dominio; ?>../css/animate-custom.css">
</head>
<style>
    body {
        font-size: 12px;
    }
</style>
<body   >
<?php }
function footer(){ $dominio = ""; ?>
<br/>
<div class="text-center">
    Ielsi 2016 | Ielsi<br/>Todos los Derechos Reservados<br/>
    <small>Se recomienda usar explorador <a href="https://www.google.com.mx/chrome/browser/desktop/" target="_blank">Google Chrome</a> para una mejor experiencia en el sistema.
    </small>
    <br/>
</div>
<br/>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?php echo $dominio; ?>../js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php echo $dominio; ?>../js/jquery-2.1.4.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $dominio; ?>../js/bootstrap.js"></script>
</body>
</html>
<?php }

function footer2(){ $dominio = ""; ?>
<br/>
<div class="text-center">
    Ielsi 2016 | Ielsi<br/>Todos los Derechos Reservados<br/>
    <small>Se recomienda usar explorador <a href="https://www.google.com.mx/chrome/browser/desktop/" target="_blank">Google Chrome</a> para una mejor experiencia en el sistema.
    </small>
    <br/>
</div>
<br/>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="<?php echo $dominio; ?>../js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php echo $dominio; ?>../js/jquery-2.1.4.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $dominio; ?>../js/bootstrap.js"></script>
</body>
</html>
<?php }

function NvaPass()
{
    if (isset($_POST['envia_pass'])) {
        if (!empty($_POST['nueva_pass'])) {
            $query_nuevapass = mysql_query("UPDATE acceso SET password = '" . sha1($_POST['nueva_pass']) . "', logeado = '2' WHERE id_user = '" . $_SESSION['hera_id'] . "' ");

            $registro_log = "Se actualiz� la contrase�a en el primer acceso de la cuenta de: " . $_SESSION['hera_completo'];
            $fecha_log = date('Y-m-d');
            $hora_log = date('H:i:s');
            $cuenta_log = $_SESSION['hera_completo'];
            $nivel_log = $_SESSION['hera_nivel'];
            $inserta_log = mysql_query("INSERT INTO historial (id_log, log_cuenta, log_nivel, log_registro, log_fecha, log_hora) VALUES
                                                    (NULL, '" . $cuenta_log . "', '" . $nivel_log . "', '" . $registro_log . "', '" . $fecha_log . "', '" . $hora_log . "')");

            echo "<script>location.href = 'nuevapass.php?msj=1';</script>";
        } else {
            echo "<script>location.href = 'nuevapass.php?msj=2';</script>";
        }
    }
}

function CambioPass()
{
    if (isset($_POST['envia_pass'])) {
        if (!empty($_POST['nueva_pass'])) {
            $query_cambiopass = mysql_query("UPDATE acceso SET password = '" . sha1($_POST['nueva_pass']) . "' WHERE id_user = '" . $_SESSION['hera_id'] . "' ");

            $registro_log = "Se cambi� la contrase�a de acceso a la cuenta de: " . $_SESSION['hera_completo'];
            $fecha_log = date('Y-m-d');
            $hora_log = date('H:i:s');
            $cuenta_log = $_SESSION['hera_completo'];
            $nivel_log = $_SESSION['hera_nivel'];
            $inserta_log = mysql_query("INSERT INTO historial (id_log, log_cuenta, log_nivel, log_registro, log_fecha, log_hora) VALUES
                                                    (NULL, '" . $cuenta_log . "', '" . $nivel_log . "', '" . $registro_log . "', '" . $fecha_log . "', '" . $hora_log . "')");

            echo "<script>location.href = 'cambio_pass.php?msj=1';</script>";
        } else {
            echo "<script>location.href = 'cambio_pass.php?msj=2';</script>";
        }
    }
}


function RegistrarAcceso()
{
    if (isset($_POST['reg_acceso'])) {
        if (empty($_POST['nombre']) || empty($_POST['paterno']) || empty($_POST['materno']) || empty($_POST['rfc']) || empty($_POST['pass']) || empty($_POST['nivel'])) {
            echo "<script>location.href = 'accesos.php?msj=error1';</script>";
        } else {
            $busca_rfc = mysql_query("SELECT rfc FROM acceso WHERE rfc LIKE '" . $_POST['rfc'] . "'");
            if (!@mysql_num_rows($busca_rfc)) {
                $nivel = base64_decode($_POST['nivel']);
                $contra = $_POST['pass'];
                $inserta_acceso = mysql_query("INSERT INTO acceso (id_user, nom_acceso, pat_acceso, mat_acceso, rfc, password, nivel) VALUES (NULL, '" . $_POST['nombre'] . "', '" . $_POST['paterno'] . "',
                                               '" . $_POST['materno'] . "', '" . $_POST['rfc'] . "', '" . sha1($contra) . "', '" . $nivel . "')");

                $registro_log = "Se creo un nuevo acceso a Hera, la cuenta fue: " . $_POST['rfc'];
                $fecha_log = date('Y-m-d');
                $hora_log = date('H:i:s');
                $cuenta_log = $_SESSION['hera_completo'];
                $nivel_log = $_SESSION['hera_nivel'];
                $inserta_log = mysql_query("INSERT INTO historial (id_log, log_cuenta, log_nivel, log_registro, log_fecha, log_hora) VALUES
                                                    (NULL, '" . $cuenta_log . "', '" . $nivel_log . "', '" . $registro_log . "', '" . $fecha_log . "', '" . $hora_log . "')");

                echo "<script>location.href = 'accesos.php?msj=ok';</script>";
            } else {
                echo "<script>location.href = 'accesos.php?msj=error2';</script>";
            }
        }
    }
}

function cadisnom($consecutivo, $peli, $numerodecuenta, $importe, $nombredeltrabajador, $tipodecuenta = 99, $banco = "001")
{
    $remplazo = array(",", ".");
    $consecutivo = substr(str_pad($consecutivo, 9, "0", STR_PAD_LEFT), 0, 9);
    $peli = substr(str_pad($peli, 16, " ", STR_PAD_LEFT), 0, 16);
    $tipodecuenta = substr(str_pad($tipodecuenta, 2, "0", STR_PAD_LEFT), 0, 2);
    $numerodecuenta = substr(str_pad($numerodecuenta, 20, " ", STR_PAD_RIGHT), 0, 20);
    $importe = substr(str_pad(str_replace($remplazo, "", number_format($importe, 2)), 15, "0", STR_PAD_LEFT), 0, 15);
    $nombredeltrabajador = substr(str_pad(str_replace(".", "", $nombredeltrabajador), 40, " ", STR_PAD_RIGHT), 0, 40);
    $banco = substr(str_pad($banco, 3, "0", STR_PAD_LEFT), 0, 3);
    $cadena = $consecutivo . $peli . $tipodecuenta . $numerodecuenta . $importe . $nombredeltrabajador . $banco . "001\r\n";

    return $cadena;
}

function remove($cadena, $espacios = "")
{
    if ($espacios) $cadena = str_replace(" ", "", $cadena);
    $cadena = str_replace("&", "&amp;", $cadena);
    $cadena = str_replace("&amp;amp;", "&amp;", $cadena);
    $cadena = str_replace("?", "", $cadena);
    $cadena = str_replace("�", "a", $cadena);
    $cadena = str_replace("�", "e", $cadena);
    $cadena = str_replace("�", "i", $cadena);
    $cadena = str_replace("�", "o", $cadena);
    $cadena = str_replace("�", "u", $cadena);
    $cadena = str_replace("�", "!", $cadena);
    $cadena = str_replace("�", "E", $cadena);
    $cadena = str_replace("�", "I", $cadena);
    $cadena = str_replace("�", "O", $cadena);
    $cadena = str_replace("�", "U", $cadena);
    $cadena = str_replace("�", "n", $cadena);
    $cadena = str_replace("�", "N", $cadena);
    $cadena = str_replace("-", "", $cadena);
    $cadena = str_replace("_", "", $cadena);
    $cadena = str_replace("/", "", $cadena);
    return $cadena;
}

function registra_peli (){
    if (isset($_POST['registra'])){
        if (isset($_FILES['imagen'])){
            $peli = $_POST['peli'];
            $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $limite_kb = 2048;
            if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
                if(!is_dir("../Imagenes/".$peli."/")){
                    mkdir("../Imagenes/".$peli."/");
                }
                $ext = end(explode('.', $_FILES['imagen']['name']));
                $ruta = "../Imagenes/".$peli."/".date("Ymd-Hi").".".$ext;
                $tmp = $_FILES["imagen"]["tmp_name"];
                if (is_uploaded_file($tmp)) {
                    copy($tmp, $ruta);
                }
            } else {
                echo "<script>location.href = 'registro.php?msj=error';</script>";
            }
        }
        $hora = date('Y-m-d');
        $registra = mysql_query("INSERT INTO peliculas VALUES (NULL, '". $_POST['peli'] ."', '". $_POST['descrip'] ."', '". $ruta ."', '". $hora ."')");
    }
}

function act_peli (){
    if (isset($_POST['act_peli'])){
        if (isset($_FILES['imagen'])){
            $peli = $_POST['peli'];
            $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $limite_kb = 2048;
            if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
                if(!is_dir("../Imagenes/".$peli."/")){
                    mkdir("../Imagenes/".$peli."/");
                }
                $ext = end(explode('.', $_FILES['imagen']['name']));
                $ruta = "../Imagenes/".$peli."/".date("Ymd-Hi").".".$ext;
                $tmp = $_FILES["imagen"]["tmp_name"];
                if (is_uploaded_file($tmp)) {
                    copy($tmp, $ruta);
                }
            } else {
                echo "<script>location.href = 'registro.php?msj=error';</script>";
            }
        }
        $hora = date('Y-m-d');
        $registra = mysql_query("UPDATE peliculas SET peli = '". $_POST['peli'] ."', descripcion = '". $_POST['desc'] ."', img = '". $ruta ."'
                                    WHERE id_act = '". $_POST['id_car'] ."'");
    }
}

function eli_pel (){
    if (isset($_POST['eli_peli'])){
        $eli_peli =mysql_query("DELETE FROM peliculas WHERE id_act = '". $_POST['id_car'] ."'");
    }
}

function reg_hor (){
    if (isset($_POST['horarios'])){
        $des = mysql_query("SELECT * FROM peliculas WHERE id_car = '". $_POST['peli'] ."' ");
        $des1 = mysql_fetch_array($des);
        $reg_hor = mysql_query("INSERT INTO horarios VALUES (NULL, '". $_POST['peli'] ."', '". $des1['descripcion'] ."', '". $_POST['hora'] ."', '". $_POST['cine'] ."')");
    }
}
?>
