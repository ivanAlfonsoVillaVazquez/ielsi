<?php
session_start();
date_default_timezone_set('America/Mexico_City');
if (!isset($_SESSION['cinema_id'])) {
    header("location: ../index.php");
} else {
include("../funciones/funciones.php");
conectar();
encabezado();
include("barra.php");
$usuario = $_SESSION['cinema_id'];

$iden = $_GET['id'];
?>
<?php
$car = mysql_query("SELECT * FROM `user` WHERE `id_us` = '" . $iden . "'");
$contador = 0;
$rowcar = mysql_fetch_array($car);
$contador += 1;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include("menu.php");
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Perfil</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-">
                                <img width="150px" height="150px" src="../<?php echo $rowcar['imagen']; ?>"
                                     class="img-responsive">
                            </div>
                            <div align="center">
                                <h1><?php echo $rowcar['nombre']; ?></h1>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Informacion Personal</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-4">
                                        <h3><label>Direccion</label></h3>
                                        <h4><?php echo $rowcar['direccion']; ?></h4>
                                    </div>
                                    <div class=" col-md-4">
                                        <h3><label>Correo</label></h3>
                                        <h4><?php echo $rowcar['correo']; ?></h4>
                                    </div>
                                    <div class=" col-md-3">
                                        <h3><label>Telfono</label></h3>
                                        <h4><?php echo $rowcar['telefono']; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Twitts</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tr><td></td></tr>
                                            <?php
                                            $comnt = mysql_query("SELECT * FROM `publicacion` WHERE `id_us` = '".$iden."' ORDER BY `publicacion`.`id_publi` DESC");
                                            while ($rowcom = mysql_fetch_array($comnt)) {
                                                $user = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `id_us` = '" . $rowcom['id_us'] . "'"));
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-1 col-md-offset-2">
                                                                <img width="40px" height="40px" src="../<?php echo $user['imagen']; ?>"  class="img-responsive">
                                                            </div>
                                                            <div class="col-md-7">
                                                                <h4><?php echo  $user['usuario']; ?></h4>
                                                                <h6><?php echo  $rowcom['fecha']; ?></h6>
                                                                <h5>  <?php echo $rowcom['mensaje']; ?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-8">
                                                                <img   width="400px" height="200px" src="<?php echo $rowcom['imagen']; ?>"  class="img-responsive">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    footer();
    }
    //}
    ?>
    <script type="text/javascript" src="../dist/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../dist/js/jquery-2.1.4.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>