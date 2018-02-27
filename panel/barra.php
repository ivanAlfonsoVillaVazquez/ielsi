<?php
$dominio = "";
$usuario = $_SESSION['cinema_id'];

$query2 = mysql_query("SELECT * FROM `user` WHERE id_user= '".$usuario."' ");
$res = mysql_fetch_array($query2);

?>
<nav class="navbar navbar-custom">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="..<?php echo $dominio; ?>/panel/administracion.php" style="color: #fff"><strong><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Ielsi</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a><span class="glyphicon glyphicon-time" style="color: #337ab7"></span> <stron>Ultimo acceso:</stron> <?php echo $res_acceso['ultimo_acceso']; ?></a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span
                            class="glyphicon glyphicon-user" style="color: #fff"></span> <small><?php echo $res['usuario']; ?></small><span class="caret" style="color: #337ab7"></span></a>
                    <ul class="dropdown-menu">
                            <?php
                            $nombre_completo = $res['usuario'] ;
                            if ($_SESSION['cinema_nivel'] == 1) {
                                $nivel = "Empleado";
                            } elseif ($_SESSION['cinema_nivel'] == 2) {
                                $nivel = "Recursos Humanos";
                            }elseif ($_SESSION['cinema_nivel'] == 3) {
                                $nivel = "Tesorer�a";
                            }elseif ($_SESSION['cinema_nivel'] == 1) {
                                $nivel = "Administrador";
                            }elseif ($_SESSION['cinema_nivel'] == 5) {
                                $nivel = "Super Administrador";
                            }
                            ?>
                        <div class="text-center">
                            <small>
                                <strong>Bienvenido</strong><br/>
                            </small>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div style="font-size: 50px"><?php echo $nombre_completo; ?></div>
                            <small><p style="color: #fff"><strong>Nivel:</strong> <?php echo $nivel; ?></p></small>
                        </div>
                        <hr>
                        <li><a href="../panel/salir.php"><span class="glyphicon glyphicon-log-out" style="color: #fff"></span> Salir del sistema</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>