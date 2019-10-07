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
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <a href="#"><img src="../img/logo/LOGO-BLANCO.png" width="130" height="100" /></a>

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

            include('menu.php');

            if ($rol == 'Medico' || $rol == 'Supervisor' || $rol == 'Patologo') {


                ?>
            <div class="breadcomb-area">
                <div class="container">
                    <div class="fila">
                        <div class="row">
                            <div style="text-align:center;color: #ed80a8;">
                                <i class="fas fa-user-md fa-4x"></i>
                                <h2 style="margin-top:10px;">Receta Médica</h2>
                                <p style="color:#000">
                                    Emitida por <b><?php echo $_SESSION['nombre_usuario'] . " " . $_SESSION['apellidos_usuario']; ?></b>
                                </p>
                            </div>
                        </div>
                    </div>
                    <form>
                        <hr>
                        <div class="fila med">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-prescription-bottle-alt"></i>
                                    </span>
                                    <input type="email" class="form-control" id="Medicamento" placeholder="Medicamento, ejemplo: Paracetamol">
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
                                    <input type="email" class="form-control" id="Indicaciones" placeholder=" Indicaciones, ejemplo: 2 Tabletas Cada 8 Horas Por 5 Días">
                                </div>
                            </div>
                        </div>
                        <div id="final">
                        </div>
                        <hr>
                        <div class="row fila" style="text-align:center">
                            <i id="btnAgregar" class="fas fa-plus-circle fa-3x" style="color: #ed80a8;"></i>
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
            var medForm = "<div class='fila med' style='display:none;'><div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group'><span class='input-group-addon'><i class='fas fa-prescription-bottle-alt'></i></span><input type='email' class='form-control' id='Medicamento' placeholder='Medicamento, ejemplo: Paracetamol'><span class='input-group-addon btnElimina' style='" + ($(".btnElimina").size() > 1 ? "display:none;" : "" ) + "color:indigo;' class='input-group-addon'><i class='fas fa-times-circle'></i></span></div></div><div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group'><span class='input-group-addon'><i class='fas fa-calendar-alt'></i></span><input type='email' class='form-control' id='Indicaciones' placeholder=' Indicaciones, ejemplo: 2 Tabletas Cada 8 Horas Por 5 Días'></div></div></div>";
            $("#btnAgregar").on("click", function() {
                $("#final").before(medForm);
                $(".med").last().slideDown(function(){
                    if ($(".btnElimina").size() > 1) {
                        $(".btnElimina").each( function(){
                            $(this).show();
                        });
                    }
                });
            });

            $("body").on("click",".btnElimina", function(e) {
                $($($(e.target)).parents(".fila")[0]).slideUp(function(){
                    $(this).remove(); 
                    if ($(".btnElimina").size() <= 1) {
                        $(".btnElimina").each( function(){
                                $(this).hide();
                            });
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