<?php session_start();  setlocale(LC_TIME, 'es_ES', 'esp_esp');?>
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
    <?php include('css.php');  ?>


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
                include('menu.php');
                ?>
            <div class="breadcomb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcomb-list">
                                <div class="row">


                                    <!----------- ----------->
                            <?php
                                    if (isset($_GET['nombre'])) {
                                        if ($_GET['nombre']) {
                                            $nombre = $_GET['nombre'];
                                            //imprimes el error
                                            echo " <div class='alert-list'>
                                                        <div class='alert alert-success alert-dismissible' role='alert'>
                                                            <button type='button' class='close' data-dismiss='alert'
                                                            aria-label='Close'><span aria-hidden='true'>
                                                            <i class='notika-icon notika-close'></i></span>
                                                            </button>
                                                                    Se dio de alta el paciente  $nombre
                                                        </div>
                                                    </div>";
                                        }
                                    }

                                    if (isset($_GET['nombres'])) {
                                        if ($_GET['nombres']) {
                                            $nombres = $_GET['nombres'];
                                            //imprimes el error
                                            echo "  <div class='alert-list'>
                                                        <div class='alert alert-danger alert-dismissible' role='alert'>
                                                        <button type='button' class='close' data-dismiss='alert'
                                                        aria-label='Close'><span aria-hidden='true'>
                                                        <i class='notika-icon notika-close'></i></span>
                                                        </button>
                                                                    Usuario Existente $nombres
                                                        </div>
                                                    </div>";
                                        }
                                    }
                                }

                                //En este apartado se hace la precarga de datos si se recibe el id_paciente dentro del GET

                                    $id_paciente = $_GET['id_paciente'];
                                    $query = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente='$id_paciente'");
                                    $resultado = mysqli_fetch_assoc($query);




                                    $nombre_paciente = ucwords($resultado['nombre_paciente']);
                                    $apellidos_paciente = ucwords($resultado['apellidos_paciente']);
                                    $fecha_nacimiento_paciente = $resultado['fecha_nacimiento_paciente'];
                                    $estado_civil = $resultado['estado_civil'];
                                    $fecha_creacion = $resultado['fecha_creacion'];
                                    $codigo_postal = $resultado['codigo_postal'];
                                    $direccion_paciente = $resultado['direccion_paciente'];
                                    $municipio_paciente = $resultado['municipio_paciente'];
                                    $ingreso_mensual = $resultado['ingreso_mensual'];
                                    $escolaridad_paciente = $resultado['escolaridad_paciente'];
                                    $apoyo_gubernamental_paciente = $resultado['apoyo_gubernamental_paciente'];
                                    $razon_apoyo_paciente = $resultado['razon_apoyo_paciente'];
                                    $nombre_familiar_paciente = $resultado['nombre_familiar_paciente'];
                                    $telefono_familiar_paciente = $resultado['telefono_familiar_paciente'];
                                    $celular_familiar_paciente = $resultado['celular_familiar_paciente'];
                                    $nombre_contacto_paciente = $resultado['nombre_contacto_paciente'];
                                    $telefono_contacto_paciente = $resultado['telefono_contacto_paciente'];
                                    $celular_contacto_paciente = $resultado['celular_contacto_paciente'];

                                    $fe = date("d.M.Y", strtotime($fecha_nacimiento_paciente));
                                    $inicio = strftime("%d de %B del %Y", strtotime($fe));





                            }
                            ?>

                            <!----------- ----------->
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-form"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Editar Paciente</h2>
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
            <!-- Form Element area Start-->

                    <!-- Breadcomb area End-->
                    <!-- Form Element area Start-->
                    <form id="tuformulario" name="tuformulario" action="guardar_editar_paciente.php" method="GET" onsubmit="pregunta()">
                      <input type="hidden" name="id_paciente" id="id_paciente" class="form-control"  value="<?php echo ($id_paciente); ?>" required>

                        <div class="form-element-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-element-list">
                                            <div class="basic-tb-hd">
                                                <h2 class="cabecera-morada">Datos Generales Del Paciente</h2>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="customFontAwesome">
                                                            <i class="far fa-user"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" name="nombre_paciente" id="nombre_paciente" class="form-control" placeholder="Nombres del paciente" value="<?php echo ($nombre_paciente); ?>" required>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div style="padding: 0px 20px 10px 39px;">
                                                        <div class="nk-int-st">
                                                            <input type="text" name="apellidos_paciente" id="apellidos_paciente" class="form-control" placeholder="Apellidos Del Paciente" value="<?php echo ($apellidos_paciente); ?>" required>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-calendar"></i>
                                                        </div>
                                                        <div class="input-group date nk-int-st">
                                                            <span class="input-group-addon" style="border: 0px;"></span>
                                                            <input type="text" class="form-control" name="edad_paciente" placeholder="Ingresa Fecha de Nacimiento" value="<?php echo $inicio ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-promos"></i>
                                                        </div>
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select name="estado_civil" class="selectpicker" required>
                                                                <option value="">Selecciona Estado Civil</option>
                                                                <option value="Soltera" <?php if (strtolower($estado_civil) === "soltera") {
                                                                                            echo (" selected");
                                                                                        } ?>>Soltera</option>
                                                                <option value="Casada" <?php if (strtolower($estado_civil) === "casada") {
                                                                                            echo (" selected");
                                                                                        } ?>>Casada</option>
                                                                <option value="Divorciada" <?php if (strtolower($estado_civil) === "divorciada") {
                                                                                                echo (" selected");
                                                                                            } ?>>Divorciada</option>
                                                                <option value="Viuda" <?php if (strtolower($estado_civil) === "viuda") {
                                                                                            echo (" selected");
                                                                                        } ?>>Viuda</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-house"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" name="direccion_paciente" class="form-control" placeholder="Dirección Paciente" value="<?php echo ($direccion_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-map"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" name="municipio_paciente" class="form-control" placeholder="Municipio" value="<?php echo ($municipio_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-star"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" name="codigo_postal" class="form-control" data-mask="99999" placeholder="Código Postal" value="<?php echo ($codigo_postal); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="form-ic-cmp">
                                                            <i class="glyphicon glyphicon-usd" style="color: #888;"></i>
                                                        </div>
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select name="ingresomensual" class="selectpicker" >
                                                                <option value="">El anterior Ingreso Mensual Fue:<?php echo $ingreso_mensual?></option>
                                                                <option value="Menos de $2,000" <?php if (strtolower($ingreso_mensual) == "menos de $2,000") {
                                                                                                    echo (" selected");
                                                                                                } ?>>Menos de $2,000</option>
                                                                <option value="Entre $2,000 y $6,000" <?php if (strtolower($ingreso_mensual) == "entre $2,000 y $6,000") {
                                                                                                            echo (" selected");
                                                                                                        } ?>>Entre $2,001 y $6,000</option>
                                                                <option value="Entre $6,001 y $12,000" <?php if (strtolower($ingreso_mensual) == "entre $6,001 y $12,000") {
                                                                                                            echo (" selected");
                                                                                                        } ?>>Entre $6,001 y $12,000</option>
                                                                <option value="Entre $12,001 y $18,000" <?php if (strtolower($ingreso_mensual) == "entre $12,001 y $18,000") {
                                                                                                            echo (" selected");
                                                                                                        } ?>>Entre $12,001 y $18,000</option>
                                                                <option value="Entre $18,001 y $23,000" <?php if (strtolower($ingreso_mensual) == "entre $18,001 y $23,000") {
                                                                                                            echo (" selected");
                                                                                                        } ?>>Entre $18,001 y $23,000</option>
                                                                <option value="Más de $23,001" <?php if (strtolower($ingreso_mensual) == "más de $23,001") {
                                                                                                    echo (" selected");
                                                                                                } ?>>Más de $23,001</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="customFontAwesome">
                                                            <i class="fas fa-graduation-cap"></i>
                                                        </div>
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select name="escolaridad_paciente" class="selectpicker" required>
                                                                <option value="">Selecciona Grado de Escolaridad</option>
                                                                <option value="sin estudios" <?php if (strtolower($escolaridad_paciente) == "sin estudios") {
                                                                                                    echo (" selected");
                                                                                                } ?>>Sin estudios</option>
                                                                <option value="primaria" <?php if (strtolower($escolaridad_paciente) == "primaria") {
                                                                                                echo (" selected");
                                                                                            } ?>>Primaria</option>
                                                                <option value="secundaria" <?php if (strtolower($escolaridad_paciente) == "secundaria") {
                                                                                                echo (" selected");
                                                                                            } ?>>Secundaria</option>
                                                                <option value="preparatoria" <?php if (strtolower($escolaridad_paciente) == "preparatoria") {
                                                                                                    echo (" selected");
                                                                                                } ?>>Preparatoria</option>
                                                                <option value="universidad" <?php if (strtolower($escolaridad_paciente) == "universidad") {
                                                                                                echo (" selected");
                                                                                            } ?>>Universidad</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="customFontAwesome">
                                                            <i class="fas fa-user-shield"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <p>Selecciona el tipo de seguro</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group ic-cmp-int">
<?php


   // Variable $row hold the result of the query
   $comnsultaBETWEENClientescreados = "  SELECT t.nombre_seguro as n ,t.id_seguro as s,s.id_tipo_seguro_paciente as i FROM seguros AS T LEFT JOIN tipo_seguro AS s ON s.id_seguro=t.id_seguro AND id_paciente='$id_paciente'";
   $resultBETWEENClientescreados = $mysqliL->query($comnsultaBETWEENClientescreados);


//echo $comnsultaBETWEENClientescreados;
while($rowBETWEENClientescreados= $resultBETWEENClientescreados->fetch_assoc()) {

$nombre_seguro = $rowBETWEENClientescreados['n'];
$id_seguro = $rowBETWEENClientescreados['s'];
$id_tipo_seguro_paciente = $rowBETWEENClientescreados['i'];


if($id_tipo_seguro_paciente!=''){

 ?>

                                                        <label class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><input type="checkbox" name="tipo_seguro[]"  value="<?php echo  $id_seguro?>" checked> <?php echo  $nombre_seguro?> </label>

<?php

}else{

?>
<label class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><input type="checkbox"   name="tipo_seguro[]" value="<?php echo  $id_seguro?>"> <?php echo  $nombre_seguro?> </label>
  <?php
}

}?>

                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="customFontAwesome">
                                                            <i class="fas fa-question"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input id="otro_tipo_seguro" name='otro_tipo_seguro' type="text" class="form-control" placeholder="Otro Tipo de Seguro?" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="customFontAwesome">
                                                            <i class="fas fa-tag"></i>
                                                        </div>
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select name='apoyo_gubernamental_paciente' id='apoyo_gubernamental_paciente' class="selectpicker" required>
                                                                <option value="">¿Apoyo gubernamental?</option>
                                                                <option value="1" <?php if (strtolower($apoyo_gubernamental_paciente) == "1") {
                                                                                        echo (" selected");
                                                                                    } ?>>Si</option>
                                                                <option value="0" <?php if (strtolower($apoyo_gubernamental_paciente) == "0") {
                                                                                        echo (" selected");
                                                                                    } ?>>No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int" id="data_3">
                                                        <div class="customFontAwesome">
                                                            <i class="fas fa-question"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input id="apoyo_gubernamental" name='razon_apoyo_paciente' type="text" class="form-control" placeholder="¿Cúal?" value="<?php echo ($razon_apoyo_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-element-list mg-t-30">
                                            <div class="cmp-tb-hd">
                                                <h2 class="cabecera-morada">DATOS DE FAMILAIR / CONTACTO</h2>

                                            </div>
                                            <div class="row" style="margin-bottom:15px;padding-bottom:15px;;border-bottom: 1px solid #ddd;">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-support"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" name="nombre_familiar_paciente" class="form-control" placeholder="Nombre de Contacto #1" value="<?php echo ($nombre_familiar_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-phone"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input name='telefono_familiar_paciente' type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Telefono de Casa de Contacto #1"  value="<?php echo ($telefono_familiar_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-phone"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input name='celular_familiar_paciente' type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Numero Celular de Contacto #1"  value="<?php echo ($celular_familiar_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group ic-cmp-int float-lb floating-lb">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-support"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input type="text" name="nombre_contacto_paciente" class="form-control" placeholder="Nombre de Contacto #2" value="<?php echo ($nombre_contacto_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-phone"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input name='telefono_contacto_paciente' type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Telefono de Casa de Contacto #2" value="<?php echo ($telefono_contacto_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <div class="form-group ic-cmp-int">
                                                        <div class="form-ic-cmp">
                                                            <i class="notika-icon notika-phone"></i>
                                                        </div>
                                                        <div class="nk-int-st">
                                                            <input name='celular_contacto_paciente' type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Numero Celular de Contacto #2" value="<?php echo ($celular_contacto_paciente); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <center>  <input class="btn notika-btn-purble" type="submit" value="Editar Paciente" style="float:center;margin: 10px 0;background: #a25cbf;color: white;"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </form>

            <?php
            include('pie.php');
            ?>

            <script language="JavaScript">
                function pregunta() {
                    if (confirm('¿Estas seguro de enviar este formulario?')) {
                        document.tuformulario.submit()
                    }
                }
            </script>

            <script src="../js/vendor/jquery-1.12.4.min.js"></script>
            <!-- bootstrap JS
============================================ -->
            <script src="../js/bootstrap.min.js"></script>
            <!-- wow JS
============================================ -->
            <script src="../js/wow.min.js"></script>
            <!-- price-slider JS
============================================ -->
            <script src="../js/jquery-price-slider.js"></script>
            <!-- owl.carousel JS
============================================ -->
            <script src="../js/owl.carousel.min.js"></script>
            <!-- scrollUp JS
============================================ -->
            <script src="../js/jquery.scrollUp.min.js"></script>
            <!-- meanmenu JS
============================================ -->
            <script src="../js/meanmenu/jquery.meanmenu.js"></script>
            <!-- counterup JS
============================================ -->
            <script src="../js/counterup/jquery.counterup.min.js"></script>
            <script src="../js/counterup/waypoints.min.js"></script>
            <script src="../js/counterup/counterup-active.js"></script>
            <!-- mCustomScrollbar JS
============================================ -->
            <script src="../js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
            <!-- sparkline JS
============================================ -->
            <script src="../js/sparkline/jquery.sparkline.min.js"></script>
            <script src="../js/sparkline/sparkline-active.js"></script>
            <!-- flot JS
============================================ -->
            <script src="../js/flot/jquery.flot.js"></script>
            <script src="../js/flot/jquery.flot.resize.js"></script>
            <script src="../js/flot/flot-active.js"></script>

            <!-- knob JS
============================================ -->
            <script src="../js/knob/jquery.knob.js"></script>
            <script src="../js/knob/jquery.appear.js"></script>
            <script src="../js/knob/knob-active.js"></script>

            <!-- Input Mask JS
============================================ -->
            <script src="../js/jasny-bootstrap.min.js"></script>
            <!-- icheck JS
============================================ -->
            <script src="../js/icheck/icheck.min.js"></script>
            <script src="../js/icheck/icheck-active.js"></script>
            <!--  Chat JS
============================================ -->

            <!--  todo JS
============================================ -->
            <script src="../js/todo/jquery.todo.js"></script>
            <!-- icheck JS
============================================ -->
            <script src="../js/icheck/icheck.min.js"></script>
            <script src="../js/icheck/icheck-active.js"></script>
            <!-- rangle-slider JS
============================================ -->
            <script src="../js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
            <script src="../js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
            <script src="../js/rangle-slider/rangle-active.js"></script>
            <!-- datapicker JS
============================================ -->
            <script src="../js/datapicker/bootstrap-datepicker.js"></script>
            <script src="../js/datapicker/datepicker-active.js"></script>
            <!-- bootstrap select JS
============================================ -->
            <script src="../js/bootstrap-select/bootstrap-select.js"></script>
            <!--  color-picker JS
============================================ -->
            <script src="../js/color-picker/farbtastic.min.js"></script>
            <script src="../js/color-picker/color-picker.js"></script>
            <!--  notification JS
============================================ -->
            <script src="../js/notification/bootstrap-growl.min.js"></script>
            <script src="../js/notification/notification-active.js"></script>
            <!--  summernote JS
============================================ -->
            <script src="../js/summernote/summernote-updated.min.js"></script>
            <script src="../js/summernote/summernote-active.js"></script>
            <!-- dropzone JS
============================================ -->
            <script src="../js/dropzone/dropzone.js"></script>
            <!--  chosen JS
============================================ -->
            <script src="../js/chosen/chosen.jquery.js"></script>
            <script src="../js/main.js"></script>
            <!--  todo JS
============================================ -->

            <!-- autosize JS
============================================ -->
            <script src="../js/autosize.min.js"></script>
            <!-- plugins JS
============================================ -->
            <script src="../js/plugins.js"></script>
            <!-- and drop JS
============================================ -->
            

            
            
            <!-- main JS
============================================ -->
            <script src="../js/main.js"></script>
</body>

</html>
