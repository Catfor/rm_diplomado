<?php session_start();  ?>
<!doctype html>
<html class="no-js" lang="">
<link rel="shortcut icon" type="image/x-icon" href="../img/logo/corona.png">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="Sistema.php"><img src="../img/logo/LOGO-BLANCO.webp" height="100" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li>
                                <div class="chip">
                                    <img <?php if($_SESSION['genero'] === 'H'){ echo "src='./img/avatar_h.png' "; }else{ echo "src='./img/avatar_m.png' ";} ?> alt="Person" width="96" height="96">
                                    <b><?php echo ucwords($_SESSION['nombre_usuario']) . ' ' . ucwords($_SESSION['apellidos_usuario']);  ?></b>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="logout.php" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> Salir <span><i class="fas fa-door-open"></i></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('css.php');
    ?>
</head>

<body>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        include('../coni/Localhost.php');
        $id = $_SESSION['id_usuario'];
        $nick = $_SESSION['nick'];
        $correo_general = $_SESSION['correo_general'];
        $nombre_usuario = ucwords($_SESSION['nombre_usuario']);
        $rol = $_SESSION['rol'];
        $apellidos_usuario = ucwords($_SESSION['apellidos_usuario']);


        $result123 = mysqli_query($mysqliL, "SELECT contra from usu_me where id_usuario='$id'");

        $rowwe = mysqli_fetch_assoc($result123);
        $contra = $rowwe['contra'];
        if ($contra == '3d603c7c93fb63c7db2b1d99b1998bb6') {
            ?>
            <br>
            <div class="modals-default-cl">
                <button type="button" class="btn nk-deep-purple btn-info" data-toggle="modal" data-target="#myModaltwelve">ayuda</button>
                <div class="modal fade" id="myModaltwelve" role="dialog">
                    <div class="modal-dialog modals-default nk-deep-purple">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2>Reestablece tu contraseña</h2>
                                <p>*Tu contraseña debe ser diferente a DiplomadoRM.<br>*La contraseña deberá ser mayor a 4 dígitos</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    echo "<div class='form-element-list'>
<form action='password.php' method='POST'>
                              <div class='row'>
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
                                      <div class='form-group'>
                                          <div class='nk-int-st'>
                                              <input type='text' class='form-control' placeholder='$nombre_usuario.$apellidos_usuario' disabled>
                                          </div>
                                      </div>
                                  </div>
                                  <div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
                                      <div class='form-group'>
                                          <div class='nk-int-st'>
                                              <input type='Password' class='form-control' placeholder='Nueva Password' name='password' id='password'  required>
                                          </div>";
                    ?>
            <?php echo "</div>
                                  </div>
                                  <button class='btn btn-primary notika-btn-primary waves-effect' type='button' onclick='m()'>Mostrar Contraseña</button>
                                  <input type='submit' value='cambiar password'>
                              </div>



                              </div>"
                    ?>

        <?php
            } else {
                ?>
            <?php
                    include('menu.php');
                    ?>
            <!-- Breadcomb area End-->
            <!-- Contact area Start-->
            <div class="contact-area">
                <div class="container">
                    <!--<div class="row contact-list">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" style="padding-left:55px;">
                            <div class="fila">
                                <h4>Bienvenido A Diplomado <span class="bread-ntd">Reina Madre</span></h4>
                            </div>

                            <div class="fila">
                                <p>Nombre: <?php echo $nombre_usuario . ' ' . $apellidos_usuario ?></p>
                            </div>

                            <div>
                                <p>Correo: <?php echo $correo_general ?></p>
                            </div>
                            <div>
                                <p>Rol: <?php echo $rol ?></p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div style="text-align:center;">

                                <img src="../img/user/logo.png" width="250" height="150" />
                            </div>

                        </div>

                    </div>-->
                    <div class="row contact-list">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="overflow: auto;">
                            <div style="border: solid 1px #f6f8fa;width:100%;margin-bottom: -1px;text-align:center;">
                                <h3 style="margin-top: 15px;">Historico Del Diplomado</h3>
                            </div>
                            <table class="table table-bordered tabla-historial">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Salida
                                        </th>
                                        <th rowspan="2">Fecha
                                        </th>
                                        <th rowspan="2">Pacientes / Registrados
                                        </th>
                                        <th colspan="4">Biopsias
                                        </th>
                                        <th rowspan="2">Paps
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Cervix
                                        </th>
                                        <th>Endome
                                        </th>
                                        <th>Vagino
                                        </th>
                                        <th>Vulva
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $dash = $mysqliL->query("SELECT s.id_salida,UPPER(s.nombre_salida) AS salida,s.fecha_salida,count(DISTINCT a.id_paciente) AS pacientes,count(IF (c.id_tipo_estudio=2 AND c.estatus_patologo=0,1,NULL)) AS cervix_pendientes,count(IF (c.id_tipo_estudio=2 AND c.estatus_patologo=1,1,NULL)) AS cervix_recibidas,count(IF (c.id_tipo_estudio=4 AND c.estatus_patologo=0,1,NULL)) AS endometrio_pendientes,count(IF (c.id_tipo_estudio=4 AND c.estatus_patologo=1,1,NULL)) AS endometrio_recibidas,count(IF (c.id_tipo_estudio=5 AND c.estatus_patologo=0,1,NULL)) AS vagino_pendientes,count(IF (c.id_tipo_estudio=5 AND c.estatus_patologo=1,1,NULL)) AS vagino_recibidas,count(IF (c.id_tipo_estudio=6 AND c.estatus_patologo=0,1,NULL)) AS vulva_pendientes,count(IF (c.id_tipo_estudio=6 AND c.estatus_patologo=1,1,NULL)) AS vulva_recibidas,count(IF (c.id_tipo_estudio=7 AND c.estatus_patologo=0,1,NULL)) AS paps_pendientes,count(IF (c.id_tipo_estudio=7 AND c.estatus_patologo=1,1,NULL)) AS paps_recibidas FROM paciente p LEFT JOIN atencion_medica a ON a.id_paciente=p.id_paciente LEFT JOIN salidas s ON date_format(s.fecha_salida,'%Y-%m-%d')=date_format(a.fecha_atencion_medica,'%Y-%m-%d') LEFT JOIN ctrl_paciente_estudios c ON c.id_atencion=a.id_atencion_medica GROUP BY fecha_salida");
                                            if ($dash->num_rows > 0) {
                                                while ($dashinfo = $dash->fetch_assoc()) {
                                                    echo '<tr><td>' . $dashinfo["salida"] . '</td><td>' . $dashinfo["fecha_salida"] . '</td><td>' . $dashinfo["pacientes"] . '</td><td>' . $dashinfo["cervix_pendientes"] . '</td><td>' . $dashinfo["endometrio_pendientes"] . '</td><td>' . $dashinfo["vagino_pendientes"] . '</td><td>' . $dashinfo["vulva_pendientes"] . '</td><td>' . $dashinfo["paps_pendientes"] . '</td></tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="5">Sin registros</td></tr>';
                                            }

                                            ?>
                                </tbody>
                                <table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact area End-->
</body>

<?php
    include('pie.php');
?>

</html>
<?php
    }
} else {
    header('Location: ../index.php');
    exit;
}


?>
<script>
    function m() {
        var tipo = document.getElementById("password");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
</script>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
============================================ -->
<script src="js/bootstrap.min.js"></script>