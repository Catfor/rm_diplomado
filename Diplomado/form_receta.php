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

            .input-group-addon{
                min-width: 38px;
            }

            div.input-group{
                margin-bottom: 5px ;
            }
        </style>
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="#"><img src="../img/logo/LOGO-BLANCO.png" height="100" /></a>

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

            $result123 = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente=$id_paciente");

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
                            location.href = "./tratamientoc/app/reportes/receta.php?id_paciente=<?php echo $id_paciente ;?>";
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