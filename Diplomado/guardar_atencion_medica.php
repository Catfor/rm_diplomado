
<?php

include('../coni/Localhost.php');
date_default_timezone_set('America/Mexico_City');
$h = date("Y-m-d");
$hoys = date("Y-m-d H:i:s");
$edad_inicio_menstruacion = $_POST['edad_inicio_menstruacion'];
$metodos_planificacion = $_POST['metodos_planificacion'];
$cual = isset($_POST['cual']) ? $_POST['cual'] : "N/A";
$edad_inicio_vida_sexual = $_POST['edad_inicio_vida_sexual'];
$parejas_sexuales = $_POST['parejas_sexuales'];
$gestas = isset($_POST['gestas']) ? $_POST['gestas'] : 0;
$para = isset($_POST['para']) ? $_POST['para'] : 0;
$cesareas = isset($_POST['cesareas']) ? $_POST['cesareas'] : 0;
$abortos = isset($_POST['abortos']) ? $_POST['abortos'] : 0;
$fecha_ultima_regla = date('Y-m-d', strtotime($_POST['fecha_ultima_regla']));
$fecha_ultimo_papanicolau = date('Y-m-d', strtotime($_POST['fecha_ultimo_papanicolau']));
$atecedentes_lesion = $_POST['atecedentes_lesion'];
$antecedentes_tratamiento = $_POST['antecedentes_tratamiento'];
$idpaciente = isset($_POST['idpaciente']) ? $_POST['idpaciente'] : die("No se ha recibido el ID del paciente a registrar la atencion medica") ;
$metrorragia = $_POST['metrorragia'];
$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : die("No se ha recibido el ID del medico que registra la atencion medica");

$hormonoterapia = $_POST['hormonoterapia'];
$duracion_hormonoterapia = $_POST['duracion_hormonoterapia'];
$ritmo = $_POST['ritmo'];
$antecedente_cancer_cervicouterino = $_POST['antecedente_cancer_cervicouterino'];
$tratamiento_previo = $_POST['tratamiento_previo'];
$insertaratecion = "INSERT INTO atencion_medica
       (edad_inicio_menstruacion,metodos_planificacion,cual,edad_inicio_vida_sexual,parejas_sexuales,gestas,para,cesareas,abortos,
   fecha_ultima_regla,fecha_ultimo_papanicolau,antecedentes_tratamiento,atecedentes_lesion,id_paciente,fecha_atencion_medica,metrorragia,hormonoterapia,duracion_hormonoterapia,ritmo,antecedente_cancer_cervicouterino,tratamiento_previo)
       VALUES
       ('$edad_inicio_menstruacion','$metodos_planificacion','$cual','$edad_inicio_vida_sexual','$parejas_sexuales','$gestas',
       '$para','$cesareas','$abortos','$fecha_ultima_regla','$fecha_ultimo_papanicolau','$antecedentes_tratamiento',
       '$atecedentes_lesion','$idpaciente','$hoys','$metrorragia','$hormonoterapia','$duracion_hormonoterapia',
       '$ritmo','$antecedente_cancer_cervicouterino','$tratamiento_previo')";
$resultadoinsertaratencion = $mysqliL->query($insertaratecion);
//   echo $sql11.'<br>';
$id_ant_atencionmedica = $mysqliL->insert_id;

$sql1 = "INSERT INTO ctrl_paciente_estudios
             (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion)
             VALUES
             ('$idpaciente','','','$id_usuario','$id_ant_atencionmedica')";
$resulta1 = $mysqliL->query($sql1);
////////////////////obtencion de parametros colposcopia/////////////////////////////////////////////////////////////
$colposcopia = $_POST['colposcopia'];

