<?php
  include('../coni/Localhost.php');
$idpaciente = $_GET['id_paciente'];
$id_atencion = $_GET['id_atencion'];
$id_imagen = $_GET['id_imagen'];
$consultasemanas = "SELECT * FROM imagen AS i WHERE i.id_imagen='$id_imagen'";

$resultadosemanas = $mysqliL->query($consultasemanas);

while ($resultadosemanas1 = $resultadosemanas->fetch_assoc()) {
    $ruta_imagen = $resultadosemanas1['ruta_imagen'];
}
echo $ruta_imagen;

unlink("imagesestudios/$ruta_imagen");//acá le damos la direccion exacta del archivo

$Modifi1 = "DELETE FROM imagen
WHERE id_imagen='$id_imagen'";

$Mo1= $mysqliL->query($Modifi1);


header("Location:editar_atencion_medica.php?id_paciente=$idpaciente&id_atencion=$id_atencion");

?>
