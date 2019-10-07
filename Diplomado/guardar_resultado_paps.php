<?php
include("../coni/Localhost.php");
date_default_timezone_set('America/Mexico_City');
$hoys = date("Y-m-d H:i:s");
$id_paciente=$_POST['id_paciente'];
$id_estudio=$_POST['id_estudio'];
$id_tipo_estudio=$_POST['id_tipo_estudio'];
$id_atencion=$_POST['id_atencion'];





$celulas_endocervicales=$_POST['celulas_endocervicales'];
$Valor_estrogeneo=$_POST['Valor_estrogeneo'];
$flora_bacteriana =$_POST['flora_bacteriana'];
$flora_bacteriana_bacilar =$_POST['flora_bacteriana_bacilar'];
$flora_bacteriana_cocoide=$_POST['flora_bacteriana_cocoide'];
$flora_bacteriana_mixta=$_POST['flora_bacteriana_mixta'];
$clasifiacion_patologo=$_POST['clasifiacion_patologo'];
$polimorfonucleares=$_POST['polimorfonucleares'];
$citolisis=$_POST['citolisis'];
$parasitos_hongos=$_POST['parasitos_hongos'];
$tricomonas=$_POST['tricomonas'];///////////////
$celulas_guia=$_POST['celulas_guia'];
$histiocitos=$_POST['histiocitos'];
$eritrocitos=$_POST['eritrocitos'];
$candida=$_POST['candida'];
$otros=$_POST['otros'];
$interpretacion=$_POST['interpretacion'];
$observaciones=$_POST['observaciones'];



$sql11 = "INSERT INTO etiqueta_resultado_estudio_papanicolaou
(celulas_endocervicales,Valor_estrogeneo,flora_bacteriana_bacilar,flora_bacteriana_cocoide
  ,flora_bacteriana_mixta,polimorfonucleares,citolisis,parasitos_hongos,tricomonas
  ,celulas_guia,histiocitos,eritrocitos,candida,otros,interpretacion,observaciones,fecha_terminacion)
VALUES
('$celulas_endocervicales','$Valor_estrogeneo','$flora_bacteriana_bacilar','$flora_bacteriana_cocoide','$flora_bacteriana_mixta',
  '$polimorfonucleares','$citolisis','$parasitos_hongos','$tricomonas','$celulas_guia','$histiocitos','$eritrocitos',
  '$candida','$otros','$interpretacion','$observaciones','$hoys')";

$resultaq = $mysqliL->query($sql11);

$id_estudio_resultado = $mysqliL->insert_id;


$Modifi = "UPDATE ctrl_paciente_estudios
SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
WHERE id_paciente='$id_paciente' and id_estudio='$id_estudio' and id_tipo_estudio='$id_tipo_estudio' and id_atencion='$id_atencion' ";

$Mo= $mysqliL->query($Modifi);


for ($y = 0; $y < count($flora_bacteriana); $y++) {
  $flora_bacteriana1 = $flora_bacteriana[$y];
echo $flora_bacteriana1;




                                                               $sql11 = "INSERT INTO flora_bacteriana
                                                                   (id_resultado_papa,flora_bacteriana)
                                                                   VALUES
                                                                   ('$id_estudio_resultado','$flora_bacteriana1')";

                                                      $resultaq = $mysqliL->query($sql11);











}
  header("Location:consulta_estudios.php");
 ?>