$causa = $_POST['causa'];
$cervix = $_POST['cervix'];
$union_escamocolumnar = $_POST['union_escamocolumnar'];
$zona_transformacion = $_POST['zona_transformacion'];
$epitelio_acetoblanco = $_POST['epitelio_acetoblanco'];
$ep_criterios_menores = $_POST['ep_criterios_menores'];
$ep_criterios_intermedios = $_POST['ep_criterios_intermedios'];
$ep_criterios_mayores = $_POST['ep_criterios_mayores'];
$bs_criterios_menores = $_POST['bs_criterios_menores'];
$bs_criterios_intermedios = $_POST['bs_criterios_intermedios'];
$bs_criterios_mayores = $_POST['bs_criterios_mayores'];
$ag_criterios_menores = $_POST['ag_criterios_menores'];
$ag_criterios_intermedios = $_POST['ag_criterios_intermedios'];
$ag_criterios_mayores = $_POST['ag_criterios_mayores'];
$cy_menores = $_POST['cy_menores'];
$cy_intermedios = $_POST['cy_intermedios'];
$cy_mayores = $_POST['cy_mayores'];
$schiller = $_POST['schiller'];
$vaginoscopia = $_POST['vaginoscopia_acetico'];
$vaginoscopia_lugol = $_POST['vaginoscopia_lugol'];
$miscelaneos = $_POST['miscelaneos'];
$posible_recomendacion_diagnostica = $_POST['posible_recomendacion_diagnostica'];
$recomendacion_diagnostica = $_POST['recomendacion_diagnostica'];
$vulvoscopia_acetico = $_POST['vulvoscopia_acetico'];
$insertaestudio_colposcopico = "INSERT INTO estudio_colposcopico
     (colposcopia,causa,cervix,union_escamocolumnar,zona_transformacion,epitelio_acetoblanco,ep_criterios_menores,ep_criterios_intermedios,ep_criterios_mayores,bs_criterios_menores,bs_criterios_intermedios,
     bs_criterios_mayores,ag_criterios_menores,ag_criterios_intermedios,ag_criterios_mayores,cy_menores,cy_intermedios,cy_mayores,schiller,
     vaginoscopia_acetico,vaginoscopia_lugol,miscelaneos,posible_recomendacion_diagnostica,fecha_estudio,vulvoscopia_acetico)
     VALUES
     ('$colposcopia','$causa','$cervix','$union_escamocolumnar','$zona_transformacion','$epitelio_acetoblanco','$ep_criterios_menores','$ep_criterios_intermedios','$ep_criterios_mayores',
       '$bs_criterios_menores','$bs_criterios_intermedios','$bs_criterios_mayores','$ag_criterios_menores','$ag_criterios_intermedios','$ag_criterios_mayores',
       '$cy_menores','$cy_intermedios','$cy_mayores','$schiller','$vaginoscopia','$vaginoscopia_lugol','$miscelaneos','$posible_recomendacion_diagnostica','$hoys','$vulvoscopia_acetico')";
$resultadoinsertaestudio_colposcopico = $mysqliL->query($insertaestudio_colposcopico);
$id_ant_colposcopico = $mysqliL->insert_id;



$sql2 = "INSERT INTO ctrl_paciente_estudios
       (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion)
       VALUES
       ('$idpaciente','$id_ant_colposcopico','1','$id_usuario','$id_ant_atencionmedica')";


$resulta2 = $mysqliL->query($sql2);

////////////////////obtencion de parametros papanicolau/////////////////////////////////////////////////////

$antecedente_cancer = $_POST['antecedente_cancer'];
$antecedente_infeccion_vagina = $_POST['antecedente_infeccion_vagina'];
$observaciones_papinocolau = $_POST['observaciones_papinocolau'];

