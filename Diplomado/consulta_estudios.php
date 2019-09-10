<?php session_start();  ?>
<!--doctype html>
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
                        <a href="#"><img src="../img/logo/LOGO-BLANCO.png" width="100" height="100" /></a>

                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">

                            <li class="nav-item dropdown">


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



            <!-- [if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <!-- [endif]-->
<!--//Start Header Top Area -->

<!--//End Header Top Area -->
<!--//Mobile Menu start -->
<?php

        include('menu.php');
        ?>

<?php
        if (isset($_GET['nombres'])) {
            if ($_GET['nombres']) {
                $nombre = $_GET['nombres'];
                //imprimes el error
                echo " <div class='alert-list'>
         <div class='alert alert-success alert-dismissible' role='alert'>
             <button type='button' class='close' data-dismiss='alert'
              aria-label='Close'><span aria-hidden='true'>
              <i class='notika-icon notika-close'></i></span>
              </button>
           Atencion Medica Agregada Correctamente de   $nombre
        </div>



     </div>";
            }
        }
        ?>
<div class="breadcomb-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcomb-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="notika-icon notika-windows"></i>
                                </div>
                                <div class="breadcomb-ctn" style="margin: auto 15px;">
                                    <h2>Pacientes Registrados</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//Breadcomb area End-->
<!--//Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Colposcopia</th>
                                    <th>Papanicolau</th>
                                    <th>Biopsias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $consultasemanas = "SELECT * FROM paciente ";
                                        $resultadosemanas = $mysqliL->query($consultasemanas);
                                        $si = $resultadosemanas->num_rows;

                                        while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                            $id_paciente = ucwords($resultadosemanas1['id_paciente']);
                                            $nombre_paciente = ucwords($resultadosemanas1['nombre_paciente']);
                                            $apellidos_paciente = ucwords($resultadosemanas1['apellidos_paciente']);
                                            $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                            $edad_paciente = $resultadosemanas1['edad_paciente'];

                                            echo "  <tr>
                                                                    <td>$nombre_paciente $apellidos_paciente </td>
                                                                    <td>$edad_paciente</td>
                                                                    <td>$fecha_nacimiento_paciente</td>";


                                            //Colposcopia
                                            $queryColposcopia = "select 	e.id_estudio, 	e.colposcopia, 	e.causa, 	e.cervix, 	e.union_escamocolumnar, 	e.zona_transformacion, 	e.epitelio_acetoblanco, 	e.ep_criterios_menores, 	e.ep_criterios_intermedios, 	e.ep_criterios_mayores, 	e.bs_criterios_menores, 	e.bs_criterios_intermedios, 	e.bs_criterios_mayores, 	e.ag_criterios_menores, 	e.ag_criterios_intermedios, 	e.ag_criterios_mayores, 	e.cy_menores, 	e.cy_intermedios, 	e.cy_mayores, 	e.schiller, 	e.vaginoscopia, 	e.vulvoscopia, 	e.miscelaneos, 	e.recomendacion_diagnostica, 	e.posible_recomendacion_diagnostica, 	e.fecha_estudio from 	estudio_colposcopico e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 1 	and c.id_paciente = $id_paciente;";
                                            if ($resultSetColposcopia = $mysqliL->query($queryColposcopia)) {
                                                $si = $resultSetColposcopia->num_rows;
                                                while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<td><a href='atencion_medica.php?id_paciente=$id_paciente'>Ver Estudio</a></td>";
                                                }
                                            }
                                            //Papanicolaou
                                            $queryPapanicolaou = "select 	e.id_estudio, 	e.fecha_estudio, 	e.estudio, 	e.antecedente_cancer, 	e.antecedente_infeccion_vagina, 	e.fecha_ultima_menstruacion, 	e.fecha_ultima_papanicolau, 	e.metodo_anticonceptivo, 	e.menopausia, 	e.hallazgos_colposcopicos, 	e.observaciones_papinocolau from 	estudio_papanicolau e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 7 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou)) {
                                                $si = $resultSetPapanicolaou->num_rows;
                                                while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<td><a href='atencion_medica.php?id_paciente=$id_paciente'>Ver Etiqueta</a></td>";
                                                }
                                            }

                                            //BIOPSIAS =============
                                            echo "<td>";
                                            //Vulvoscopia
                                            $queryVulvoscopia = "select 	e.id_estudio, 	e.anotaciones_vulvoscopia, 	e.fecha_estudio from 	estudio_vulvoscopia e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 6 	and c.id_paciente = $id_paciente;";
                                            if ($resultSetVulvoscopia = $mysqliL->query($queryVulvoscopia)) {
                                                $si = $resultSetVulvoscopia->num_rows;
                                                while ($resultSet = $resultSetVulvoscopia->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<a href='atencion_medica.php?id_paciente=$id_paciente'>Ver Etiqueta</a>";
                                                }
                                            }

                                            //Vaginoscopia
                                            $queryVaginoscopia = "select 	e.id_estudio, 	e.estudio_solicitar_vaginoscopia, 	e.anotaciones_vaginoscopia, 	e.fecha_estudio from 	estudio_vaginoscopia e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 5 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetVaginoscopia = $mysqliL->query($queryVaginoscopia)) {
                                                $si = $resultSetVaginoscopia->num_rows;
                                                while ($resultSet = $resultSetVaginoscopia->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<a href='atencion_medica.php?id_paciente=$id_paciente'>Ver Etiqueta</a>";
                                                }
                                            }

                                            //Cervix
                                            $queryCervix = "select 	e.id_estudio, 	e.fecha_estudio, 	e.antecendente_cancer_cervicouterino, 	e.tratamientos_previos, 	e.fecha_ultimo_papanicolau, 	e.diagnostico_papanicolau, 	e.hallazgos_colposcopicos, 	e.senalizacion from 	estudio_biopsia_cervix e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 2 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetCervix = $mysqliL->query($queryCervix)) {
                                                $si = $resultSetCervix->num_rows;
                                                while ($resultSet = $resultSetCervix->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<a href='atencion_medica.php?id_paciente=$id_paciente'>Ver Etiqueta</a>";
                                                }
                                            }

                                            //Endometrio
                                            $queryEndometrio = "select 	e.id_estudio, 	e.fecha_estudio, 	e.antecedente_metrorragia, 	e.antecedente_hormonoterapia, 	e.duracion_tratamiento, 	e.periodo_menstrual, 	e.fecha_ultima_menstruacion, 	e.metodo_anticonceptivo, 	e.saco_ovular, 	e.sdg, 	e.observaciones_endometrio from 	estudio_biopsia_endometrio e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 4 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetEndometrio = $mysqliL->query($queryEndometrio)) {
                                                $si = $resultSetEndometrio->num_rows;
                                                while ($resultSet = $resultSetEndometrio->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<a href='atencion_medica.php?id_paciente=$id_paciente'>Ver Etiqueta</a>";
                                                }
                                            }

                                            echo "</td>";

                                            //Termina la fila de la consulta de estudios
                                            echo "</tr>";
                                        }


                                        ?>



                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//Data Table area End-->
