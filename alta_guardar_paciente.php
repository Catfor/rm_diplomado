<?php
include('Localhost.php');
date_default_timezone_set('America/Mexico_City');
 $hoy = date("Y-m-d H:i:s");
$nombre_paciente=$_GET['nombre_paciente'];
$apellidos_paciente=$_GET['apellidos_paciente'];
$edad_paciente=$_GET['edad_paciente'];
$estado_civil=$_GET['estado_civil'];
$direccion_paciente=$_GET['direccion_paciente'];
$municipio_paciente=$_GET['municipio_paciente'];
$codigo_postal=$_GET['codigo_postal'];
$tipo_seguro=$_GET['tipo_seguro'];
$ingresomensual=$_GET['ingresomensual'];
$escolaridad_paciente=$_GET['escolaridad_paciente'];
$apoyo_gubernamental_paciente=$_GET['apoyo_gubernamental_paciente'];
$razon_apoyo_paciente=$_GET['razon_apoyo_paciente'];
$nombre_familiar_paciente=$_GET['nombre_familiar_paciente'];
$telefono_familiar_paciente=$_GET['telefono_familiar_paciente'];
$celular_familiar_paciente=$_GET['celular_familiar_paciente'];
$nombre_contacto_paciente=$_GET['nombre_contacto_paciente'];
$telefono_contacto_paciente=$_GET['telefono_contacto_paciente'];
$celular_contacto_paciente=$_GET['celular_contacto_paciente'];
$sql11 = "INSERT INTO paciente
  (nombre_paciente,apellidos_paciente,edad_paciente,estado_civil
    ,direccion_paciente,municipio_paciente,codigo_postal,
    ingreso_mensual,escolaridad_paciente,
    apoyo_gubernamental_paciente,razon_apoyo_paciente
    ,nombre_familiar_paciente,telefono_familiar_paciente,
    celular_familiar_paciente
    ,nombre_contacto_paciente,telefono_contacto_paciente,celular_contacto_paciente,fecha_creacion)
  VALUES
  ('$nombre_paciente','$apellidos_paciente','$edad_paciente','$estado_civil','$direccion_paciente','$municipio_paciente',
    '$codigo_postal','$ingresomensual','$escolaridad_paciente','$apoyo_gubernamental_paciente',
    '$razon_apoyo_paciente','$nombre_familiar_paciente','$telefono_familiar_paciente','$celular_familiar_paciente',
    '$nombre_contacto_paciente','$telefono_contacto_paciente','$celular_contacto_paciente','$hoy')";
       $resultaq = $mysqliL->query($sql11);
       echo $sql11.'<br>';
       $id_bitacora=$mysqliL->insert_id;



for ($y=0; $y<count($tipo_seguro);  $y++) {
$tipos= $tipo_seguro[$y];
$sql112 = "INSERT INTO tipo_seguro
(nombre_tipo_seguro,id_paciente)
VALUES
('$tipos','$id_bitacora')";
   $resultaq123 = $mysqliL->query($sql112);
   }

   header("Location:Atencion_medica.php?id_paciente=$id_bitacora");

 ?>
