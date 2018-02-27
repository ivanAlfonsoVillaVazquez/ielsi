<?php $dominio = "";
$usuario = $_SESSION['cinema_id']
?>

<?php if ($_SESSION['cinema_nivel'] == 1 || $_SESSION['cinema_nivel'] == 2) { ?>
    <div class="list-group">
        <ul class="nav navbar-nav navbar-left">
        <a class="list-group-item list-group-item-success  text-center"> Menu Administrador</a>
        <?php if ($_SESSION['cinema_nivel'] == 1) { ?>
       <!--
        <a href="../../../<?php echo $dominio; ?>/panel/compartir.php" class="list-group-item">
            <span class="glyphicon glyphicon-open-file" style="color: #04B404"></span> Compartir Archivos</a>-->
            <a href="../<?php echo $dominio; ?>/panel/administracion.php" class="list-group-item">
                <span class="glyphicon glyphicon-home" style="color: #2FB677"></span> Panel</a>
            <a href="../<?php echo $dominio; ?>/panel/perfil.php?id=<?php echo $usuario; ?>" class="list-group-item">
                <span class="glyphicon glyphicon-user" style="color: #2FB677"></span> Perfil</a>
            <a href="../<?php echo $dominio; ?>/panel/buscar.php" class="list-group-item">
                <span class="glyphicon glyphicon-search" style="color: #2FB677"></span> Buscar Perfiles</a>
            <a href="../<?php echo $dominio; ?>/panel/trend.php" class="list-group-item">
                <span class="glyphicon glyphicon-" style="color: #2FB677">#</span> Top Hashtag</a>

        <?php } ?>
        </ul>
    </div>
<?php } ?>
