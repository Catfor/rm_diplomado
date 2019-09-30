<?php
$idpaciente = isset($_POST['idpaciente']) ? $_POST['idpaciente'] : die("Error :No se ha recibido el ID del paciente a registrar la atencion medica");
$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : die("Error :No se ha recibido el ID del medico que registra la atencion medica");

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
$fecha_ultima_regla = isset($_POST['fecha_ultima_regla']) ? date('Y-m-d', strtotime($_POST['fecha_ultima_regla'])) : "N/A";
$fecha_ultimo_papanicolau = isset($_POST['fecha_ultimo_papanicolau']) ? date('Y-m-d', strtotime($_POST['fecha_ultimo_papanicolau'])) : "N/A";
$atecedentes_lesion = isset($_POST['atecedentes_lesion']) ? $_POST['atecedentes_lesion'] : "Sin registro de lesiones";
$antecedentes_tratamiento = isset($_POST['antecedentes_tratamiento']) ? $_POST['antecedentes_tratamiento'] : "Sin registro de tratamiento";
$metrorragia = isset($_POST['metrorragia']) ? $_POST['metrorragia'] : "N/A";
$hormonoterapia = isset($_POST['hormonoterapia']) ? $_POST['hormonoterapia'] : "N/A";
$duracion_hormonoterapia = isset($_POST['hormonoterapia']) ?  ( isset($_POST['duracion_hormonoterapia']) ? $_POST['duracion_hormonoterapia'] : "Sin registro de duración") : "N/A";
$ritmo = isset($_POST['ritmo']) ? $_POST['ritmo'] : "No registrado";
$antecedente_cancer_cervicouterino = isset($_POST['antecedente_cancer_cervicouterino']) ? $_POST['antecedente_cancer_cervicouterino'] : "0";
$tratamiento_previo = isset($_POST['antecedente_cancer_cervicouterino']) ? (isset($_POST['tratamiento_previo']) ? $_POST['tratamiento_previo'] : "Sin registro del tratamiento") : "N/A";



$insertaratecion = "INSERT INTO atencion_medica (edad_inicio_menstruacion,metodos_planificacion,cual,edad_inicio_vida_sexual,parejas_sexuales,gestas,para,cesareas,abortos, fecha_ultima_regla,fecha_ultimo_papanicolau,antecedentes_tratamiento,atecedentes_lesion,id_paciente,fecha_atencion_medica,metrorragia,hormonoterapia,duracion_hormonoterapia,ritmo,antecedente_cancer_cervicouterino,tratamiento_previo) VALUES ('$edad_inicio_menstruacion','$metodos_planificacion','$cual','$edad_inicio_vida_sexual','$parejas_sexuales','$gestas', '$para','$cesareas','$abortos','$fecha_ultima_regla','$fecha_ultimo_papanicolau','$antecedentes_tratamiento', '$atecedentes_lesion','$idpaciente','$hoys','$metrorragia','$hormonoterapia','$duracion_hormonoterapia', '$ritmo','$antecedente_cancer_cervicouterino','$tratamiento_previo')";
$resultadoinsertaratencion = $mysqliL->query($insertaratecion);
//   echo $sql11.'<br>';
$id_ant_atencionmedica = $mysqliL->insert_id;

$sql1 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion) VALUES ('$idpaciente','','','$id_usuario','$id_ant_atencionmedica')";
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
$vaginoscopia = isset($_POST['vaginoscopia_acetico']) ? $_POST['vaginoscopia_acetico'] : "N/A";
$vaginoscopia_lugol = isset( $_POST['vaginoscopia_lugol']) ?  $_POST['vaginoscopia_lugol'] : "N/A";
$miscelaneos = $_POST['miscelaneos'];
$posible_recomendacion_diagnostica = $_POST['posible_recomendacion_diagnostica'];
$recomendacion_diagnostica = $_POST['recomendacion_diagnostica'];
$vulvoscopia_acetico = isset($_POST['vulvoscopia_acetico']) ? $_POST['vulvoscopia_acetico'] : "N/A";
$insertaestudio_colposcopico = "INSERT INTO estudio_colposcopico (colposcopia,causa,cervix,union_escamocolumnar,zona_transformacion,epitelio_acetoblanco,ep_criterios_menores,ep_criterios_intermedios,ep_criterios_mayores,bs_criterios_menores,bs_criterios_intermedios, bs_criterios_mayores,ag_criterios_menores,ag_criterios_intermedios,ag_criterios_mayores,cy_menores,cy_intermedios,cy_mayores,schiller, vaginoscopia_acetico,vaginoscopia_lugol,miscelaneos,posible_recomendacion_diagnostica,fecha_estudio,vulvoscopia_acetico)  VALUES ('$colposcopia','$causa','$cervix','$union_escamocolumnar','$zona_transformacion','$epitelio_acetoblanco','$ep_criterios_menores','$ep_criterios_intermedios','$ep_criterios_mayores', '$bs_criterios_menores','$bs_criterios_intermedios','$bs_criterios_mayores','$ag_criterios_menores','$ag_criterios_intermedios','$ag_criterios_mayores', '$cy_menores','$cy_intermedios','$cy_mayores','$schiller','$vaginoscopia','$vaginoscopia_lugol','$miscelaneos','$posible_recomendacion_diagnostica','$hoys','$vulvoscopia_acetico')";
$resultadoinsertaestudio_colposcopico = $mysqliL->query($insertaestudio_colposcopico);
$id_ant_colposcopico = $mysqliL->insert_id;

