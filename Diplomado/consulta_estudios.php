<?php session_start();
error_reporting(0);
    setlocale(LC_ALL, 'es_ES.UTF-8');
    date_default_timezone_set('America/Mexico_City');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

  $hoys = date("Y-m-d");
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

$op=$_GET['op'];
        if($rol=='Medico' or $op=='1'){
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
                                    <h2>Pacientes Registrados Medicos</h2>
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

                                    <th>Fecha de Nacimiento</th>
                                    <th>ID de Atencion</th>
                                    <th>Colposcopia</th>
                                    <th>Papanicolau/Biopsias</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                        $consultasemanas = "SELECT DISTINCT ct.id_atencion as i,p.id_paciente ,p.id_paciente as p, 	p.nombre_paciente, 	p.apellidos_paciente, 	ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion, 	p.fecha_nacimiento_paciente, 	p.edad_paciente FROM 	paciente p right JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente WHERE  ct.id_usuario='$id'";
                                        $resultadosemanas = $mysqliL->query($consultasemanas);

                                        while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                            $id_paciente = ucwords($resultadosemanas1['id_paciente']);
                                            $nombre_paciente = ucwords(strtolower($resultadosemanas1['nombre_paciente']));
                                            $apellidos_paciente = ucwords(strtolower($resultadosemanas1['apellidos_paciente']));
                                            $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                            $edad_paciente = $resultadosemanas1['edad_paciente'];
                                            $id_atencion = $resultadosemanas1['id_atencion'];
  $p = $resultadosemanas1['p'];
    $i = $resultadosemanas1['i'];
                                            echo "  <tr>
                                                                    <td>$nombre_paciente $apellidos_paciente </td>

                                                                    <td>$fecha_nacimiento_paciente</td>
                                                                    <td><a href='editar_atencion_medica.php?id_paciente=$id_paciente&id_atencion=$i'  target='_blank'>$id_atencion</a></td>";


                                            //Colposcopia
                                            echo "<td>";
                                            $queryColposcopia = "select 	e.id_estudio,c.id_atencion from 	estudio_colposcopico e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio  and c.id_atencion=$i	and c.id_tipo_estudio = 1 	and c.id_paciente = $id_paciente ;";
                                            if ($resultSetColposcopia = $mysqliL->query($queryColposcopia)) {
                                                while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                      $id_atencion1 = $resultSet['id_atencion'];
                                                    echo "<a href='pdfcolpos/reportes/index.php?id_paciente=$id_paciente&id_atencion=$id_atencion1&id_estudio=$id_estudio'  target='_blank'>Ver Colposcopia</a>";

                                                }
                                            }
                                            echo "</td>";
                                            echo "<td>";
                                            //Papanicolaou
                                            $queryPapanicolaou = "SELECT 	c.id_paciente from 	ctrl_paciente_estudios c WHERE  c.id_paciente = $id_paciente; ";
                                            if ($resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou)) {
                                                echo "<a href='Etiquetas/etiquetas_estudios.php?id_paciente=$id_paciente' target='_blank'>Ver </a>";
                                            }
                                            echo "</td>";
