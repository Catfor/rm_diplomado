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
        if($rol=='Medico'){
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
                                    <th>ID de Atencion</th>
                                    <th>Colposcopia</th>
                                    <th>Papanicolau</th>
                                    <th>Biopsias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                        $consultasemanas = "SELECT DISTINCT p.id_paciente, 	p.nombre_paciente, 	p.apellidos_paciente, 	ifnull(lpad(ct.id_atencion,4,'0000'),'-') as id_atencion, 	p.fecha_nacimiento_paciente, 	p.edad_paciente FROM 	paciente p LEFT JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente";
                                        $resultadosemanas = $mysqliL->query($consultasemanas);

                                        while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                            $id_paciente = ucwords($resultadosemanas1['id_paciente']);
                                            $nombre_paciente = ucwords($resultadosemanas1['nombre_paciente']);
                                            $apellidos_paciente = ucwords($resultadosemanas1['apellidos_paciente']);
                                            $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                            $edad_paciente = $resultadosemanas1['edad_paciente'];
                                            $id_atencion = $resultadosemanas1['id_atencion'];

                                            echo "  <tr>
                                                                    <td>$nombre_paciente $apellidos_paciente </td>
                                                                    <td>$edad_paciente</td>
                                                                    <td>$fecha_nacimiento_paciente</td>
                                                                    <td>$id_atencion</td>";


                                            //Colposcopia
                                            echo "<td>";
                                            $queryColposcopia = "select 	e.id_estudio from 	estudio_colposcopico e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 1 	and c.id_paciente = $id_paciente;";
                                            if ($resultSetColposcopia = $mysqliL->query($queryColposcopia)) {
                                                while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<a href='atencion_medica.php?id_paciente=$id_paciente'  target='_blank'>Ver Colposcopia</a>";
                                                }
                                            }
                                            echo "</td>";
                                            echo "<td>";
                                            //Papanicolaou
                                            $queryPapanicolaou = "select 	e.id_estudio, 	e.fecha_estudio, 	e.estudio, 	e.antecedente_cancer, 	e.antecedente_infeccion_vagina, 	e.fecha_ultima_menstruacion, 	e.fecha_ultima_papanicolau, 	e.metodo_anticonceptivo, 	e.menopausia, 	e.hallazgos_colposcopicos, 	e.observaciones_papinocolau from 	estudio_papanicolau e inner join ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 7 	and c.id_paciente = $id_paciente; ";
                                            if ($resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou)) {
                                                while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
                                                    $id_estudio = $resultSet['id_estudio'];
                                                    echo "<a href='Etiquetas/etiqueta_estudio_papanicolaou.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Ver Papanicolaou</a>";
                                                }
                                            }
                                            echo "</td>";

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
}else{


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
                                     <h2>Resultados</h2>
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
                                                      $consultapatologa = "SELECT id_usuario,nombre_usuario,apellidos_usuario,rol FROM usu_me where rol='Patologo/Biopsa' or rol='Patologo/Paps'";
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
                                     <th>Edad</th>

                                     <th>ID de Atencion</th>
                                     <th>Colposcopia</th>

                                     <th>Papanicolau</th>

                                     <th>Biopsias</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php

                                         $consultasemanas = "SELECT DISTINCT ct.id_atencion as i,ct.id_estudio,ct.estatus,ct.id_usu_pat,p.id_paciente,
p.nombre_paciente, 	p.apellidos_paciente,
IFNULL(LPAD(ct.id_atencion,4,'0000'),'-') AS id_atencion,
	p.fecha_nacimiento_paciente, 	p.edad_paciente FROM
		paciente p LEFT JOIN ctrl_paciente_estudios ct ON ct.id_paciente = p.id_paciente
WHERE id_estudio!=0 GROUP BY ct.id_estudio";
                                         $resultadosemanas = $mysqliL->query($consultasemanas);

                                         while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
                                             $id_paciente = ucwords($resultadosemanas1['id_paciente']);
                                             $nombre_paciente = ucwords($resultadosemanas1['nombre_paciente']);
                                             $apellidos_paciente = ucwords($resultadosemanas1['apellidos_paciente']);
                                             $fecha_nacimiento_paciente = $resultadosemanas1['fecha_nacimiento_paciente'];
                                             $edad_paciente = $resultadosemanas1['edad_paciente'];
                                             $id_atencion = $resultadosemanas1['id_atencion'];
                                             $id_usu_pat = $resultadosemanas1['id_usu_pat'];
                                            $estatus1 = $resultadosemanas1['estatus'];
                                            $ii = $resultadosemanas1['i'];
                                            $consultasemanas1 = "SELECT DISTINCT c.estatus,c.id_usu_pat  FROM paciente AS p left JOIN ctrl_paciente_estudios AS c ON c.id_paciente=p.id_paciente WHERE p.id_paciente=$id_paciente AND id_estudio!=0";
                                            $resultadosemanas1 = $mysqliL->query($consultasemanas1);

                                            $totalsi=$resultadosemanas1->num_rows;
                                            if($totalsi==0){
                                              echo "<tr><td><center>----</center> </td>";
                                            }else{
                                            while ($resultadosemanas12 = $resultadosemanas1->fetch_assoc()) {
                                                $estatus1 = $resultadosemanas12['estatus'];

                                                $id_usu_pat1 = $resultadosemanas12['id_usu_pat'];


                                           if($estatus1==0 and $id_usu_pat1==0){
                                    //         echo "<td> <center> <label class='col-lg-3 col-md-3 col-sm-6 col-xs-12'><input  type='checkbox'  name='idusuariopato[]' value='$ii'> </label> </center></td>";
                                           }


                                           elseif($id_usu_pat1==1 and $estatus1==0){

                                                                                        echo "
                                                                                           <td> <center> VER/EDITAR </center></td>

                                           ";

                                               }

                                           elseif($id_usu_pat1==1 and $estatus1==1){

                                                                                        echo "
                                                                                           <td><center>  VER </center></td>

                                           ";

                                           }
                                                   }
                                                   }
                                             echo "

                                                                     <td>$nombre_paciente<br>$apellidos_paciente </td>
                                                                     <td>$edad_paciente</td>

                                                                     <td>$id_atencion</td>";


                                             //Colposcopia
                                             echo "<td>";
                                             $queryColposcopia = "SELECT 	e.id_estudio from 	estudio_colposcopico e inner join ctrl_paciente_estudios c on
                                             	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 1 	and c.id_paciente = $id_paciente;";
                                             if ($resultSetColposcopia = $mysqliL->query($queryColposcopia)) {
                                                 while ($resultSet = $resultSetColposcopia->fetch_assoc()) {
                                                     $id_estudio = $resultSet['id_estudio'];
                                                     echo "<a href='atencion_medica.php?id_paciente=$id_paciente'  target='_blank'>colpos</a>";

                                                 }
                                             }
                                             echo "</td>";
                                             echo "<td>";
                                             //Papanicolaou
                                             $queryPapanicolaou = "SELECT 	e.id_estudio,e.id_estudio as paps,  	e.fecha_estudio, 	e.estudio, 	e.antecedente_cancer, 	e.antecedente_infeccion_vagina,
                                             	e.fecha_ultima_menstruacion, 	e.fecha_ultima_papanicolau, 	e.metodo_anticonceptivo, 	e.menopausia,
                                              	e.hallazgos_colposcopicos, 	e.observaciones_papinocolau from
                                                	estudio_papanicolau e inner join ctrl_paciente_estudios c on
                                                  	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 7 	and c.id_paciente = $id_paciente; ";
                                             if ($resultSetPapanicolaou = $mysqliL->query($queryPapanicolaou)) {
                                                 while ($resultSet = $resultSetPapanicolaou->fetch_assoc()) {
                                                     $id_estudio = $resultSet['id_estudio'];
                                                      $paps = $resultSet['paps'];
                                                     echo "<input  type='checkbox' name='paps[]' value='$paps'>  ";
                                                     echo "<a href='Etiquetas/etiqueta_estudio_papanicolaou.php?id_paciente=$id_paciente&id_estudio=$id_estudio'
                                                      target='_blank'>Paps</a>";
                                                 }
                                             }
                                             echo "</td>";

                                             //BIOPSIAS =============
                                             echo "<td>";
                                             //Vulvoscopia
                                             $queryVulvoscopia = "SELECT 	e.id_estudio,e.id_estudio as vulva from 	estudio_vulvoscopia e inner join ctrl_paciente_estudios c on
                                             e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 6 	and c.id_paciente = $id_paciente;";
                                             if ($resultSetVulvoscopia = $mysqliL->query($queryVulvoscopia)) {
                                                 while ($resultSet = $resultSetVulvoscopia->fetch_assoc()) {
                                                     $id_estudio = $resultSet['id_estudio'];
                                                     $vulva = $resultSet['vulva'];

                                                     echo "<input  type='checkbox'  name='vulva[]' value='$vulva'>";
                                                     echo "<div><a href='Etiquetas/etiqueta_estudio_vulva.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Vulvo</a></div>";
                                                 }
                                             }

                                             //Vaginoscopia
                                             $queryVaginoscopia = "SELECT 	e.id_estudio,e.id_estudio as vagi from 	estudio_vaginoscopia e inner join ctrl_paciente_estudios c on
                                             	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 5 	and c.id_paciente = $id_paciente; ";
                                             if ($resultSetVaginoscopia = $mysqliL->query($queryVaginoscopia)) {
                                                 while ($resultSet = $resultSetVaginoscopia->fetch_assoc()) {
                                                     $id_estudio = $resultSet['id_estudio'];
                                                      $vagi = $resultSet['vagi'];
                                                     echo " <input  type='checkbox'  name='vagi[]' value='$vagi'> ";
                                                     echo "<div><a href='Etiquetas/etiqueta_estudio_vaginoscopia.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Vagins</a></div>";
                                                 }
                                             }

                                             //Cervix
                                             $queryCervix = "SELECT 	e.id_estudio,e.id_estudio as cervix from 	estudio_biopsia_cervix e inner join
                                             ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 2 	and c.id_paciente = $id_paciente; ";
                                             if ($resultSetCervix = $mysqliL->query($queryCervix)) {
                                                 while ($resultSet = $resultSetCervix->fetch_assoc()) {
                                                     $id_estudio = $resultSet['id_estudio'];
                                                     $cervix = $resultSet['cervix'];
                                                     echo " <div><input  type='checkbox' name='cervix[]' value='$cervix'> ";
                                                     echo "<a href='Etiquetas/etiqueta_estudio_cervix.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Cervix</a></div>";
                                                 }
                                             }

                                             //Endometrio
                                             $queryEndometrio = "SELECT 	e.id_estudio,e.id_estudio as endo from 	estudio_biopsia_endometrio e inner join
                                             ctrl_paciente_estudios c on 	e.id_estudio = c.id_estudio 	and c.id_tipo_estudio = 4 	and c.id_paciente = $id_paciente; ";
                                             if ($resultSetEndometrio = $mysqliL->query($queryEndometrio)) {
                                                 while ($resultSet = $resultSetEndometrio->fetch_assoc()) {
                                                     $id_estudio = $resultSet['id_estudio'];
                                                     $endo = $resultSet['endo'];
                                                     echo "<div><input  type='checkbox'  name='endo[]' value='$endo'>";
                                                     echo "<a href='Etiquetas/etiqueta_estudio_endometrio.php?id_paciente=$id_paciente&id_estudio=$id_estudio' target='_blank'>Endometrio</a></div>";
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