if (!empty(trim($observaciones_papinocolau))) {
  $insertaestudio_papanicolau = "INSERT INTO estudio_papanicolau
          (antecedente_cancer,antecedente_infeccion_vagina,observaciones_papinocolau,fecha_estudio)
          VALUES ('$antecedente_cancer','$antecedente_infeccion_vagina','$observaciones_papinocolau','$hoys')";

  $resultadoestudio_papanicolau = $mysqliL->query($insertaestudio_papanicolau);

  $id_ant_estudio_papanicolau = $mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
          (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion)
          VALUES
          ('$idpaciente','$id_ant_estudio_papanicolau','7','$id_usuario','$id_ant_atencionmedica')";
  $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas CERVIX/////////////////////////////////////////////////////
$senalizacion = $_POST['senalizacion'];

$x = $_POST["x"];
$y = $_POST["y"];

if (!empty(trim($senalizacion))) {
  $insertaestudio_biopsia_cervix = "INSERT INTO estudio_biopsia_cervix
          (senalizacion,fecha_estudio,x,y)
          VALUES
          ('$senalizacion','$hoys','$x','$y')";
  $resultadoestudio_biopsia_cervix = $mysqliL->query($insertaestudio_biopsia_cervix);

  $id_ant_estudio_biopsia_cervix = $mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
          (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion)
          VALUES
          ('$idpaciente','$id_ant_estudio_biopsia_cervix','2','$id_usuario','$id_ant_atencionmedica')";
  $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas DE VULVOSCOPIA/////////////////////////////////////////////////////
$anotaciones_vulvoscopia = $_POST['anotaciones_vulvoscopia'];

$xy = $_POST["xy"];
$yx = $_POST["yx"];


if (!empty(trim($anotaciones_vulvoscopia))) {
  $insertaestudio_vulvoscopia = "INSERT INTO estudio_vulvoscopia
          (anotaciones_vulvoscopia,fecha_estudio,x,y)
          VALUES
          ('$anotaciones_vulvoscopia','$hoys','$xy','$yx')";
  $resultadoestudio_vulvoscopia = $mysqliL->query($insertaestudio_vulvoscopia);

  $id_ant_estudio_vulvoscopia = $mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
          (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion)
          VALUES
          ('$idpaciente','$id_ant_estudio_vulvoscopia','6','$id_usuario','$id_ant_atencionmedica')";
  $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas DE VAGINOSCOPIA/////////////////////////////////////////////////////
$estudio_solicitar_vaginoscopia = $_POST['estudio_solicitar_vaginoscopia'];
$anotaciones_vaginoscopia = $_POST['anotaciones_vaginoscopia'];

if (!empty(trim($anotaciones_vaginoscopia))) {
  $insertaestudio_vaginoscopia = "INSERT INTO estudio_vaginoscopia
          (estudio_solicitar_vaginoscopia,anotaciones_vaginoscopia,fecha_estudio)
          VALUES
          ('$estudio_solicitar_vaginoscopia','$anotaciones_vaginoscopia','$hoys')";
  $resultadoestudio_vaginoscopia = $mysqliL->query($insertaestudio_vaginoscopia);

  $id_ant_estudio_vaginoscopia = $mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
          (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion)
          VALUES
          ('$idpaciente','$id_ant_estudio_vaginoscopia','5','$id_usuario','$id_ant_atencionmedica')";
  $resulta3 = $mysqliL->query($sql3);
}

////////////////////obtencion de parametros biopsas DE ENDOMETRIO/////////////////////////////////////////////////////
$observaciones_endometrio = $_POST['observaciones_endometrio'];
if (!empty(trim($observaciones_endometrio))) {

  $insertaestudio_biopsia_endometrio = "INSERT INTO estudio_biopsia_endometrio
          (observaciones_endometrio,fecha_estudio)
          VALUES
          ('$observaciones_endometrio','$hoys')";
  $resultadoestudio_biopsia_endometrio = $mysqliL->query($insertaestudio_biopsia_endometrio);

  $id_ant_estudio_biopsia_endometrio = $mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
          (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,id_usuario)
          VALUES
          ('$idpaciente','$id_ant_estudio_biopsia_endometrio','4','$id_usuario','$id_ant_atencionmedica')";
  $resulta3 = $mysqliL->query($sql3);
}

foreach ($_POST["canvas"] as $canvas) {

  $directorio = 'imagesestudios/';
  //Validamos si la ruta de destino existe, en caso de no existir la creamos
  if (!file_exists($directorio)) {
    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
  }
  $dir = opendir($directorio); //Abrimos el directorio de destino
  $datos = explode(";", $canvas);
  $data = explode(",", $datos[1]);
  $filename = $h . '-' . $id_ant_atencionmedica . '_CAM';

  if (file_put_contents($directorio . '/' . $filename . '.jpg', base64_decode($data[1]))) {
    $inserta_imagen = "INSERT INTO imagen
          (ruta_imagen,id_atencion_medica,fecha_imagen)
          VALUES
          ('$filename','$id_ant_atencionmedica','$hoys')";
    $resultado_inserta_imagen = $mysqliL->query($inserta_imagen);
  }
  closedir($dir); //Cerramos el directorio de destino
}

foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
  //Validamos que el archivo exista
  if ($_FILES["archivo"]["name"][$key]) {
    $filename = $h . '-' . $id_ant_atencionmedica . $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
    $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
    echo ($filename);
    $directorio = 'imagesestudios/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

    //Validamos si la ruta de destino existe, en caso de no existir la creamos
    if (!file_exists($directorio)) {
      mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
    }

    $dir = opendir($directorio); //Abrimos el directorio de destino
    $target_path = $directorio . '/' . $h . '-' . $idpaciente . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
    $target_pat = $h . '-' . $id_ant_atencionmedica . $filename;
    //Movemos y validamos que el archivo se haya cargado correctamente
    //El primer campo es el origen y el segundo el destino
    if (move_uploaded_file($source, $target_path)) {
      $inserta_imagen = "INSERT INTO imagen
            (ruta_imagen,id_atencion_medica,fecha_imagen)
            VALUES
            ('$target_pat','$id_ant_atencionmedica','$hoys')";
      $resultado_inserta_imagen = $mysqliL->query($inserta_imagen);
      //$id_ant_atencionmedica


    } else { }
    closedir($dir); //Cerramos el directorio de destino
  }
}

//header("Location:consulta_paciente.php");
?>