/*
                                            //BIOPSIAS =============
                                            echo "<td>";
                                            //Vulvoscopia
                                            $queryVulvoscopia = "select 	e.id_estudio from 	estudio_vulvoscopia e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 6 	and c.id_paciente = $id_paciente;";
                                            if ($resultSetVulvoscopia = $mysqliL->query($queryVulvoscopia)) {
                                                while ($resultSet = $resultSetVulvoscopia->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<div><a href='Etiquetas/etiqueta_estudio_vulva.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Ver Vulvoscopia</a></div>";
                                                }
                                            }

                                            //Vaginoscopia
                                            $queryVaginoscopia = "select 	e.id_estudio from 	estudio_vaginoscopia e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 5 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetVaginoscopia = $mysqliL->query($queryVaginoscopia)) {
                                                while ($resultSet = $resultSetVaginoscopia->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<div><a href='Etiquetas/etiqueta_estudio_vaginoscopia.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Ver Vaginoscopia</a></div>";
                                                }
                                            }

                                            //Cervix
                                            $queryCervix = "select 	e.id_estudio from 	estudio_biopsia_cervix e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 2 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetCervix = $mysqliL->query($queryCervix)) {
                                                while ($resultSet = $resultSetCervix->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<div><a href='Etiquetas/etiqueta_estudio_cervix.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Ver Cervix</a></div>";
                                                }
                                            }

                                            //Endometrio
                                            $queryEndometrio = "select 	e.id_estudio from 	estudio_biopsia_endometrio e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 4 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetEndometrio = $mysqliL->query($queryEndometrio)) {
                                                while ($resultSet = $resultSetEndometrio->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<div><a href='Etiquetas/etiqueta_estudio_endometrio.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Ver Endometrio</a></div>";
                                                }
                                            }

                                            echo "</td>";
*/
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
<?php
}else if($rol=='Supervisor' or $op=='2'){


 ?>
 <?php
 if (isset($_GET['error'])) {




   if ($_GET['error'] == 4) {
     //imprimes el error
     echo '

     <div class="alert alert-danger" role="alert">
     No coincide el Usuario
     </div>

         ';
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
                                     <h2>Seleccionar Patologo</h2>
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
                       <form action="accesos.php" method="">
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="nk-int-mk sl-dp-mn">
                           <h6>Selecciona Patologa</h6>
                           </div>
                           <select id='patologo' class="form-control" name="patologo" required>
                                  <option value="">Selecciona Patologo...</option>
                                                      <?php
                                                      $consultapatologa = "SELECT id_usuario,nombre_usuario,apellidos_usuario,rol FROM usu_me where rol='Patologo' ";
                                                      $resultadopato = $mysqliL->query($consultapatologa);

                                                      while ($rowpato = $resultadopato->fetch_assoc()) {
                                                        $nombre_usuario = ucwords($rowpato['nombre_usuario']);
                                                         $rol = ucwords($rowpato['rol']);
                                                          $apellidos_usuario = ucwords($rowpato['apellidos_usuario']);
                                                            $id_usuario = $rowpato['id_usuario'];

                           ?>


                                                        <option  value="<?php echo $id_usuario ?>"><?php echo $nombre_usuario.' '.$apellidos_usuario.'/'.$rol?></option>


                                                       <?php
                           }
                           ?></select>

                       </div>
<br><br><br><br><br>
                         <table id="data-table-basic" class="table table-striped">
                             <thead>
                                 <tr>

                                     <th>Nombre</th>
                                     <th>Asignacion</th>

                                     <th>ID de Atencion</th>
                                     <th>Colposcopia</th>

                                     <th>Papanicolau</th>

                                     <th>Biopsias</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php

                                         $consultasemanas = "SELECT DISTINCT ct.id_atencion as i,ct.id_estudio,ct.estatus_supervisor,ct.id_usu_pat,p.id_paciente,
p.nombre_paciente, 	p.apellidos_paciente,
IFNULL(LPAD(ct.id_atencion,4,'0000'),'-') AS id_atencion,
	p.fecha_nacimiento_paciente, 	p.edad_paciente FROM
		paciente p LEFT JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente
WHERE id_estudio!=0 GROUP BY ct.id_estudio";
                                         $resultadosemanas = $mysqliL->query($consultasemanas);

                                         while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                             $id_paciente = ucwords($resultadosemanas1['id_paciente']);
                                             $nombre_paciente = ucwords(strtolower($resultadosemanas1['nombre_paciente']));
                                             $apellidos_paciente = ucwords(strtolower($resultadosemanas1['apellidos_paciente']));
                                             $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                             $edad_paciente = $resultadosemanas1['edad_paciente'];
                                             $id_atencion = $resultadosemanas1['id_atencion'];
                                             $id_usu_pat = $resultadosemanas1['id_usu_pat'];
                                            $estatus1 = $resultadosemanas1['estatus_supervisor'];
                                            $ii = $resultadosemanas1['i'];


                                             echo "

                                                                     <td>$nombre_paciente<br>$apellidos_paciente </td>
                                                                     <td>$edad_paciente</td>

                                                                     <td>$id_atencion</td>";


                                             //Colposcopia
                                             echo "<td>";
                                             $queryColposcopia = "SELECT c.id_paciente AS paciente ,c.id_atencion atencion,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio
                                              from 	estudio_colposcopico e inner join ctrl_paciente_estudios c on
                                             	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 1 	and c.id_paciente = $id_paciente  and c.id_atencion=$id_atencion;";
                                             if ($resultSetColposcopia = $mysqliL->query($queryColposcopia)) {
                                                 while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
                                                     $pacientepa = $resultSet['paciente'];
                                                     $atencionpa = $resultSet['atencion'];
                                                     $estudiopa= $resultSet['estudio'];
                                                     $tipo_estudiopa = $resultSet['tipo_estudio'];
                                                     echo "<a href='pdfcolpos/reportes/index.php?id_paciente=$pacientepa&id_atencion=$atencionpa&id_estudio=$estudiopa'  target='_blank'>Ver Colposcopia</a>";

                                                 }
                                             }
                                             echo "</td>";
                                             echo "<td>";
                                             //Papanicolaou
$queryPapanicolaou = "SELECT c.id_paciente AS paciente ,c.id_atencion atencion,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio,c.id_usu_pat AS asignacion
 FROM estudio_papanicolau e
INNER JOIN ctrl_paciente_estudios c ON
e.id_estudio = c.id_estudio 	AND c.id_tipo_estudio = 7 	AND c.id_paciente =  $id_paciente; ";
                                             if ($resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou)) {
                                                 while ($resultpaps = $resultSetPapanicolaou->fetch_assoc()) {
                                                     $paciente = $resultpaps['paciente'];
                                                      $atencion = $resultpaps['atencion'];
                                                      $estudio = $resultpaps['estudio'];
                                                       $tipo_estudio = $resultpaps['tipo_estudio'];
$asignacion= $resultpaps['asignacion'];
if($asignacion==0){
                                                     echo "<input  type='checkbox' name='paps[]' value='$atencion'> <a href='Etiquetas/etiqueta_estudio_papanicolaou.php?id_paciente=$paciente&atencion=$atencion&id_estudio=$estudio&tipo_estudio=$tipo_estudio'
                                                      target='_blank'>Papanicolau</a> ";
                                                   }else{


                                                     echo "<a href='Etiquetas/etiqueta_estudio_papanicolaou.php?id_paciente=$paciente&atencion=$atencion&id_estudio=$estudio&tipo_estudio=$tipo_estudio'
                                                      target='_blank'>solo ver Papanicolau</a>";
                                                      }
                                                 }
                                             }
                                             echo "</td>";

                                             //BIOPSIAS =============
                                             echo "<td>";
                                             //Vulvoscopia
                                             $queryVulvoscopia = "SELECT 	c.id_paciente AS paciente ,c.id_atencion atencion,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio,c.id_usu_pat AS asignacion
 FROM 	estudio_vulvoscopia e INNER JOIN ctrl_paciente_estudios c
  ON    e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 6 	and c.id_paciente = $id_paciente;";
                                             if ($resultSetVulvoscopia = $mysqliL->query($queryVulvoscopia)) {
                                                 while ($resultSetvulvo = $resultSetVulvoscopia->fetch_assoc()) {
                                                     $pacientev = $resultSetvulvo['paciente'];
                                                     $atencionv = $resultSetvulvo['atencion'];
                                                     $id_tipo_estudiov = $resultSetvulvo['tipo_estudio'];
                                                     $estudiov = $resultSetvulvo['estudio'];
                                                     $asignacionv= $resultSetvulvo['asignacion'];

if($asignacionv==0){


                                                     echo "<input  type='checkbox'  name='vulva[]' value='$atencionv'><a href='Etiquetas/etiqueta_estudio_vulva.php?id_paciente=$pacientev&atencion=$atencionv&id_estudio=$estudiov&tipo_estudio=$id_tipo_estudiov&idusuario=$id' target='_blank'>Vulvo</a><br>";
}else{
  echo "<div><a href='Etiquetas/etiqueta_estudio_vulva.php?id_paciente=$pacientev&atencion=$atencionv&id_estudio=$estudiov&tipo_estudio=$id_tipo_estudiov' target='_blank'>Solo ver Vulvo</a></div>";

}
                                                 }

                                             }

                                             //Vaginoscopia
                                             $queryVaginoscopia = "SELECT 	c.id_paciente AS paciente ,c.id_atencion atencion,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio,c.id_usu_pat AS asignacion
 FROM 	estudio_vaginoscopia e INNER JOIN ctrl_paciente_estudios c
  ON    e.id_estudio = c.id_estudio	and c.id_tipo_estudio = 5 	and c.id_paciente = $id_paciente; ";
                                             if ($resultSetVaginoscopia = $mysqliL->query($queryVaginoscopia)) {
                                                 while ($resultSet = $resultSetVaginoscopia->fetch_assoc()) {
                                                     $pacienteva = $resultSet['paciente'];
                                                      $atencionva = $resultSet['atencion'];
                                                      $estudiova = $resultSet['estudio'];
                                                       $tipo_estudiova = $resultSet['tipo_estudio'];
                                                          $asignacionvaf= $resultSet['asignacion'];
if($asignacionvaf==0){
 echo " <input  type='checkbox'  name='vagi[]' value='$atencionva'> <a href='Etiquetas/etiqueta_estudio_vaginoscopia.php?id_paciente=$pacienteva&atencion=$atencionva&id_estudio=$estudiova&tipo_estudio=$tipo_estudiova' target='_blank'>Vagins</a><br>";
}else{
   echo "<div><a href='Etiquetas/etiqueta_estudio_vaginoscopia.php?id_paciente=$pacienteva&atencion=$atencionva&id_estudio=$estudiova&tipo_estudio=$tipo_estudiova' target='_blank'>solo ver Vagina</a></div>";
}
                                                 }
                                             }

                                             //Cervix
                                             $queryCervix = "SELECT 	c.id_paciente AS paciente ,c.id_atencion atencion,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio,c.id_usu_pat AS asignacion
 FROM 	estudio_biopsia_cervix e INNER JOIN ctrl_paciente_estudios c
  ON    e.id_estudio = c.id_estudio	 	and c.id_tipo_estudio = 2 	and c.id_paciente = $id_paciente; ";
                                             if ($resultSetCervix = $mysqliL->query($queryCervix)) {
                                                 while ($resultSet = $resultSetCervix->fetch_assoc()) {
                                                     $pacientec = $resultSet['paciente'];
                                                     $atencionc = $resultSet['atencion'];
                                                     $estudioc = $resultSet['estudio'];
                                                     $tipo_estudioc = $resultSet['tipo_estudio'];
                                                      $asignacionc = $resultSet['asignacion'];
                                                      if($asignacionc==0){
 echo " <input  type='checkbox' name='cervix[]' value='$atencionc'><a href='Etiquetas/etiqueta_estudio_cervix.php?id_paciente=$pacientec&atencion=$atencionc&id_estudio=$estudioc&tipo_estudio=$tipo_estudioc' target='_blank'>Cervix</a><br>";
}else{
  echo "<div><a href='Etiquetas/etiqueta_estudio_cervix.php?id_paciente=$pacientec&atencion=$atencionc&id_estudio=$estudioc&tipo_estudio=$tipo_estudioc' target='_blank'>Solo Ver Cervix</a></div>";

}


                                                 }
                                             }

                                             //Endometrio
                                             $queryEndometrio = "SELECT c.id_paciente AS paciente ,c.id_atencion atencion,c.id_estudio AS estudio,c.id_tipo_estudio AS tipo_estudio,c.id_usu_pat AS asignacion
                                              from 	estudio_biopsia_endometrio e inner join
                                             ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 4 	and c.id_paciente = $id_paciente; ";
                                             if ($resultSetEndometrio = $mysqliL->query($queryEndometrio)) {
                                                 while ($resultSet = $resultSetEndometrio->fetch_assoc()) {
                                                   $pacientee = $resultSet['paciente'];
                                                   $atencione = $resultSet['atencion'];
                                                   $estudioe = $resultSet['estudio'];
                                                   $tipo_estudioe = $resultSet['tipo_estudio'];
                                                   $asignacione = $resultSet['asignacion'];
                                                   if($asignacione==0){
                                                     echo "<input  type='checkbox'  name='endo[]' value='$atencione'><a href='Etiquetas/etiqueta_estudio_endometrio.php?id_paciente=$pacientee&atencion=$atencione&id_estudio=$estudioe&tipo_estudio=$tipo_estudioe' target='_blank'>Endometrio</a>";
}else{
  echo "<div><a href='Etiquetas/etiqueta_estudio_endometrio.php?id_paciente=$pacientee&atencion=$atencione&id_estudio=$estudioe&tipo_estudio=$tipo_estudioe' target='_blank'>Solo Ver Endometrio</a></div>";

}
                                                 }
                                             }

                                             echo "</td>";

                                             //Termina la fila de la consulta de estudios
                                             echo "</tr>";

                                         }


                                         ?>
                             </tbody>
                         </table>
                         <center> <button type="submit" class="btn btn-primary">Enviar</button></center>
                       </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php
}else if($rol=='Patologo'){


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
                                      <h2> Patologo</h2>
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

                                      <th>Fecha de Nacimiento</th>
                                      <th>ID de Atencion</th>
                                      <th>Colposcopia</th>
                                      <th>Papanicolau</th>
<th>Biopsias</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php

                                          $consultasemanas = "SELECT DISTINCT ct.id_usu_pat,ct.id_atencion as i,p.id_paciente ,p.id_paciente as p, 	p.nombre_paciente, 	p.apellidos_paciente, 	ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion, 	p.fecha_nacimiento_paciente, 	p.edad_paciente FROM 	paciente p right JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente WHERE id_usu_pat='$id' ";
                                          $resultadosemanas = $mysqliL->query($consultasemanas);

                                          while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                              $id_paciente = ucwords($resultadosemanas1['id_paciente']);
                                              $nombre_paciente = ucwords($resultadosemanas1['nombre_paciente']);
                                              $apellidos_paciente = ucwords($resultadosemanas1['apellidos_paciente']);
                                              $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                              $edad_paciente = $resultadosemanas1['edad_paciente'];
                                              $id_atencion = $resultadosemanas1['id_atencion'];
    $p = $resultadosemanas1['p'];
      $i = $resultadosemanas1['i'];
                                              echo "  <tr>
                                                                      <td>$nombre_paciente $apellidos_paciente </td>

                                                                      <td>$fecha_nacimiento_paciente</td>
                                                                      <td>$id_atencion</td>";


                                              //Colposcopia
                                              echo "<td>";
                                              $queryColposcopia = "select 	e.id_estudio,c.id_atencion from 	estudio_colposcopico e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio  and c.id_atencion=$i	and c.id_tipo_estudio = 1 	and c.id_paciente = $id_paciente ;";
                                              if ($resultSetColposcopia = $mysqliL->query($queryColposcopia)) {
                                                  while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
                                                      $id_estudio = $resultSet['id_estudio'];
                                                        $id_atencion1 = $resultSet['id_atencion'];
                                                      echo "<a href='pdfcolpos/reportes/index.php?id_paciente=$id_paciente&id_atencion=$id_atencion1&id_estudio=$id_estudio'  target='_blank'>Ver Colposcopia</a>";

                                                  }
                                              }
                                              echo "</td>";
                                              echo "<td>";
                                              //Papanicolaou
                                              $queryPapanicolaou = "SELECT c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                                from 	estudio_papanicolau e inner join ctrl_paciente_estudios c on
                                                e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 7 	and c.id_paciente = '$id_paciente'  ";

                                              if ($resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou)) {
                                                  while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
                                                      $id_pacientepaps = $resultSet['id_paciente'];
                                                        $estatus_supervisor = $resultSet['estatus_supervisor'];
                                                            $estatus_patologo = $resultSet['estatus_patologo'];
                                                      $id_estudiopaps = $resultSet['id_estudio'];
                                                      $id_tipo_estudiopaps = $resultSet['id_tipo_estudio'];
                                                      $id_usuariopaps = $resultSet['id_usuario'];
                                                      $id_atencionpaps = $resultSet['id_atencion'];
                                                      $id_usu_patpaps = $resultSet['id_usu_pat'];
                                                      $clasificacion_medicopaps = $resultSet['clasificacion_medico'];
                                                      $id_usu_pat = $resultSet['id_usu_pat'];

                 if($estatus_patologo==0 and $estatus_supervisor==1 and $id_usu_pat==$id){



                                                      if($clasificacion_medicopaps==1 ){
                                                        echo "<a href='etiqueta_estudio_papanicolaou1.php?id_paciente=$id_pacientepaps&id_estudio=$id_estudiopaps&id_tipo_estudio=$id_tipo_estudiopaps&id_usuario=$id_usuariopaps&id_atencion=$id_atencionpaps&id_usu_pat=$id_usu_patpaps&clasificacion_medico=$clasificacion_medicopaps' style='color: red' >Agregar Resultado </a>";

                                                      }


                                                      else{
                                                        echo "<a href='etiqueta_estudio_papanicolaou1.php?id_paciente=$id_pacientepaps&id_estudio=$id_estudiopaps&id_tipo_estudio=$id_tipo_estudiopaps&id_usuario=$id_usuariopaps&id_atencion=$id_atencionpaps&id_usu_pat=$id_usu_patpaps&clasificacion_medico=$clasificacion_medicopaps' style='color: green' >Agregar Resultado </a>";

                                                      }
}
else  if($estatus_patologo==0 and $estatus_supervisor==1 and $id_usu_pat!=$id){
  echo "No Esta Asignado Para Este Usuario";
}
else  if($estatus_patologo==1 and $estatus_supervisor==1 and $id_usu_pat!=$id){
  echo "No Esta Asignado Para Este Usuario";
}
else{
  echo "solo ver ";
}

                                                  }
                                              }
                                              echo "</td>";

                                              //BIOPSIAS Patologo=============
                                             echo "<td>";
                                              //Vulvoscopia Patologo
                                           $queryVulvoscopia = "SELECT c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                           from 	estudio_papanicolau e inner join ctrl_paciente_estudios c on
                                             e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 6
                                              	and c.id_paciente = '$id_paciente' ";

                                              if ($resultSetVulvoscopia = $mysqliL->query($queryVulvoscopia)) {
                                                  while ($resultSetv = $resultSetVulvoscopia->fetch_assoc()) {
                                                      $id_estudiov = $resultSetv['id_estudio'];
                                            $id_pacientepapsv = $resultSetv['id_paciente'];
                                                      $estatus_supervisorv = $resultSetv['estatus_supervisor'];
                                                          $estatus_patologov = $resultSetv['estatus_patologo'];
                                                    $id_estudiopapsv = $resultSetv['id_estudio'];
                                                    $id_tipo_estudiopapsv = $resultSetv['id_tipo_estudio'];
                                                    $id_usuariopapsv = $resultSetv['id_usuario'];
                                                    $id_atencionpapsv = $resultSetv['id_atencion'];
                                                    $id_usu_patpapsv = $resultSetv['id_usu_pat'];
                                                    $clasificacion_medicopapsv = $resultSetv['clasificacion_medico'];
                                                    $id_usu_patv = $resultSetv['id_usu_pat'];
                                            //        echo "<div><a href='Etiquetas/etiqueta_estudio_vulva1.php?id_paciente=$id_pacientepaps&id_estudio=$id_estudiopaps&id_tipo_estudio=$id_tipo_estudiopaps&id_usuario=$id_usuariopaps&id_atencion=$id_atencionpaps&id_usu_pat=$id_usu_patpaps&clasificacion_medico=$clasificacion_medicopaps' target='_blank'>Agregar Vulvoscopia</a></div>";
if($estatus_patologov==0){
                                                    if($estatus_patologov==0 and $estatus_supervisorv==1 and $id_usu_patv!=$id){
                                                      echo "No Asignado<br>";
                                                    }
                                                    else  if($estatus_patologov==1 and $estatus_supervisorv==1 and $id_usu_patv!=$id){
                                                      echo "No Asignado<br>";
                                                    }
                                                    else{
                                                     echo "<div><a href='Etiquetas/etiqueta_estudio_vulva1.php?id_paciente=$id_pacientepapsv&id_estudio=$id_estudiopapsv&id_tipo_estudio=$id_tipo_estudiopapsv&id_usuario=$id_usuariopapsv&id_atencion=$id_atencionpapsv&id_usu_pat=$id_usu_patpapsv&clasificacion_medico=$clasificacion_medicopapsv' target='_blank'>Agregar Vulvoscopia</a></div>";
                                                    }
///////.//
}else{
  echo "solo ver <br>";
}
                                                  }
                                              }

                                              //Vaginoscopia Patologo
                                             $queryVaginoscopia = "SELECT 	c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico from 	estudio_vaginoscopia e
                                             inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 5 	and c.id_paciente = $id_paciente WHERE id_usu_pat='$id'; ";
                                              if ($resultSetVaginoscopia = $mysqliL->query($queryVaginoscopia)) {
                                                  while ($resultSetvag = $resultSetVaginoscopia->fetch_assoc()) {
                                                    $id_estudiovag = $resultSetvag['id_estudio'];
                                          $id_pacientepapsvag = $resultSetvag['id_paciente'];
                                                    $estatus_supervisorvag = $resultSetvag['estatus_supervisor'];
                                                        $estatus_patologovag = $resultSetvag['estatus_patologo'];
                                                  $id_estudiopapsvag = $resultSetvag['id_estudio'];
                                                  $id_tipo_estudiopapsvag = $resultSetvag['id_tipo_estudio'];
                                                  $id_usuariopapsvag = $resultSetvag['id_usuario'];
                                                  $id_atencionpapsvag = $resultSetvag['id_atencion'];
                                                  $id_usu_patpapsvag = $resultSetvag['id_usu_pat'];
                                                  $clasificacion_medicopapsvag = $resultSetvag['clasificacion_medico'];
                                                  $id_usu_patvag = $resultSetvag['id_usu_pat'];
                                                  if($estatus_patologovag==0){
      echo "<div><a href='Etiquetas/etiqueta_estudio_vaginoscopia1.php?id_paciente=$id_pacientepapsvag&id_estudio=$id_estudiopapsvag&id_tipo_estudio=$id_tipo_estudiopapsvag&id_usuario=$id_usuariopapsvag&id_atencion=$id_atencionpapsvag&id_usu_pat=$id_usu_patpapsvag&clasificacion_medico=$clasificacion_medicopapsvag' target='_blank'>Agregar Vagino</a></div>";
}else{
  echo "solo ver <br> ";
}


                                                  }
                                              }

                                              //Cervix
                                            $queryCervix = "SELECT  		c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                             from 	estudio_biopsia_cervix e inner join ctrl_paciente_estudios c on
                                            	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 2 	and c.id_paciente = $id_paciente WHERE id_usu_pat='$id'; ";
                                              if ($resultSetCervix = $mysqliL->query($queryCervix)) {
                                                  while ($resultSetcer = $resultSetCervix->fetch_assoc()) {
                                                    $id_estudiocer = $resultSetcer['id_estudio'];
                                                $id_pacientepapscer = $resultSetcer['id_paciente'];
                                                    $estatus_supervisorcer = $resultSetcer['estatus_supervisor'];
                                                        $estatus_patologocer = $resultSetcer['estatus_patologo'];
                                                  $id_estudiopapscer= $resultSetcer['id_estudio'];
                                                  $id_tipo_estudiopapscer = $resultSetcer['id_tipo_estudio'];
                                                  $id_usuariopapscer = $resultSetcer['id_usuario'];
                                                  $id_atencionpapscer = $resultSetcer['id_atencion'];
                                                  $id_usu_patpapscer = $resultSetcer['id_usu_pat'];
                                                  $clasificacion_medicopapscer = $resultSetcer['clasificacion_medico'];
                                                  $id_usu_patcer = $resultSetcer['id_usu_pat'];



          if($estatus_patologocer==0){
echo "<div><a href='Etiquetas/etiqueta_estudio_cervix1.php?id_paciente=$id_pacientepapscer&id_estudio=$id_estudiopapscer&id_tipo_estudio=$id_tipo_estudiopapscer&id_usuario=$id_usuariopapscer&id_atencion=$id_atencionpapscer&id_usu_pat=$id_usu_patcer&clasificacion_medico=$clasificacion_medicopapscer' target='_blank'>Agregar Cervix</a></div>";

}else{
  echo "solo ver <br> ";
}



                                                  }
                                              }

                                              //Endometrio Patologo
                                           $queryEndometrio = "SELECT c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                            from 	estudio_biopsia_endometrio e inner join ctrl_paciente_estudios c on
                                           	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 4 	and c.id_paciente = $id_paciente WHERE id_usu_pat='$id'; ";
                                              if ($resultSetEndometrio = $mysqliL->query($queryEndometrio)) {
                                                  while ($resultSetedn = $resultSetEndometrio->fetch_assoc()) {
                                                    $id_estudioend = $resultSetedn['id_estudio'];
                                                $id_pacientepapsend = $resultSetedn['id_paciente'];
                                                    $estatus_supervisorend = $resultSetedn['estatus_supervisor'];
                                                        $estatus_patologoend = $resultSetedn['estatus_patologo'];
                                                  $id_estudiopapsend= $resultSetedn['id_estudio'];
                                                  $id_tipo_estudiopapsend = $resultSetedn['id_tipo_estudio'];
                                                  $id_usuariopapsend = $resultSetedn['id_usuario'];
                                                  $id_atencionpapsend = $resultSetedn['id_atencion'];
                                                  $id_usu_patpapsend = $resultSetedn['id_usu_pat'];
                                                  $clasificacion_medicopapsend = $resultSetedn['clasificacion_medico'];
                                                  $id_usu_patend = $resultSetedn['id_usu_pat'];



if($estatus_patologoend==0){

  echo "<div><a href='Etiquetas/etiqueta_estudio_endometrio1.php?id_paciente=$id_pacientepapsend&id_estudio=$id_estudiopapsend&id_tipo_estudio=$id_tipo_estudiopapsend&id_usuario=$id_usuariopapsend&id_atencion=$id_atencionpapsend&id_usu_pat=$id_usu_patend&clasificacion_medico=$clasificacion_medicopapsend' target='_blank'>Agregar Endom</a></div>";

                                                    }else{
                                                      echo "solo ver <br> ";
                                                    }


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

<?php
  }

      else if($rol=='Admin'){


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
                                             <h2> Patologo Admin</h2>
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

                                             <th>Fecha de Nacimiento</th>
                                             <th>ID de Atencion</th>
                                             <th>Colposcopia</th>
                                             <th>Papanicolau</th>
       <th>Biopsias</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php

                                                 $consultasemanas = "SELECT DISTINCT ct.id_usu_pat,ct.id_atencion as i,p.id_paciente ,p.id_paciente as p, 	p.nombre_paciente, 	p.apellidos_paciente, 	ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion, 	p.fecha_nacimiento_paciente, 	p.edad_paciente FROM 	paciente p right JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente  ";
                                                 $resultadosemanas = $mysqliL->query($consultasemanas);

                                                 while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                                     $id_paciente = ucwords($resultadosemanas1['id_paciente']);
                                                     $nombre_paciente = ucwords($resultadosemanas1['nombre_paciente']);
                                                     $apellidos_paciente = ucwords($resultadosemanas1['apellidos_paciente']);
                                                     $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                                     $edad_paciente = $resultadosemanas1['edad_paciente'];
                                                     $id_atencion = $resultadosemanas1['id_atencion'];
           $p = $resultadosemanas1['p'];
             $i = $resultadosemanas1['i'];
                                                     echo "  <tr>
                                                                             <td>$nombre_paciente $apellidos_paciente </td>

                                                                             <td>$fecha_nacimiento_paciente</td>
                                                                             <td>$id_atencion</td>";


                                                     //Colposcopia
                                                     echo "<td>";
                                                     $queryColposcopia = "select 	e.id_estudio,c.id_atencion from 	estudio_colposcopico e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio  and c.id_atencion=$i	and c.id_tipo_estudio = 1 	and c.id_paciente = $id_paciente ;";
                                                     if ($resultSetColposcopia = $mysqliL->query($queryColposcopia)) {
                                                         while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
                                                             $id_estudio = $resultSet['id_estudio'];
                                                               $id_atencion1 = $resultSet['id_atencion'];
                                                             echo "<a href='pdfcolpos/reportes/index.php?id_paciente=$id_paciente&id_atencion=$id_atencion1&id_estudio=$id_estudio'  target='_blank'>Ver Colposcopia</a>";

                                                         }
                                                     }
                                                     echo "</td>";
                                                     echo "<td>";
                                                     //Papanicolaou
                                                     $queryPapanicolaou = "SELECT c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                                       from 	estudio_papanicolau e inner join ctrl_paciente_estudios c on
                                                       e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 7 	and c.id_paciente = '$id_paciente'  ";

                                                     if ($resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou)) {
                                                         while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
                                                             $id_pacientepaps = $resultSet['id_paciente'];
                                                               $estatus_supervisor = $resultSet['estatus_supervisor'];
                                                                   $estatus_patologo = $resultSet['estatus_patologo'];
                                                             $id_estudiopaps = $resultSet['id_estudio'];
                                                             $id_tipo_estudiopaps = $resultSet['id_tipo_estudio'];
                                                             $id_usuariopaps = $resultSet['id_usuario'];
                                                             $id_atencionpaps = $resultSet['id_atencion'];
                                                             $id_usu_patpaps = $resultSet['id_usu_pat'];
                                                             $clasificacion_medicopaps = $resultSet['clasificacion_medico'];
                                                             $id_usu_pat = $resultSet['id_usu_pat'];

                        if($estatus_patologo==0 and $estatus_supervisor==1 and $id_usu_pat==$id){



                                                             if($clasificacion_medicopaps==1 ){
                                                               echo "<a href='etiqueta_estudio_papanicolaou1.php?id_paciente=$id_pacientepaps&id_estudio=$id_estudiopaps&id_tipo_estudio=$id_tipo_estudiopaps&id_usuario=$id_usuariopaps&id_atencion=$id_atencionpaps&id_usu_pat=$id_usu_patpaps&clasificacion_medico=$clasificacion_medicopaps' style='color: red' >Agregar Resultado </a>";

                                                             }


                                                             else{
                                                               echo "<a href='etiqueta_estudio_papanicolaou1.php?id_paciente=$id_pacientepaps&id_estudio=$id_estudiopaps&id_tipo_estudio=$id_tipo_estudiopaps&id_usuario=$id_usuariopaps&id_atencion=$id_atencionpaps&id_usu_pat=$id_usu_patpaps&clasificacion_medico=$clasificacion_medicopaps' style='color: green' >Agregar Resultado </a>";

                                                             }
       }
       else  if($estatus_patologo==0 and $estatus_supervisor==1 and $id_usu_pat!=$id){
         echo "No Esta Asignado Para Este Usuario";
       }
       else  if($estatus_patologo==1 and $estatus_supervisor==1 and $id_usu_pat!=$id){
         echo "No Esta Asignado Para Este Usuario";
       }
       else{
         echo "solo ver ";
       }

                                                         }
                                                     }
                                                     echo "</td>";

                                                     //BIOPSIAS Patologo=============
                                                    echo "<td>";
                                                     //Vulvoscopia Patologo
                                                  $queryVulvoscopia = "SELECT c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                                  from 	estudio_papanicolau e inner join ctrl_paciente_estudios c on
                                                    e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 6
                                                     	and c.id_paciente = '$id_paciente' ";

                                                     if ($resultSetVulvoscopia = $mysqliL->query($queryVulvoscopia)) {
                                                         while ($resultSetv = $resultSetVulvoscopia->fetch_assoc()) {
                                                             $id_estudiov = $resultSetv['id_estudio'];
                                                   $id_pacientepapsv = $resultSetv['id_paciente'];
                                                             $estatus_supervisorv = $resultSetv['estatus_supervisor'];
                                                                 $estatus_patologov = $resultSetv['estatus_patologo'];
                                                           $id_estudiopapsv = $resultSetv['id_estudio'];
                                                           $id_tipo_estudiopapsv = $resultSetv['id_tipo_estudio'];
                                                           $id_usuariopapsv = $resultSetv['id_usuario'];
                                                           $id_atencionpapsv = $resultSetv['id_atencion'];
                                                           $id_usu_patpapsv = $resultSetv['id_usu_pat'];
                                                           $clasificacion_medicopapsv = $resultSetv['clasificacion_medico'];
                                                           $id_usu_patv = $resultSetv['id_usu_pat'];
                                                   //        echo "<div><a href='Etiquetas/etiqueta_estudio_vulva1.php?id_paciente=$id_pacientepaps&id_estudio=$id_estudiopaps&id_tipo_estudio=$id_tipo_estudiopaps&id_usuario=$id_usuariopaps&id_atencion=$id_atencionpaps&id_usu_pat=$id_usu_patpaps&clasificacion_medico=$clasificacion_medicopaps' target='_blank'>Agregar Vulvoscopia</a></div>";
       if($estatus_patologov==0){
                                                           if($estatus_patologov==0 and $estatus_supervisorv==1 and $id_usu_patv!=$id){
                                                             echo "No Asignado<br>";
                                                           }
                                                           else  if($estatus_patologov==1 and $estatus_supervisorv==1 and $id_usu_patv!=$id){
                                                             echo "No Asignado<br>";
                                                           }
                                                           else{
                                                            echo "<div><a href='Etiquetas/etiqueta_estudio_vulva1.php?id_paciente=$id_pacientepapsv&id_estudio=$id_estudiopapsv&id_tipo_estudio=$id_tipo_estudiopapsv&id_usuario=$id_usuariopapsv&id_atencion=$id_atencionpapsv&id_usu_pat=$id_usu_patpapsv&clasificacion_medico=$clasificacion_medicopapsv' target='_blank'>Agregar Vulvoscopia</a></div>";
                                                           }
       ///////.//
       }else{
         echo "solo ver <br>";
       }
                                                         }
                                                     }

                                                     //Vaginoscopia Patologo
                                                    $queryVaginoscopia = "SELECT 	c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico from 	estudio_vaginoscopia e
                                                    inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 5 	and c.id_paciente = $id_paciente ";
                                                     if ($resultSetVaginoscopia = $mysqliL->query($queryVaginoscopia)) {
                                                         while ($resultSetvag = $resultSetVaginoscopia->fetch_assoc()) {
                                                           $id_estudiovag = $resultSetvag['id_estudio'];
                                                 $id_pacientepapsvag = $resultSetvag['id_paciente'];
                                                           $estatus_supervisorvag = $resultSetvag['estatus_supervisor'];
                                                               $estatus_patologovag = $resultSetvag['estatus_patologo'];
                                                         $id_estudiopapsvag = $resultSetvag['id_estudio'];
                                                         $id_tipo_estudiopapsvag = $resultSetvag['id_tipo_estudio'];
                                                         $id_usuariopapsvag = $resultSetvag['id_usuario'];
                                                         $id_atencionpapsvag = $resultSetvag['id_atencion'];
                                                         $id_usu_patpapsvag = $resultSetvag['id_usu_pat'];
                                                         $clasificacion_medicopapsvag = $resultSetvag['clasificacion_medico'];
                                                         $id_usu_patvag = $resultSetvag['id_usu_pat'];
                                                         if($estatus_patologovag==0){
             echo "<div><a href='Etiquetas/etiqueta_estudio_vaginoscopia1.php?id_paciente=$id_pacientepapsvag&id_estudio=$id_estudiopapsvag&id_tipo_estudio=$id_tipo_estudiopapsvag&id_usuario=$id_usuariopapsvag&id_atencion=$id_atencionpapsvag&id_usu_pat=$id_usu_patpapsvag&clasificacion_medico=$clasificacion_medicopapsvag' target='_blank'>Agregar Vagino</a></div>";
       }else{
         echo "solo ver <br> ";
       }


                                                         }
                                                     }

                                                     //Cervix
                                                   $queryCervix = "SELECT  		c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                                    from 	estudio_biopsia_cervix e inner join ctrl_paciente_estudios c on
                                                   	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 2 	and c.id_paciente = $id_paciente  ";
                                                     if ($resultSetCervix = $mysqliL->query($queryCervix)) {
                                                         while ($resultSetcer = $resultSetCervix->fetch_assoc()) {
                                                           $id_estudiocer = $resultSetcer['id_estudio'];
                                                       $id_pacientepapscer = $resultSetcer['id_paciente'];
                                                           $estatus_supervisorcer = $resultSetcer['estatus_supervisor'];
                                                               $estatus_patologocer = $resultSetcer['estatus_patologo'];
                                                         $id_estudiopapscer= $resultSetcer['id_estudio'];
                                                         $id_tipo_estudiopapscer = $resultSetcer['id_tipo_estudio'];
                                                         $id_usuariopapscer = $resultSetcer['id_usuario'];
                                                         $id_atencionpapscer = $resultSetcer['id_atencion'];
                                                         $id_usu_patpapscer = $resultSetcer['id_usu_pat'];
                                                         $clasificacion_medicopapscer = $resultSetcer['clasificacion_medico'];
                                                         $id_usu_patcer = $resultSetcer['id_usu_pat'];



                 if($estatus_patologocer==0){
       echo "<div><a href='Etiquetas/etiqueta_estudio_cervix1.php?id_paciente=$id_pacientepapscer&id_estudio=$id_estudiopapscer&id_tipo_estudio=$id_tipo_estudiopapscer&id_usuario=$id_usuariopapscer&id_atencion=$id_atencionpapscer&id_usu_pat=$id_usu_patcer&clasificacion_medico=$clasificacion_medicopapscer' target='_blank'>Agregar Cervix</a></div>";

       }else{
         echo "solo ver <br> ";
       }



                                                         }
                                                     }

                                                     //Endometrio Patologo
                                                  $queryEndometrio = "SELECT c.estatus_supervisor,c.estatus_patologo,c.id_paciente,c.id_estudio,c.id_tipo_estudio,c.id_usuario,c.id_atencion,c.id_usu_pat,c.clasificacion_medico
                                                   from 	estudio_biopsia_endometrio e inner join ctrl_paciente_estudios c on
                                                  	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 4 	and c.id_paciente = $id_paciente  ";
                                                     if ($resultSetEndometrio = $mysqliL->query($queryEndometrio)) {
                                                         while ($resultSetedn = $resultSetEndometrio->fetch_assoc()) {
                                                           $id_estudioend = $resultSetedn['id_estudio'];
                                                       $id_pacientepapsend = $resultSetedn['id_paciente'];
                                                           $estatus_supervisorend = $resultSetedn['estatus_supervisor'];
                                                               $estatus_patologoend = $resultSetedn['estatus_patologo'];
                                                         $id_estudiopapsend= $resultSetedn['id_estudio'];
                                                         $id_tipo_estudiopapsend = $resultSetedn['id_tipo_estudio'];
                                                         $id_usuariopapsend = $resultSetedn['id_usuario'];
                                                         $id_atencionpapsend = $resultSetedn['id_atencion'];
                                                         $id_usu_patpapsend = $resultSetedn['id_usu_pat'];
                                                         $clasificacion_medicopapsend = $resultSetedn['clasificacion_medico'];
                                                         $id_usu_patend = $resultSetedn['id_usu_pat'];



       if($estatus_patologoend==0){

         echo "<div><a href='Etiquetas/etiqueta_estudio_endometrio1.php?id_paciente=$id_pacientepapsend&id_estudio=$id_estudiopapsend&id_tipo_estudio=$id_tipo_estudiopapsend&id_usuario=$id_usuariopapsend&id_atencion=$id_atencionpapsend&id_usu_pat=$id_usu_patend&clasificacion_medico=$clasificacion_medicopapsend' target='_blank'>Agregar Endom</a></div>";

                                                           }else{
                                                             echo "solo ver <br> ";
                                                           }


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

       <?php
             }
               ?>
        
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

<!--//tawk chat JS
		============================================ -->
<?php //include('js.php'); ?>
</body>

</html>
<?php
    }
} else {
    header('Location: ../index.php');

    exit;
}





?>