<!--//Start Footer area-->
<?php
        include('pie.php');
        ?>
<!--//End Footer area-->
<!--//jquery		============================================ -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<!--//bootstrap JS
		============================================ -->
<script src="js/bootstrap.min.js"></script>
<!--//wow JS
		============================================ -->
<script src="js/wow.min.js"></script>
<!--//price-slider JS
		============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!--//owl.carousel JS
		============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!--//scrollUp JS
		============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>

<!--//counterup JS
		============================================ -->
<script src="js/counterup/jquery.counterup.min.js"></script>
<script src="js/counterup/waypoints.min.js"></script>
<script src="js/counterup/counterup-active.js"></script>
<!--//mCustomScrollbar JS
		============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!--//sparkline JS
		============================================ -->
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/sparkline-active.js"></script>
<!--//flot JS
		============================================ -->
<script src="js/flot/jquery.flot.js"></script>
<script src="js/flot/jquery.flot.resize.js"></script>
<script src="js/flot/flot-active.js"></script>
<!--//knob JS
		============================================ -->
<script src="js/knob/jquery.knob.js"></script>
<script src="js/knob/jquery.appear.js"></script>
<script src="js/knob/knob-active.js"></script>
<!--// Chat JS
		============================================ -->
<script src="js/chat/jquery.chat.js"></script>
<!--// todo JS
		============================================ -->
<script src="js/todo/jquery.todo.js"></script>
<!--// wave JS
		============================================ -->
<script src="js/wave/waves.min.js"></script>
<script src="js/wave/wave-active.js"></script>
<!--//plugins JS
		============================================ -->
<script src="js/plugins.js"></script>
<!--//Data Table JS
		============================================ -->
<script src="js/data-table/jquery.dataTables.min.js"></script>
<script src="js/data-table/data-table-act.js"></script>
<!--//main JS
		============================================ -->
<script src="js/main.js"></script>
<!--//tawk chat JS
		============================================ -->

</body>

</html>
<?php
    }
} else {
    header('Location: ../index.php');

    exit;
}



include('js.php');

?>