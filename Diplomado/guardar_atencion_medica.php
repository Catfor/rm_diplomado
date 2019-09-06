<?php
    include('../coni/Localhost.php');
////////////////////obtencion de parametros atencion medica/////////////////////////////////////////////////////
date_default_timezone_set('America/Mexico_City');
 $hoys = date("Y-m-d H:i:s");
$edad_inicio_menstruacion = date('Y-m-d', strtotime($_GET['edad_inicio_menstruacion']));
$metodos_planificacion=$_GET['metodos_planificacion'];
$cual=$_GET['cual'];
$edad_inicio_vida_sexual=$_GET['edad_inicio_vida_sexual'];
$parejas_sexuales=$_GET['parejas_sexuales'];
$gestas=$_GET['gestas'];
$para=$_GET['para'];
$cesareas=$_GET['cesareas'];
$abortos=$_GET['abortos'];
$fecha_ultima_regla = date('Y-m-d', strtotime($_GET['fecha_ultima_regla']));
$fecha_ultimo_papanicolau = date('Y-m-d', strtotime($_GET['fecha_ultimo_papanicolau']));
$atecedentes_lesion=$_GET['atecedentes_lesion'];
$antecedentes_tratamiento=$_GET['antecedentes_tratamiento'];
$idpaciente=$_GET['idpaciente'];

$insertaratecion= "INSERT INTO atencion_medica
  (edad_inicio_menstruacion,metodos_planificacion,cual,edad_inicio_vida_sexual,parejas_sexuales,gestas,para,cesareas,abortos,
    fecha_ultima_regla,fecha_ultimo_papanicolau,antecedentes_tratamiento,atecedentes_lesion,id_paciente)
  VALUES
  ('$edad_inicio_menstruacion','$metodos_planificacion','$cual','$edad_inicio_vida_sexual','$parejas_sexuales','$gestas',
  '$para','$cesareas','$abortos','$fecha_ultima_regla','$fecha_ultimo_papanicolau','$antecedentes_tratamiento',
  '$atecedentes_lesion','$idpaciente')";
  $resultadoinsertaratencion = $mysqliL->query($insertaratecion);
    //   echo $sql11.'<br>';
      $id_ant_atencionmedica=$mysqliL->insert_id;

      $sql1 = "INSERT INTO ctrl_paciente_estudios
        (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,fecha_estudio)
        VALUES
        ('$idpaciente','','','','$id_ant_atencionmedica','$hoys')";
            $resulta1 = $mysqliL->query($sql1);
////////////////////obtencion de parametros colposcopia/////////////////////////////////////////////////////////////
$colposcopia=$_GET['colposcopia'];
if ($colposcopia==''){
}else{
$causa=$_GET['causa'];
$cervix=$_GET['cervix'];
$union_escamocolumnar=$_GET['union_escamocolumnar'];
$zona_transformacion=$_GET['zona_transformacion'];
$epitelio_acetoblanco=$_GET['epitelio_acetoblanco'];
$ep_criterios_menores=$_GET['ep_criterios_menores'];
$ep_criterios_intermedios=$_GET['ep_criterios_intermedios'];
$ep_criterios_mayores=$_GET['ep_criterios_mayores'];
$bs_criterios_menores=$_GET['bs_criterios_menores'];
$bs_criterios_intermedios=$_GET['bs_criterios_intermedios'];
$bs_criterios_mayores=$_GET['bs_criterios_mayores'];
$ag_criterios_menores=$_GET['ag_criterios_menores'];
$ag_criterios_intermedios=$_GET['ag_criterios_intermedios'];
$ag_criterios_mayores=$_GET['ag_criterios_mayores'];
$cy_menores=$_GET['cy_menores'];
$cy_intermedios=$_GET['cy_intermedios'];
$cy_mayores=$_GET['cy_mayores'];
$schiller=$_GET['schiller'];
$vaginoscopia=$_GET['vaginoscopia'];
$vulvoscopia=$_GET['vulvoscopia'];
$miscelaneos=$_GET['miscelaneos'];
$posible_recomendacion_diagnostica=$_GET['posible_recomendacion_diagnostica'];
$recomendacion_diagnostica=$_GET['recomendacion_diagnostica'];
$insertaestudio_colposcopico= "INSERT INTO estudio_colposcopico
  (colposcopia,causa,cervix,union_escamocolumnar,zona_transformacion,epitelio_acetoblanco,ep_criterios_menores,ep_criterios_intermedios,ep_criterios_mayores,bs_criterios_menores,bs_criterios_intermedios,
  bs_criterios_mayores,ag_criterios_menores,ag_criterios_intermedios,ag_criterios_mayores,cy_menores,cy_intermedios,cy_mayores,schiller,vaginoscopia,vulvoscopia,miscelaneos,posible_recomendacion_diagnostica,recomendacion_diagnostica)
  VALUES
  ('$colposcopia','$causa','$cervix','$union_escamocolumnar','$zona_transformacion','$epitelio_acetoblanco','$ep_criterios_menores','$ep_criterios_intermedios','$ep_criterios_mayores',
    '$bs_criterios_menores','$bs_criterios_intermedios','$bs_criterios_mayores','$ag_criterios_menores','$ag_criterios_intermedios','$ag_criterios_mayores',
    '$cy_menores','$cy_intermedios','$cy_mayores','$schiller','$vaginoscopia','$vulvoscopia','$miscelaneos','$posible_recomendacion_diagnostica','$recomendacion_diagnostica')";
  $resultadoinsertaestudio_colposcopico = $mysqliL->query($insertaestudio_colposcopico);

      $id_ant_colposcopico=$mysqliL->insert_id;



$sql2 = "INSERT INTO ctrl_paciente_estudios
  (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,fecha_estudio)
  VALUES
  ('$idpaciente','$id_ant_colposcopico','1','','$id_ant_atencionmedica','$hoys')";
      $resulta2 = $mysqliL->query($sql2);
    }
