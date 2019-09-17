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
                        <a href="Sistema.php"><img src="../img/logo/LOGO-BLANCO.png" width="100" height="100" /></a>

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



            <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <!-- Start Header Top Area -->

            <!-- End Header Top Area -->
            <!-- Mobile Menu start -->
            <?php

                    include('menu.php');
                    ?>
            <!-- Main Menu area End-->
            <!-- Breadcomb area Start-->
            <div class="breadcomb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcomb-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcomb-wp">
                                            <div class="breadcomb-icon">
                                                <i class="notika-icon notika-support"></i>
                                            </div>
                                            <div class="breadcomb-ctn">
                                                <h2>Inicio</h2>
                                                <p>Bienvenido a Diplomado <span class="bread-ntd">Reina Madre</span></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcomb area End-->
            <!-- Contact area Start-->

            <div class="contact-area">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-15 col-md-6 col-sm-6 col-xs-12">
                            <div class="contact-list">
                                <div class="contact-win">
                                    <div class="contact-img">


                                        <img src="../img/user/logo.png" width="250" height="150" />
                                    </div>

                                    <div class="conct-sc-ic">


                                    </div>
                                </div>

                                <div class="social-st-list">
                                    <div class="social-sn">
                                        <h2>Nombre:</h2>
                                        <p><?php echo $nombre_usuario . ' ' . $apellidos_usuario ?></p>
                                    </div>
                                    <div class="social-sn">
                                        <h2>Correo:</h2>
                                        <p><?php echo $correo_general ?></p>
                                    </div>
                                    <div class="social-sn">
                                        <h2>Rol:</h2>
                                        <p><?php echo $rol ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            <!-- Contact area End-->
            <!-- Start Footer area--><br><br><br><br><br>
            <?php
                    include('pie.php');
                    ?>


</body>

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
