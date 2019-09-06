<?php
////////////////////obtencion de parametros atencion medica/////////////////////////////////////////////////////
$edad_inicio_menstruacion=$_GET['edad_inicio_menstruacion'];
$metodos_planificacion=$_GET['metodos_planificacion'];
$cual=$_GET['cual'];
$edad_inicio_vida_sexual=$_GET['edad_inicio_vida_sexual'];
$parejas_sexuales=$_GET['parejas_sexuales'];
$gestas=$_GET['gestas'];
$para=$_GET['para'];
$cesareas=$_GET['cesareas'];
$abortos=$_GET['abortos'];
$fecha_ultimo_papanicolau = date('Y-m-d', strtotime($_GET['fecha_ultimo_papanicolau']));
$antecedentes_tratamiento=$_GET['antecedentes_tratamiento'];
$atecedentes_lesion=$_GET['atecedentes_lesion'];
$fecha_ultima_regla = date('Y-m-d', strtotime($_GET['fecha_ultima_regla']));
$fecha_ultimo_papanicolau = date('Y-m-d', strtotime($_GET['fecha_ultimo_papanicolau']));
////////////////////obtencion de parametros colposcopia/////////////////////////////////////////////////////
$colposcopia=$_GET['colposcopia'];
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
////////////////////obtencion de parametros papanicolau/////////////////////////////////////////////////////
$antecedente_cancer=$_GET['antecedente_cancer'];
$antecedente_infeccion_vagina=$_GET['antecedente_infeccion_vagina'];
$observaciones_papinocolau=$_GET['observaciones_papinocolau'];
////////////////////obtencion de parametros biopsas CERVIX/////////////////////////////////////////////////////
$senalizacion=$_GET['senalizacion'];
////////////////////obtencion de parametros biopsas DE VULVOSCOPIA/////////////////////////////////////////////////////
$anotaciones_vulvoscopia=$_GET['anotaciones_vulvoscopia'];
////////////////////obtencion de parametros biopsas DE VAGINOSCOPIA/////////////////////////////////////////////////////
$estudio_solicitar_vaginoscopia=$_GET['estudio_solicitar_vaginoscopia'];
$anotaciones_vaginoscopia=$_GET['anotaciones_vaginoscopia'];
////////////////////obtencion de parametros biopsas DE ENDOMETRIO/////////////////////////////////////////////////////

$observaciones_endometrio=$_GET['observaciones_endometrio'];



 ?>
