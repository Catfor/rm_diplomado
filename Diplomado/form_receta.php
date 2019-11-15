<?php session_start();
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>
    <!doctype html>
    <html class="no-js" lang="">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo/corona.png">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <style>
            #suggestions {
                background: white;
                box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
                height: auto;
                position: absolute;
                top: 45px;
                z-index: 9999;
                width: 400px;
            }

            #suggestions .suggest-element {
                border-top: 1px solid #d6d4d4;
                cursor: pointer;
                padding: 8px;
                width: 100%;
                float: left;
            }

            .input-group-addon {
                min-width: 38px;
            }

            div.input-group {
                margin-bottom: 5px;
            }
        </style>
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="sistema.php"><img src="../img/logo/LOGO-BLANCO.webp" height="100" /></a>
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
        <div class="loader">
            <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
                    <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
        <?php
            include('../coni/Localhost.php');
            $id = $_SESSION['id_usuario'];
            $nick = $_SESSION['nick'];
            $correo_general = $_SESSION['correo_general'];
            $nombre_usuario = ucwords($_SESSION['nombre_usuario']);
            $apellidos_usuario = ucwords($_SESSION['apellidos_usuario']);
            $rol = $_SESSION['rol'];
            $id_paciente = $_GET['id_paciente'];
            $re = mysqli_query($mysqliL, "SELECT * FROM paciente AS p
            INNER JOIN atencion_medica AS a
            ON a.id_paciente=p.id_paciente
            WHERE a.id_paciente='$id_paciente' limit 1 ");
            $total = $re->num_rows;
            $ro = mysqli_fetch_assoc($re);
            $edad_inicio_menstruacion = $ro['edad_inicio_menstruacion'];
            $metodos_planificacion = ($ro['metodos_planificacion'] == 'otro' ? $ro['cual'] : $ro['metodos_planificacion']);
            $cual = $ro['cual'];
            $fecha_atencion_medica = $ro['fecha_atencion_medica'];
            $edad_inicio_vida_sexual = $ro['edad_inicio_vida_sexual'];
            $edad_en_que_fue_su_regla = $ro['edad_en_que_fue_su_regla'];
            $parejas_sexuales = $ro['parejas_sexuales'];
            $gestas = $ro['gestas'];
            $para = $ro['para'];
            $cesareas = $ro['cesareas'];
            $abortos = $ro['abortos'];
            $fecha_ultima_regla = $ro['fecha_ultima_regla'];
            $fecha_ultimo_papanicolau = $ro['fecha_ultimo_papanicolau'];
            $antecedentes_tratamiento = $ro['antecedentes_tratamiento'];
            $atecedentes_lesion = $ro['atecedentes_lesion'];
            $metrorragia = $ro['metrorragia'];
            $hormonoterapia = $ro['hormonoterapia'];
            $duracion_hormonoterapia = $ro['duracion_hormonoterapia'];
            $ritmo = $ro['ritmo'];
            $antecedente_cancer_cervicouterino = $ro['antecedente_cancer_cervicouterino'];
            $tratamiento_previo = $ro['tratamiento_previo'];
            $fecha_atencion_medica = $ro['fecha_atencion_medica'];
            $result123 = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente='$id_paciente'");
            $rowwe = mysqli_fetch_assoc($result123);
            $nombre_paciente = ucwords(strtolower($rowwe['nombre_paciente']));
            $apellidos_paciente = ucwords(strtolower($rowwe['apellidos_paciente']));
            $edad_paciente = $rowwe['edad_paciente'];
            $fecha_nacimiento_paciente = $rowwe['fecha_nacimiento_paciente'];
            $result123 = mysqli_query($mysqliL, "SELECT contra from usu_me where id_usuario='$id'");
            $rowwe = mysqli_fetch_assoc($result123);
            $contra = $rowwe['contra'];

            include('menu.php');
            if ($rol == 'Medico' || $rol == 'Supervisor' || $rol == 'Patologo' || $rol == 'Admin') {
                ?>
            <div class="breadcomb-area">
                <div class="container">
                    <div class="fila">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div style="text-align:center;color: #ed80a8;">
                                    <i class="fas fa-user-md fa-4x"></i>
                                    <h2 style="margin-top:10px;">Receta Médica</h2>
                                    <div style="text-align:left;">
                                        <p style="color:#000">
                                            Emitida por <b><?php echo $nombre_usuario . " " . $apellidos_usuario; ?></b>
                                        </p>
                                        <p style="color:#000">
                                            Paciente <b><?php echo $nombre_paciente . " " . $apellidos_paciente; ?></b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modals-default-cl">
                        <center>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalfive">Información De Atención Médica</button>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalsix">Información De Colposcopia</button>
                        </center>
                    </div>
                    <div class="modal" id="myModalfive" role="dialog">
                        <div class="modal-dialog modals-default">
                            <div class="modal-content" style=" padding: 15px 65px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row fila">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel-group" data-collapse-color="nk-purple" id="accordionPurple" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-collapse notika-accrodion-cus">
                                                    <div class="panel-body">
                                                        <div Class="row fila" style="text-align:center;">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="nk-int-mk sl-dp-mn">
                                                                    <h4>Atención Médica</h4>
                                                                </div>
                                                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
                                                                    <div class="input-group date nk-int-st">
                                                                        <span class="input-group-addon"></span>
                                                                        <input type="text" class="form-control" style="text-align:center;" placeholder="
                                                                        <?php
                                                                                setlocale(LC_TIME, 'es_ES', 'esp_esp');
                                                                                $fe = date("d.M.Y", strtotime($fecha_atencion_medica));
                                                                                $inicio = strftime("%d de %B del %Y", strtotime($fe));
                                                                                echo 'Registro Del ' . $inicio;  ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row fila">
                                                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b>Primera Menstruación</b> A Los
                                                                    <?php
                                                                            echo ' ' . $edad_inicio_menstruacion . ' Años';
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b> Método de Planificación:</b>
                                                                    <?php
                                                                            echo ' ' . $metodos_planificacion;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div Class="row fila">
                                                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b>Inicio De Vida Sexual</b> A Los <?php echo ' ' . $edad_inicio_vida_sexual . ' Años'; ?></p>
                                                            </div>
                                                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b>Parejas Sexuales:</b><?php echo ' ' . $parejas_sexuales; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="row fila">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Gestas:</b> <?php echo ' ' . $gestas; ?></p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Paras:</b><?php echo ' ' . $para; ?></p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Césareas:</b> <?php echo ' ' . $cesareas; ?> </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Abortos:</b> <?php echo ' ' . $abortos; ?> </p>
                                                            </div>
                                                        </div>
                                                        <div class="row fila">
                                                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                                                <div>
                                                                    <p><b>Fecha De Última Regla:</b>
                                                                        <?php
                                                                                if ($fecha_ultima_regla != '1969-12-31' && $fecha_ultima_regla != NULL) {
                                                                                    $fea = date("d.M.Y", strtotime($fecha_ultima_regla));
                                                                                    $inicio1 = strftime("%d de %B del %Y", strtotime($fea));
                                                                                    echo '<br>' . $inicio1;
                                                                                } else {
                                                                                    echo '<br>Sin Registro De Fecha';
                                                                                }
                                                                                ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                                                                <div>
                                                                    <p><b>Fecha Del Último Papanicolau:</b>
                                                                        <?php
                                                                                if ($fecha_ultimo_papanicolau != '1969-12-31' && $fecha_ultimo_papanicolau != NULL) {
                                                                                    $fea2 = date("d.M.Y", strtotime($fecha_ultimo_papanicolau));
                                                                                    $inicio12 = strftime("%d de %B del %Y", strtotime($fea2));
                                                                                    echo '<br>' . $inicio12;
                                                                                } else {
                                                                                    echo '<br>Sin Registro De Fecha';
                                                                                }
                                                                                ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row fila">
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group purple-border">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <FONT FACE="Arial" SIZE="3" style="color:rgb(144, 143, 143);">Antecedentes de Lesión</FONT>
                                                                        </div>
                                                                    </div>
                                                                    <textarea class="form-control" rows="2" placeholder="<?php echo $atecedentes_lesion; ?>" name="atecedentes_lesion" form="f1" disabled></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="form-group purple-border">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <FONT FACE="Arial" SIZE="3  " style="color:rgb(144, 143, 143);">Antecedente de Tratamiento</FONT>
                                                                        </div>
                                                                    </div>
                                                                    <textarea class="form-control" rows="2" placeholder="<?php echo $antecedentes_tratamiento; ?>" name="antecedentes_tratamiento" form="f1" disabled></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row fila">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p>Metrorragia:
                                                                    <?php if ($metrorragia == 0) {
                                                                                echo " No";
                                                                            } else {
                                                                                echo " Si";
                                                                            }
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <p>Hormonoterapia:
                                                                    <?php if ($hormonoterapia == 0) {
                                                                                echo " No";
                                                                            } else {
                                                                                echo " Si, duró " . $duracion_hormonoterapia;
                                                                            }
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row fila">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p>Ritmo <?php echo ' ' . $ritmo; ?> </p>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                                <p>Antecedente De Cáncer Cervicouterino:
                                                                    <?php if ($antecedente_cancer_cervicouterino == 0) {
                                                                                echo "No";
                                                                            } else {
                                                                                echo "Si";
                                                                            } ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p>Tratamiento Previos:
                                                                    <?php if ($tratamiento_previo == 0) {
                                                                                echo "No";
                                                                            } else {
                                                                                echo "Si";
                                                                            } ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    <?php

                            $consultasemanas = "SELECT CONCAT(p.nombre_paciente,' ',p.apellidos_paciente) AS nombre,p.edad_paciente AS edad,a.fecha_atencion_medica AS fecha_atencion
                            ,a.ritmo AS ritmo,a.gestas AS gestas,a.para AS para,a.abortos AS abortos,a.cesareas AS cesareas,a.fecha_ultima_regla AS fum
                            ,a.fecha_ultimo_papanicolau AS fup,ec.cervix AS cervix,a.metodos_planificacion AS m,a.cual AS cual,a.edad_inicio_vida_sexual AS ivsa
                            ,ec.colposcopia AS colposcopia,ec.zona_transformacion AS zona_transformacion,a.edad_en_que_fue_su_regla AS menarca
                            ,ec.epitelio_acetoblanco AS epitelio_acetoblanco,ec.bs_criterios_menores AS bs_criterios_menores,ec.bs_criterios_intermedios AS bs_criterios_intermedios
                            ,ec.bs_criterios_mayores AS bs_criterios_mayores,ec.schiller AS schiller,ec.antecedentes_de_importancia AS antecedentes_de_importancia,ec.plan_de_tratamiento AS plan_de_tratamiento
                            ,ec.miscelaneos AS miscelaneos,ec.posible_recomendacion_diagnostica, a.id_atencion_medica
                            FROM paciente AS p
                            INNER JOIN ctrl_paciente_estudios AS c
                            ON c.id_paciente=p.id_paciente
                            INNER JOIN estudio_colposcopico AS ec
                            ON ec.id_estudio=c.id_estudio
                            INNER JOIN atencion_medica AS a
                            ON a.id_atencion_medica=c.id_atencion
                                    WHERE c.id_paciente='$id_paciente' AND c.id_tipo_estudio=1 limit 1";
                            $resultadosemanas = $mysqliL->query($consultasemanas);

                            $resultadosemanas1 = $resultadosemanas->fetch_assoc();
                            $nombre = ucwords($resultadosemanas1['nombre']);
                            $posible_recomendacion_diagnostica = ucwords(str_replace("_", " ", $resultadosemanas1['posible_recomendacion_diagnostica']));
                            $miscelaneos = ucwords($resultadosemanas1['miscelaneos']);
                            $id_atencion = $resultadosemanas1['id_atencion_medica'];
                            $plan_de_tratamiento = ucwords($resultadosemanas1['plan_de_tratamiento']);
                            $antecedentes_de_importancia = ucwords($resultadosemanas1['antecedentes_de_importancia']);

                            $schiller = ucwords($resultadosemanas1['schiller']);

                            $bs_criterios_menores = ucwords(str_replace("_", " ", $resultadosemanas1['bs_criterios_menores']));
                            $bs_criterios_intermedios = ucwords(str_replace("_", " ", $resultadosemanas1['bs_criterios_intermedios']));
                            $bs_criterios_mayores = ucwords(str_replace("_", " ", $resultadosemanas1['bs_criterios_mayores']));

                            $menarca = ucwords($resultadosemanas1['menarca']);
                            $zona_transformacion = ucwords($resultadosemanas1['zona_transformacion']);
                            $colposcopia = ucwords($resultadosemanas1['colposcopia']);
                            $ivsa = ucwords($resultadosemanas1['ivsa']);
                            $m = ucwords(str_replace("_", " ", $resultadosemanas1['m']));
                            $cual = ucwords(str_replace("_", " ", $resultadosemanas1['cual']));
                            $edad = ucwords($resultadosemanas1['edad']);
                            $fecha_atencion = ucwords($resultadosemanas1['fecha_atencion']);
                            $ritmo = ucwords($resultadosemanas1['ritmo']);
                            $gestas = ucwords($resultadosemanas1['gestas']);
                            $para = ucwords($resultadosemanas1['para']);
                            $abortos = ucwords($resultadosemanas1['abortos']);
                            $cesareas = ucwords($resultadosemanas1['cesareas']);
                            $fum = ucwords($resultadosemanas1['fum']);
                            $fup = ucwords($resultadosemanas1['fup']);
                            $cervix = ucwords($resultadosemanas1['cervix']);
                            $fum1 = ucwords(strftime("%d de %B del %Y", strtotime($fum)));
                            $fup1 = ucwords(strftime("%d de %B del %Y", strtotime($fup)));
                            ?>

                    <div class="modal" id="myModalsix" role="dialog">
                        <div class="modal-dialog modals-default">
                            <div class="modal-content" style="padding: 15px 65px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row fila">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="panel-group" data-collapse-color="nk-purple" id="accordionPurple" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-collapse notika-accrodion-cus">
                                                    <div class="panel-body">
                                                        <div Class="row fila" style="text-align:center;">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="nk-int-mk sl-dp-mn">
                                                                    <h4>Información De Colposcopia</h4>
                                                                </div>
                                                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_3">
                                                                    <div class="input-group date nk-int-st">
                                                                        <span class="input-group-addon"></span>
                                                                        <input type="text" class="form-control" style="text-align:center;" placeholder="
                                                                        <?php
                                                                                setlocale(LC_TIME, 'es_ES', 'esp_esp');
                                                                                $fe = date("d.M.Y", strtotime($fecha_atencion));
                                                                                $inicio = strftime("%d de %B del %Y", strtotime($fe));
                                                                                echo 'Registro Del ' . $inicio;  ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- MENARCA	RITMO	MPF	IVSA	 -->
                                                        <div class="row fila">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>MENARCA:</b>
                                                                    <?php
                                                                            echo ' ' . $menarca;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Ritmo:</b>
                                                                    <?php
                                                                            echo ' ' . $ritmo;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>MPF:</b>
                                                                    <?php
                                                                            echo ' ' . $m;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>IVSA:</b>
                                                                    <?php
                                                                            echo ' ' . $ivsa;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- GESTA	PARA	ABORTO	CESÁREA -->
                                                        <div class="row fila">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Gestas:</b>
                                                                    <?php
                                                                            echo ' ' . $gestas;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Paras:</b>
                                                                    <?php
                                                                            echo ' ' . $para;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Abortos:</b>
                                                                    <?php
                                                                            echo ' ' . $abortos;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Cesáreas:</b>
                                                                    <?php
                                                                            echo ' ' . $cesareas;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- COLPOSCOPIA	CÉRVIX	ZONA DE TRANSFORMACIÓN -->
                                                        <div class="row fila">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Colposcopia:</b>
                                                                    <?php
                                                                            echo ' ' . $gestas;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <p><b>Cervix:</b>
                                                                    <?php
                                                                            echo ' ' . $para;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <p><b>Zona de Transformación:</b>
                                                                    <?php
                                                                            echo ' ' . $abortos;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- EPITELIO ACETOBLANCO	BORDE Y SUPERFICIE	PRUEBA DE SCHILLER -->
                                                        <div class="row fila">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b>Epitelio Acetoblanco:</b>
                                                                    <?php
                                                                            echo ' ' . $colposcopia;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b>Borde Y Superficie:</b>
                                                                    <?php

                                                                            echo ' ' . (strlen(str_replace(' ', '', $bs_criterios_menores . $bs_criterios_intermedios . $bs_criterios_mayores)) > 0 ? $bs_criterios_menores . $bs_criterios_intermedios . $bs_criterios_mayores : '<br>Sin Registro');
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b>Prueba De Schiller:</b>
                                                                    <?php
                                                                            echo ' ' . $schiller;
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <!-- ANTECEDENTES DE IMPORTANCIA (CIRUGÍAS PREVIAS, CTRIOTERAPIA, LASSER, ELECTROCIRUGÍA)
 -->
                                                        <div class="row fila">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <p><b>Antecedentes De Importancia (Cirugías Previas, Ctrioterapia, Lasser, Electrocirugía):</b>
                                                                    <?php
                                                                            echo ' ' . (strlen(str_replace(' ', '', $antecedentes_de_importancia)) > 0 ? $antecedentes_de_importancia : '<br>Sin Información Registrada');
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row fila">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <p><b>Posible Diagnóstico:</b>
                                                                    <?php
                                                                            echo ' ' . (strlen(str_replace(' ', '', $posible_recomendacion_diagnostica)) > 0 ? '<br>' . $posible_recomendacion_diagnostica : '<br>Sin Diagnóstico Registrado');
                                                                            ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <p><b>Plan de Tratamiento:</b>
                                                                    <?php
                                                                            echo ' ' . (strlen(str_replace(' ', '', $plan_de_tratamiento)) > 0 ? '<br>' . $plan_de_tratamiento : '<br>Sin Plan De Tratamiento Registrado');
                                                                            ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row fila">
                                                            <center>
                                                                <?php
                                                                        $consultasemanas = "SELECT * FROM imagen AS i WHERE i.id_atencion_medica='$id_atencion' AND i.seleccion = 1";

                                                                        $resultadosemanas = $mysqliL->query($consultasemanas);

                                                                        while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                                                            $ruta_imagen = $resultadosemanas1['ruta_imagen'];
                                                                            ?>
                                                                    <img src="imagesestudios/<?php echo $ruta_imagen; ?>" width="250" height="105" />
                                                                <?php  }   ?>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="f" action='guardar_receta.php' method="post" enctype="multipart/form-data">
                        <input type='hidden' value='<?php echo $id; ?>' name='id_usuario'>
                        <input type='hidden' value='<?php echo $id_paciente; ?>' name='id_paciente'>
                        <hr>
                        <div class="fila med">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-prescription-bottle-alt"></i>
                                    </span>
                                    <input type="text" class="form-control" id="key" name="medicamento[]" placeholder="Medicamento, ejemplo: Paracetamol">
                                    <div id="suggestions"></div>
                                    <span class="input-group-addon btnElimina" style="display:none;color:indigo;" class="input-group-addon">
                                        <i class="fas fa-times-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                    <input type="text" class="form-control" id="Indicaciones" name="indicaciones[]" placeholder=" Indicaciones, ejemplo: 2 Tabletas Cada 8 Horas Por 5 Días">
                                </div>
                            </div>
                        </div>
                        <div id="final">
                        </div>
                        <hr>
                        <div class="row fila" style="text-align:center">
                            <div id="btnAgregar" class="btn btn-primary">Agregar medicamento
                                <i id="btnAgregar" class="fas fa-plus-circle fa-2x" style="color: #ed80a8;"></i>
                            </div>
                        </div>
                        <div class="row fila" style="text-align:right">
                            <button type="submit" class="btn btn-primary">Emitir
                                <i id="btnSubmit" class="fas fa-plus-circle fa-2x" style="color: #ed80a8;"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        <?php
            }
            include('pie.php');
            ?>
        <!--//End Footer area-->
        <!--//jquery		============================================ -->
        <script src="../js/jquery/2.2.4/jquery.min.js"></script>
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
        <script>
            var medForm = "<div class='fila med' style='display:none;'><div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group'><span class='input-group-addon'><i class='fas fa-prescription-bottle-alt'></i></span><input type='text' class='form-control' id='key' name='medicamento[]' placeholder='Medicamento, ejemplo: Paracetamol'><div id='suggestions'/><span class='input-group-addon btnElimina' style='" + ($(".btnElimina").size() > 1 ? "display:none;" : "") + "color:indigo;' class='input-group-addon'><i class='fas fa-times-circle'></i></span></div></div><div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group'><span class='input-group-addon'><i class='fas fa-calendar-alt'></i></span><input type='text' class='form-control' id='Indicaciones' name='indicaciones[]' placeholder=' Indicaciones, ejemplo: 2 Tabletas Cada 8 Horas Por 5 Días'></div></div></div>";
            $("#btnAgregar").on("click", function() {
                $("#final").before(medForm);
                if ($(".btnElimina").size() > 1) {
                    $(".btnElimina").each(function() {
                        $(this).show();
                    });
                }
                $(".med").last().slideDown();
            });
            $("body").on("click", ".btnElimina", function(e) {
                $($($(e.target)).parents(".fila")[0]).slideUp(function() {
                    $(this).remove();
                    if ($(".btnElimina").size() <= 1) {
                        $(".btnElimina").each(function() {
                            $(this).hide();
                        });
                    }
                });
            });
            $("body").on("click", function() {
                $("div").filter("#suggestions").slideUp()
            });
            $("body").on('keyup', '#key', function() {
                var temp = $(this);
                var key = $(this).val();
                var dataString = 'key=' + key;
                $.ajax({
                    type: "POST",
                    url: "buscarMedicina.php",
                    data: dataString,
                    success: function(data) {
                        //Escribimos las sugerencias que nos manda la consulta
                        $(temp).next().slideDown(500).html(data);
                        //Al hacer click en alguna de las sugerencias
                        $('.suggest-element').on('click', function() {
                            //Obtenemos la id unica de la sugerencia pulsada
                            var medicamento = $(this).html();
                            $(temp).next().slideUp(500);
                            $(temp).val(medicamento);
                            return false;
                        });
                    }
                });
            });
            $(document).ready(function() {
                $(".loader").fadeOut();
            });
        </script>
        <script>
            $("#f").submit(function(event) {
                event.preventDefault();
                var post_url = $(this).attr("action");
                var request_method = $(this).attr("method");
                var form_data = $(this).serialize();
                $.ajax({
                    url: post_url,
                    type: request_method,
                    data: form_data,
                    beforeSend: function() {
                        $(".loader").fadeIn();
                        $("button").attr("disabled", true);
                    },
                    success: function(result) {
                        console.log(result);
                        //if(result === "no_errors"){
                        if (!result.includes("error")) {
                            location.href = "./tratamientoc/app/reportes/receta.php?id_paciente=<?php echo $id_paciente; ?>";
                        }
                        //}
                    }
                });
            });
        </script>
    </body>

    </html>
<?php
} else {
    header('Location: ../index.php');
    exit;
}
?>