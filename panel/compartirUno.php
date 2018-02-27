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

if (isset($_POST['compartir'])) {
    $ext = $_FILES['arch']['name'];
    $ac = "archivos/" . $ext;
    $tmp = $_FILES['arch']['tmp_name'];
    if (is_uploaded_file($tmp)) {
        copy($tmp, $ac);
        $noti = "INSERT INTO `noticias` (`id_noticia`, `titulo`, `descripcion`, `noticia`, `imagen`, `estado`, `id_categoria`)
                  VALUES (NULL, '".$_POST['titulo']."', '".$_POST['descripcion']."', '".$_POST['noticia']."', '" . $ac . "', '1', '".$_POST['categoria']."')";
        //$archivo = "INSERT INTO `archivo` (`id`, `nombre`, `direccion`, `usuario`) VALUES (NULL, '" . $ext . "', 'archivos/', '" . $usuario . "')";
        mysql_query($noti);
        echo '<script language = javascript>
					alert("Noticia agregada correctamente")
					self.location = "compartirUno.php"
					</script>';
    } else {
        echo '<script language = javascript>
					alert("Noticia no agregado  ")
					self.location = "compartirUno.php"
					</script>';
    }
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
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Subir noticias</h3>
                </div>
                <div class="panel-body">
                    <form method="post" logotion="" enctype="multipart/form-data">
                        <div class="row">
                            <div align="left" class="col-md-4 col-md-offset-4">
                                <div class="form-group">
                                    <label for="">Titulo</label>

                                    <input type="text" class="form-control input-sm" name="titulo" id="titulo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div align="left" class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="">Descripcion</label>

                                    <input type="text" class="form-control input-sm" name="descripcion" id="descripcion">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="">Noticia</label>
                                <textarea class="form-control inpust-sm" rows="6" name="noticia" id="noticia"
                                          placeholder="Excriba la noticia..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-4 col-md-offset-2">
                                    <div class="form-group">
                                    <label for="">Imagen</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="arch" id="arch">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoria</label>
                                    <select class="form-control input-sm" name="categoria" id="categoria">
                                        <?php $cat=mysql_query("SELECT * FROM `categoria` ORDER BY `categoria`.`categoria` ASC");
                            while($rowcat = mysql_fetch_array($cat)){ ?>
                                <option value="<?php echo $rowcat['id_categoria'] ?>"><?php echo $rowcat['categoria'] ?></option>
                            <?php } ?>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div align="center">
                                <div class="input-group">
                                    <button type="submit" name="compartir" class="btn btn-success"><span
                                            class="glyphicon glyphicon-open-file" aria-hidden="true"></span> Subir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>


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