<?php
include('../coni/Localhost.php');
$id_atencion = $_POST['id_atencion'];
date_default_timezone_set('America/Mexico_City');
$idpaciente = $_POST['idpaciente'];
$hoys = date("Y-m-d H:i:s");
/*-------------------------------------colposcopia---------------------------------*/
$edad_inicio_menstruacion = $_POST['edad_inicio_menstruacion'];
$metodos_planificacion = $_POST['metodos_planificacion'];
$cual = $_POST['cual'];
$edad_en_que_fue_su_regla = $_POST['edad_en_que_fue_su_regla'];

$edad_inicio_vida_sexual = $_POST['edad_inicio_vida_sexual'];
$parejas_sexuales = $_POST['parejas_sexuales'];
$gestas = $_POST['gestas'];
$para = $_POST['para'];
$cesareas = $_POST['cesareas'];
$abortos = $_POST['abortos'];
$fecha_ultima_regla = $_POST['fecha_ultima_regla'];
$fecha_ultimo_papanicolau = $_POST['fecha_ultimo_papanicolau'];
$atecedentes_lesion = $_POST['atecedentes_lesion'];
$antecedentes_tratamiento = $_POST['antecedentes_tratamiento'];

$metrorragia = $_POST['metrorragia'];
$hormonoterapia = $_POST['hormonoterapia'];
$duracion_hormonoterapia = $_POST['duracion_hormonoterapia'];
$ritmo = $_POST['ritmo'];
$antecedente_cancer_cervicouterino = $_POST['antecedente_cancer_cervicouterino'];
$tratamiento_previo = $_POST['tratamiento_previo'];

/*----------------------------------------------------------------------*/
$Modifi = "UPDATE atencion_medica
SET edad_inicio_menstruacion='$edad_inicio_menstruacion',metodos_planificacion='$metodos_planificacion',cual='$cual',
edad_en_que_fue_su_regla='$edad_en_que_fue_su_regla',edad_inicio_vida_sexual='$edad_inicio_vida_sexual',parejas_sexuales='$parejas_sexuales',
gestas='$gestas',para='$para',cesareas='$cesareas',abortos='$abortos',fecha_ultima_regla='$fecha_ultima_regla',fecha_ultimo_papanicolau='$fecha_ultimo_papanicolau',
metrorragia='$metrorragia',hormonoterapia='$hormonoterapia',duracion_hormonoterapia='$duracion_hormonoterapia'
,ritmo='$ritmo'
,antecedente_cancer_cervicouterino='$antecedente_cancer_cervicouterino'
,tratamiento_previo='$tratamiento_previo'
WHERE id_atencion_medica='$id_atencion'";

$Mo = $mysqliL->query($Modifi);
if ($atecedentes_lesion != '') {

  $Modifi = "UPDATE atencion_medica
SET atecedentes_lesion='$atecedentes_lesion'
WHERE id_atencion_medica='$id_atencion'";

  $Mo = $mysqliL->query($Modifi);
}

if ($antecedentes_tratamiento != '') {

  $Modifi = "UPDATE atencion_medica
SET antecedentes_tratamiento='$antecedentes_tratamiento'
WHERE id_atencion_medica='$id_atencion'";

  $Mo = $mysqliL->query($Modifi);
}


/*-------------------------------------papanicolau---------------------------------*/

$clasificacion_medico = isset($_POST['clasificacion_medico']) ? $_POST['clasificacion_medico'] : 'Normal';
$antecedente_cancer = isset($_POST['antecedente_cancer']) ? $_POST['antecedente_cancer'] : 0;
$antecedente_infeccion_vagina = isset($_POST['antecedente_infeccion_vagina']) ? $_POST['antecedente_infeccion_vagina'] : 0;
$observaciones_papinocolau = isset($_POST['observaciones_papinocolau']) ? $_POST['observaciones_papinocolau'] : '';

if (!empty(trim($observaciones_papinocolau)) || (isset($_POST['antecedente_infeccion_vagina']) && $_POST['antecedente_infeccion_vagina'] == 1) || (isset($_POST['antecedente_cancer'])  && $_POST['antecedente_cancer'] == 1)) {
  $observaciones_papinocolau = !empty(trim($observaciones_papinocolau)) ? $observaciones_papinocolau : "Sin observaciones registradas";
  $insertaestudio_papanicolau = "UPDATE estudio_papanicolau e INNER JOIN ctrl_paciente_estudios ct ON ct.id_atencion = $id_atencion AND ct.id_tipo_estudio = 7 AND ct.id_estudio = e.id_estudio SET e.antecedente_cancer ='$antecedente_cancer', e.antecedente_infeccion_vagina='$antecedente_infeccion_vagina', e.observaciones_papinocolau='$observaciones_papinocolau',e.fecha_estudio='$hoys' ;";
  $resultadoestudio_papanicolau = $mysqliL->query($insertaestudio_papanicolau);
}

/*-------------------------------------cervix---------------------------------*/