////////////////////obtencion de parametros papanicolau/////////////////////////////////////////////////////

$antecedente_cancer=$_GET['antecedente_cancer'];
$antecedente_infeccion_vagina=$_GET['antecedente_infeccion_vagina'];
$observaciones_papinocolau=$_GET['observaciones_papinocolau'];
if($antecedente_cancer==''){

}
else{
  $insertaestudio_papanicolau= "INSERT INTO estudio_papanicolau
    (antecedente_cancer,antecedente_infeccion_vagina,observaciones_papinocolau)
    VALUES
    ('$antecedente_cancer','$antecedente_infeccion_vagina','$observaciones_papinocolau')";
    $resultadoestudio_papanicolau = $mysqliL->query($insertaestudio_papanicolau);

        $id_ant_estudio_papanicolau=$mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
    (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,fecha_estudio)
    VALUES
    ('$idpaciente','$id_ant_estudio_papanicolau','7','','$id_ant_atencionmedica','$hoys')";
        $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas CERVIX/////////////////////////////////////////////////////
$senalizacion=$_GET['senalizacion'];
if($senalizacion==''){

}
else{
  $insertaestudio_biopsia_cervix= "INSERT INTO estudio_biopsia_cervix
    (senalizacion)
    VALUES
    ('$senalizacion')";
    $resultadoestudio_biopsia_cervix = $mysqliL->query($insertaestudio_biopsia_cervix);

        $id_ant_estudio_biopsia_cervix=$mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
    (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,fecha_estudio)
    VALUES
    ('$idpaciente','$id_ant_estudio_biopsia_cervix','2','','$id_ant_atencionmedica','$hoys')";
        $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas DE VULVOSCOPIA/////////////////////////////////////////////////////
$anotaciones_vulvoscopia=$_GET['anotaciones_vulvoscopia'];
if($anotaciones_vulvoscopia==''){

}else{
  $insertaestudio_vulvoscopia= "INSERT INTO estudio_vulvoscopia
    (anotaciones_vulvoscopia)
    VALUES
    ('$anotaciones_vulvoscopia')";
    $resultadoestudio_vulvoscopia = $mysqliL->query($insertaestudio_vulvoscopia);

        $id_ant_estudio_vulvoscopia=$mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
    (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,fecha_estudio)
    VALUES
    ('$idpaciente','$id_ant_estudio_vulvoscopia','6','','$id_ant_atencionmedica','$hoys')";
        $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas DE VAGINOSCOPIA/////////////////////////////////////////////////////
$estudio_solicitar_vaginoscopia=$_GET['estudio_solicitar_vaginoscopia'];
$anotaciones_vaginoscopia=$_GET['anotaciones_vaginoscopia'];
if($estudio_solicitar_vaginoscopia==''){

}else{
  $insertaestudio_vaginoscopia= "INSERT INTO estudio_vaginoscopia
    (estudio_solicitar_vaginoscopia,anotaciones_vaginoscopia)
    VALUES
    ('$estudio_solicitar_vaginoscopia','$anotaciones_vaginoscopia')";
    $resultadoestudio_vaginoscopia = $mysqliL->query($insertaestudio_vaginoscopia);

        $id_ant_estudio_vaginoscopia=$mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
    (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,fecha_estudio)
    VALUES
    ('$idpaciente','$id_ant_estudio_vaginoscopia','5','','$id_ant_atencionmedica','$hoys')";
        $resulta3 = $mysqliL->query($sql3);
}
////////////////////obtencion de parametros biopsas DE ENDOMETRIO/////////////////////////////////////////////////////

$observaciones_endometrio=$_GET['observaciones_endometrio'];
if($observaciones_endometrio==''){

}else{
  $insertaestudio_biopsia_endometrio= "INSERT INTO estudio_biopsia_endometrio
    (observaciones_endometrio)
    VALUES
    ('$observaciones_endometrio')";
    $resultadoestudio_biopsia_endometrio = $mysqliL->query($insertaestudio_biopsia_endometrio);

        $id_ant_estudio_biopsia_endometrio=$mysqliL->insert_id;


  $sql3 = "INSERT INTO ctrl_paciente_estudios
    (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,fecha_estudio)
    VALUES
    ('$idpaciente','$id_ant_estudio_biopsia_endometrio','4','','$id_ant_atencionmedica','$hoys')";
        $resulta3 = $mysqliL->query($sql3);
}
/////////////////////////////////////////////

 ?>
