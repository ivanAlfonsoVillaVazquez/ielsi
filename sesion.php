<?php
include("funciones.php");
arriba();


?>

    <div class="panel panel-success">
        <div align="center" class="panel-heading">
            <h3 class="panel-title">Iniciar Sesión</h3>
        </div>
        <div class="panel-body">
            <form  action="validacion.php" method="post">
                <div class="row">
                    <div align="left" class="col-md-4 col-md-offset-4">
                        <div align="center" class="form-group">
                            <label for="">Usuario</label>
                            <input type="text" class="form-control input-sm" maxlength="10" placeholder="Usuario" name="usuario"
                                   id="usuario">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div align="left" class="col-md-4 col-md-offset-4">
                        <div align="center" class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control input-sm" maxlength="20" placeholder="Contraseña" name="pass"
                                   id="pass">
                        </div>
                    </div>
                </div>
                <div class="row " align="center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" name="guardar" class="btn btn-success">  <span class="glyphicon  glyphicon-ok" aria-hidden="true"></span> Ingresar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
abajo();
?>