$senalizacion = $_POST['senalizacion'];
$clasificacion_medicocervix=$_POST['clasificacion_medicoCervix'];
$coordCervix = $_POST["coordCervix"];
if (!empty(trim($senalizacion)) || !empty($coordCervix) ) {
  $insertaestudio_biopsia_cervix = "UPDATE estudio_biopsia_cervix e INNER JOIN ctrl_paciente_estudios ct ON ct.id_atencion = $id_atencion AND ct.id_tipo_estudio = 2 AND ct.id_estudio = e.id_estudio SET e.senalizacion = '$senalizacion', e.fecha_estudio = '$hoys', e.coordenadas = '$coordCervix', e.antecedente_cancer_cervicouterino = '$antecedente_cancer_cervicouterino' ;";
  $resultadoestudio_biopsia_cervix = $mysqliL->query($insertaestudio_biopsia_cervix);
  
}

/*-------------------------------------vulvo---------------------------------*/

$anotaciones_vulvoscopia = $_POST['anotaciones_vulvoscopia'];
$clasificacion_medicoVulvo=$_POST['clasificacion_medicoVulvo'];
$coordVulva = $_POST["coordVulva"];


if (!empty(trim($anotaciones_vulvoscopia)) && !empty(trim($coordVulva))) {
  $insertaestudio_vulvoscopia = "UPDATE estudio_vulvoscopia e INNER JOIN ctrl_paciente_estudios ct ON ct.id_atencion = $id_atencion AND ct.id_tipo_estudio = 6 AND ct.id_estudio = e.id_estudio SET e.anotaciones_vulvoscopia = '$anotaciones_vulvoscopia' ,e.fecha_estudio = '$hoys' ,e.coordenadas = '$coordVulva' ;";
  $resultadoestudio_vulvoscopia = $mysqliL->query($insertaestudio_vulvoscopia);
}

/*-------------------------------------vagino---------------------------------*/

$estudio_solicitar_vaginoscopia = $_POST['estudio_solicitar_vaginoscopia'];
$anotaciones_vaginoscopia = $_POST['anotaciones_vaginoscopia'];
$clasificacion_medicovagi=$_POST['clasificacion_medicoVagi'];
if (!empty(trim($anotaciones_vaginoscopia)) || !empty(trim($estudio_solicitar_vaginoscopia))) {

  $anotaciones_vaginoscopia = (!empty(trim($anotaciones_vaginoscopia))) ? $anotaciones_vaginoscopia : "Sin anotaciones de la biopsia";
  $insertaestudio_vaginoscopia = "UPDATE estudio_vaginoscopia e INNER JOIN ctrl_paciente_estudios ct ON ct.id_atencion = $id_atencion AND ct.id_tipo_estudio = 5 AND ct.id_estudio = e.id_estudio SET e.estudio_solicitar_vaginoscopia='$estudio_solicitar_vaginoscopia',e.anotaciones_vaginoscopia='$anotaciones_vaginoscopia',e.fecha_estudio='$hoys' ";
  $resultadoestudio_vaginoscopia = $mysqliL->query($insertaestudio_vaginoscopia);
}

/*-------------------------------------endo---------------------------------*/

$observaciones_endometrio = $_POST['observaciones_endometrio'];
$clasificacion_medicoendo=$_POST['clasificacion_medicoEndo'];
if (!empty(trim($observaciones_endometrio))) {

  $insertaestudio_biopsia_endometrio = "UPDATE estudio_biopsia_endometrio e INNER JOIN ctrl_paciente_estudios ct ON ct.id_atencion = $id_atencion AND ct.id_tipo_estudio = 4 AND ct.id_estudio = e.id_estudio SET e.observaciones_endometrio='$observaciones_endometrio' ,e.fecha_estudio='$hoys'";
  $resultadoestudio_biopsia_endometrio = $mysqliL->query($insertaestudio_biopsia_endometrio);
}

/*-------------------------------------canvas---------------------------------*/
//Este bloque es omitido porque se considera que no se modifiquen imagenes directamente desde la camara web / colpos
/*-------------------------------------imagenes---------------------------------*/
//Solo agregará imagenes
foreach ($_FILES["archivo"]['tmp_name'] as $key => $tmp_name) {
  //Validamos que el archivo exista
  if ($_FILES["archivo"]["name"][$key]) {
    $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
    $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
    echo ($filename);
    $directorio = 'imagesestudios/'; //Declaramos un  variable con la ruta donde guardaremos los archivos

    //Validamos si la ruta de destino existe, en caso de no existir la creamos
    if (!file_exists($directorio)) {
      mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
    }

    $dir = opendir($directorio); //Abrimos el directorio de destino
    $target_path = $directorio . '/' . $id_atencion . '-' . $idpaciente . $filename; //Indicamos la ruta de destino, así como el nombre del archivo
    $target_pat = $id_atencion . '-' . $idpaciente . $filename;
    //Movemos y validamos que el archivo se haya cargado correctamente
    //El primer campo es el origen y el segundo el destino
    if (move_uploaded_file($source, $target_path)) {
      $inserta_imagen = "INSERT INTO imagen (ruta_imagen,id_atencion_medica,fecha_imagen) VALUES ('$target_pat','$id_atencion','$hoys')";
      $resultado_inserta_imagen = $mysqliL->query($inserta_imagen);
      //$id_ant_atencionmedica


    } else { }
    closedir($dir); //Cerramos el directorio de destino
  }
}
?>