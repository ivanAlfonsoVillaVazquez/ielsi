<?php
date_default_timezone_set('America/Mexico_City');
include("funciones/funciones.php");
conectar();

$fail = "index.html";
$success = "panel/administracion.php";
$nuevapass = "panel/nuevapass.php";

if (!isset($_SESSION)) {
    session_start();

    $usuario = NULL;
    $pass = NULL;

    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
   echo $pass1 = md5($pass);
    $query = mysql_query("SELECT * FROM user WHERE usuario = '". $usuario ."' AND pass = '". $pass1 ."' AND rol != 3");
    //$query2 = mysql_query("SELECT * FROM datos, user WHERE datos.usr = user.id_us");
    //$query = "SELECT * FROM user WHERE usuario LIKE '".$usuario."' AND pass LIKE '".$pass. "' AND rol != 3";
    //$resultado = mysql_query($query);

    if (@mysql_num_rows($query)) {
        $row = @mysql_fetch_array($query);
       // $row2 = @mysql_fetch_array($query2);

        $_SESSION['cinema_user'] = $row['usuario'];
        $_SESSION['cinema_id'] = $row['id_user'];
        $_SESSION['cinema_nivel'] = $row['rol'];
        $_SESSION['cinema_nombre'] = $row['usuario'];
        $_SESSION['cinema_completo'] = $row['nombre'];

        $iduser = $row['id_user'];
        $acceso = date('Y-m-d H:i:s');
        //$ultimo_acceso = mysql_query("UPDATE acceso SET ultimo_acceso = '".$acceso."' WHERE id_user = '".$iduser."' ");

        //if ($row['logeado'] == 1) {
            //header("Location: " . $nuevapass);
        //} elseif ($row['logeado'] == 2) {
            header("Location: " . $success);
        //}
    } else {
        $error = "mal";
        ?>
        <form method="post">
        <input type="hidden" name="msg" id="msg" value="mal">
        </form>
<?php
        header("Location:" . $fail . "?" . $error);
    }
}
?>