$sql2 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion) VALUES ('$idpaciente','$id_ant_colposcopico','1','$id_usuario','$id_ant_atencionmedica')";
$resulta2 = $mysqliL->query($sql2);

////////////////////obtencion de parametros papanicolau/////////////////////////////////////////////////////
$clasificacion_medico=$_POST['clasificacion_medico'];
$antecedente_cancer = $_POST['antecedente_cancer'];
$antecedente_infeccion_vagina = $_POST['antecedente_infeccion_vagina'];
$observaciones_papinocolau = $_POST['observaciones_papinocolau'];

if (!empty(trim($observaciones_papinocolau)) || isset($_POST['antecedente_infeccion_vagina']) || isset($_POST['observaciones_papinocolau']) ) {
  $observaciones_papinocolau = !empty(trim($observaciones_papinocolau)) ? $observaciones_papinocolau : "Sin observaciones registradas";
  $antecedente_cancer = isset($_POST['antecedente_cancer']) ? $_POST['antecedente_cancer'] : 0;
  $antecedente_infeccion_vagina = isset($_POST['antecedente_infeccion_vagina']) ?  $_POST['antecedente_infeccion_vagina'] : 0;
  $insertaestudio_papanicolau = "INSERT INTO estudio_papanicolau (antecedente_cancer,antecedente_infeccion_vagina,observaciones_papinocolau,fecha_estudio) VALUES ('$antecedente_cancer','$antecedente_infeccion_vagina','$observaciones_papinocolau','$hoys')";

  $resultadoestudio_papanicolau = $mysqliL->query($insertaestudio_papanicolau);
  $id_ant_estudio_papanicolau = $mysqliL->insert_id;

  $sql3 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,clasificacion_medico)
   VALUES ('$idpaciente','$id_ant_estudio_papanicolau','7','$id_usuario','$id_ant_atencionmedica','$clasificacion_medico')";
  $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas CERVIX/////////////////////////////////////////////////////
$senalizacion = $_POST['senalizacion'];
$clasificacion_medicocervix=$_POST['clasificacion_medicocervix'];
$coordCervix = $_POST["coordCervix"];

if (!empty(trim($senalizacion)) || !empty(trim($coordCervix)) ) {
  $insertaestudio_biopsia_cervix = "INSERT INTO estudio_biopsia_cervix (senalizacion,fecha_estudio,coordenadas)
   VALUES ('$senalizacion','$hoys','$coordCervix')";
  $resultadoestudio_biopsia_cervix = $mysqliL->query($insertaestudio_biopsia_cervix);

  $id_ant_estudio_biopsia_cervix = $mysqliL->insert_id;

  $sql3 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,clasificacion_medico)
  VALUES ('$idpaciente','$id_ant_estudio_biopsia_cervix','2','$id_usuario','$id_ant_atencionmedica','$clasificacion_medicocervix')";
  $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas DE VULVOSCOPIA/////////////////////////////////////////////////////
$anotaciones_vulvoscopia = $_POST['anotaciones_vulvoscopia'];
$clasificacion_medicoVulvo=$_POST['clasificacion_medicoVulvo'];
$coordVulva = $_POST["coordVulva"];


