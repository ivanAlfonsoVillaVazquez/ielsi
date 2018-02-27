<?php
session_start();
date_default_timezone_set('America/Mexico_City');
$fecha = date("Y-m-d h:i:s");
if (!isset($_SESSION['cinema_id'])) {
    header("location: ../index.html");
} else {
include("../funciones/funciones.php");
conectar();
encabezado2();
include("barra.php");
$usuario = $_SESSION['cinema_id'];
$usu = mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `id_us` = '" . $usuario . "'"));

if (isset($_POST['postear'])) {
    $obtenerID = mysql_query("SELECT * FROM  `publicacion` ORDER BY  `id_publi` DESC");
    $resID = mysql_fetch_array($obtenerID);
    echo $id = ($resID['id_us'] + 1);
    $ruta = "";
    if (empty($_FILES['foto']['name'])) {
        echo "vacio";
    } else {
        echo "enttro";
        if (!is_dir("archivos/comentarios/" . $id)) {
            mkdir("archivos/comentarios/" . $id);
        }
        $nombreImagen = $_FILES['foto']['name'];
        $nombreTmpImagen = $_FILES['foto']['tmp_name'];

        $nombreImagen = remove($nombreImagen);
        $ruta = "";
        if (move_uploaded_file($nombreTmpImagen, "archivos/comentarios/" . $id . "/$nombreImagen")) {
            echo "";
            $ruta = "archivos/comentarios/" . $id . "/$nombreImagen";
        } else {
            echo "Ocurrio un error";
        }
    }
    $ins = mysql_query("INSERT INTO `publicacion` (`id_publi`, `mensaje`, `imagen`, `id_us`,`fecha`, `estado`)
VALUES (NULL, '" . $_POST['titulo'] . "', '" . $ruta . "', '" . $usuario . "','".$fecha."', '1')");
}
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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Ielsi</h3>
                </div>
                <div class="panel-body">
                    <!-- <form enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="panel panel-body panel-primary">
                                <div class="row">
                                    <div class="col-md-offset- col-md-1">
                                        <img width="30px" height="30px" src="../<?php echo $usu['imagen']; ?>"
                                             class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg"
                                                   placeholder="Ques estas Pensando?" maxlength="140" name="titulo" id="titulo">
                                        </div>
                                        <div class="collapse" id="collapseExample">
                                            <div class="well">
                                                <input type="file" placeholder="Imagen" id="foto" name="foto"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                                    data-target="#collapseExample" aria-expanded="false"
                                                    aria-controls="collapseExample">
                                                <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="submit" name="postear" class="btn btn-primary btn-lg">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                Twittear
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr><td></td></tr>
                                <?php
                                $comnt = mysql_query("SELECT * FROM `publicacion` ORDER BY `publicacion`.`id_publi` DESC");
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
                                                    <h4><a href="perfil.php?id=<?php echo  $user['id_us']; ?>">@<?php echo  $user['usuario']; ?></a> </h4>
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <?php
    footer();
    }
    //}
    ?>
    <script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="../js/jquery-2.1.4.js"></script>
    <script>
        //$(function () {
            //$('[data-toggle="tooltip"]').tooltip()
        //})
    </script>