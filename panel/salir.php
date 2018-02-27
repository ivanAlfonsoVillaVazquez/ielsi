<?php
session_start();
date_default_timezone_set('America/Mexico_City');
if (!isset($_SESSION['cinema_id'])) {
    header("location: panel/index.php");
} else {
    include("../funciones/funciones.php");
    conectar();
    encabezado();

    $_SESSION['hera_rfc'] = NULL;
    $_SESSION['hera_correo'] = NULL;
    $_SESSION['hera_id'] = NULL;
    $_SESSION['hera_nombre'] = NULL;
    $_SESSION['hera_completo'] = NULL;
    $_SESSION['hera_empresa'] = NULL;
    $_SESSION['hera_nivel'] = NULL;
    session_destroy();
    ?>
    <br/>
    <div class="container">
        <div class="row well well-lg col-md-4 col-md-offset-4 text-center">
            <p>

            <h3>Has salido con exito!</h3></p>
            <br/>

            <p>En 5 segundos seras redireccionado a la pagina principal, caso contrario da clic en el botón</p>
            <br/>
            <a href="../index.php" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp; Principal</a>
        </div>
    </div>
    <?php
}
?>
<script>
    function redireccionarPagina() {
        window.location = "../index.php";
    }
    setTimeout("redireccionarPagina()", 5000);
</script>