if (!empty(trim($anotaciones_vulvoscopia)) && !empty(trim($coordVulva))) {
  $insertaestudio_vulvoscopia = "INSERT INTO estudio_vulvoscopia (anotaciones_vulvoscopia,fecha_estudio,coordenadas)
   VALUES ('$anotaciones_vulvoscopia','$hoys','$coordVulva')";
  $resultadoestudio_vulvoscopia = $mysqliL->query($insertaestudio_vulvoscopia);

  $id_ant_estudio_vulvoscopia = $mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,clasificacion_medico)
  VALUES ('$idpaciente','$id_ant_estudio_vulvoscopia','6','$id_usuario','$id_ant_atencionmedica','$clasificacion_medicoVulvo')";
  $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas DE VAGINOSCOPIA/////////////////////////////////////////////////////
$estudio_solicitar_vaginoscopia = $_POST['estudio_solicitar_vaginoscopia'];
$anotaciones_vaginoscopia = $_POST['anotaciones_vaginoscopia'];
$clasificacion_medicovagi=$_POST['clasificacion_medicovagi'];
if (!empty(trim($anotaciones_vaginoscopia)) || !empty(trim($estudio_solicitar_vaginoscopia))) {

  $anotaciones_vaginoscopia = (!empty(trim($anotaciones_vaginoscopia))) ? $anotaciones_vaginoscopia : "Sin anotaciones de la biopsia";
  $insertaestudio_vaginoscopia = "INSERT INTO estudio_vaginoscopia (estudio_solicitar_vaginoscopia,anotaciones_vaginoscopia,fecha_estudio) VALUES ('$estudio_solicitar_vaginoscopia','$anotaciones_vaginoscopia','$hoys')";
  $resultadoestudio_vaginoscopia = $mysqliL->query($insertaestudio_vaginoscopia);

  $id_ant_estudio_vaginoscopia = $mysqliL->insert_id;

  $sql3 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,clasificacion_medico)
  VALUES ('$idpaciente','$id_ant_estudio_vaginoscopia','5','$id_usuario','$id_ant_atencionmedica','$clasificacion_medicovagi')";
  $resulta3 = $mysqliL->query($sql3);
}

////////////////////obtencion de parametros biopsas DE ENDOMETRIO/////////////////////////////////////////////////////
$observaciones_endometrio = $_POST['observaciones_endometrio'];
$clasificacion_medicoendo=$_POST['clasificacion_medicoendo'];
if (!empty(trim($observaciones_endometrio))) {

  $insertaestudio_biopsia_endometrio = "INSERT INTO estudio_biopsia_endometrio (observaciones_endometrio,fecha_estudio) VALUES ('$observaciones_endometrio','$hoys')";
  $resultadoestudio_biopsia_endometrio = $mysqliL->query($insertaestudio_biopsia_endometrio);

  $id_ant_estudio_biopsia_endometrio = $mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,clasificacion_medico)
  VALUES ('$idpaciente','$id_ant_estudio_biopsia_endometrio','4','$id_usuario','$id_ant_atencionmedica','$clasificacion_medicoendo')";
  $resulta3 = $mysqliL->query($sql3);
}
$imagenCont = 1;
foreach ($_POST["canvas"] as $canvas) {
  $directorio = 'imagesestudios/';
  //Validamos si la ruta de destino existe, en caso de no existir la creamos
  if (!file_exists($directorio)) {
    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
  }
  $dir = opendir($directorio); //Abrimos el directorio de destino
  $datos = explode(";", $canvas);
  $data = explode(",", $datos[1]);
  $sel = explode(",", $datos[0]);
  $seleccionado = sizeof($sel) == 2 ? 1 : 0;
  $filename = 'Atencion_' . $id_ant_atencionmedica.'_img'.$imagenCont . '_CAM'.'.jpg';
  $imagenCont++;
  if (file_put_contents($directorio . '/' . $filename , base64_decode($data[1]))) {
    $inserta_imagen = "INSERT INTO imagen (ruta_imagen,id_atencion_medica,fecha_imagen,seleccion) VALUES ('$filename','$id_ant_atencionmedica','$hoys', $seleccionado )";
    $resultado_inserta_imagen = $mysqliL->query($inserta_imagen);
  }
  closedir($dir); //Cerramos el directorio de destino
}

foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
  //Validamos que el archivo exista
  if ($_FILES["archivo"]["name"][$key]) {
    $filename = 'Atencion_' . $id_ant_atencionmedica.'-'. $h . $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
    $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
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
      $inserta_imagen = "INSERT INTO imagen (ruta_imagen,id_atencion_medica,fecha_imagen) VALUES ('$target_pat','$id_ant_atencionmedica','$hoys')";
      $resultado_inserta_imagen = $mysqliL->query($inserta_imagen);
      //$id_ant_atencionmedica


    } else { }
    closedir($dir); //Cerramos el directorio de destino
  }
}

//header("Location:consulta_paciente.php");
