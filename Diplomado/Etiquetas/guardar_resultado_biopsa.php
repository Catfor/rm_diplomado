<?php
  include('../../coni/Localhost.php');
$id_tipo_estudio=$_GET['id_tipo_estudio'];
$id_paciente=$_GET['id_paciente'];
$id_estudio=$_GET['id_estudio'];
$id_atencion=$_GET['id_atencion'];
$clasifiacion_patologo=$_GET['clasifiacion_patologo'];
$descripcion_microscopica=$_GET['descripcion_microscopica'];
$descripcion_macroscopica=$_GET['descripcion_macroscopica'];
$impresion_diagnostica=$_GET['impresion_diagnostica'];
$observaciones=$_GET['observaciones'];


date_default_timezone_set('America/Mexico_City');
$hoys = date("Y-m-d H:i:s");
switch ($id_tipo_estudio) {
    case 1:
    $sql11 = "INSERT INTO resultado_biopsia
    (descripcion_microscopica,descripcion_macroscopica,impresion_diagnostica,observaciones,fecha)
    VALUES
    ('$descripcion_microscopica','$descripcion_macroscopica','$impresion_diagnostica','$observaciones','$hoys')";

   $resultaq = $mysqliL->query($sql11);

   $id_estudio_resultado = $mysqliL->insert_id;

    $Modifi = "UPDATE ctrl_paciente_estudios
    SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
  WHERE id_atencion='$id_atencion' and id_paciente='$id_paciente' and  id_tipo_estudio='$id_tipo_estudio' and id_estudio='$id_estudio' ";

   $Mo= $mysqliL->query($Modifi);
  header('Location: ../consulta_estudios.php');
      break;
    case 2:
    $sql11 = "INSERT INTO resultado_biopsia
    (descripcion_microscopica,descripcion_macroscopica,impresion_diagnostica,observaciones,fecha)
    VALUES
    ('$descripcion_microscopica','$descripcion_macroscopica','$impresion_diagnostica','$observaciones','$hoys')";

   $resultaq = $mysqliL->query($sql11);

   $id_estudio_resultado = $mysqliL->insert_id;

    $Modifi = "UPDATE ctrl_paciente_estudios
    SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
  WHERE id_atencion='$id_atencion' and id_paciente='$id_paciente' and  id_tipo_estudio='$id_tipo_estudio' and id_estudio='$id_estudio' ";

   $Mo= $mysqliL->query($Modifi);
  header('Location: ../consulta_estudios.php');
      break;
    case 3:
    $sql11 = "INSERT INTO resultado_biopsia
    (descripcion_microscopica,descripcion_macroscopica,impresion_diagnostica,observaciones,fecha)
    VALUES
    ('$descripcion_microscopica','$descripcion_macroscopica','$impresion_diagnostica','$observaciones','$hoys')";

   $resultaq = $mysqliL->query($sql11);

   $id_estudio_resultado = $mysqliL->insert_id;

    $Modifi = "UPDATE ctrl_paciente_estudios
    SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
  WHERE id_atencion='$id_atencion' and id_paciente='$id_paciente' and  id_tipo_estudio='$id_tipo_estudio' and id_estudio='$id_estudio' ";

   $Mo= $mysqliL->query($Modifi);
  header('Location: ../consulta_estudios.php');
        break;
    case 4:
    $sql11 = "INSERT INTO resultado_biopsia
    (descripcion_microscopica,descripcion_macroscopica,impresion_diagnostica,observaciones,fecha)
    VALUES
    ('$descripcion_microscopica','$descripcion_macroscopica','$impresion_diagnostica','$observaciones','$hoys')";

   $resultaq = $mysqliL->query($sql11);

   $id_estudio_resultado = $mysqliL->insert_id;

    $Modifi = "UPDATE ctrl_paciente_estudios
    SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
  WHERE id_atencion='$id_atencion' and id_paciente='$id_paciente' and  id_tipo_estudio='$id_tipo_estudio' and id_estudio='$id_estudio' ";

   $Mo= $mysqliL->query($Modifi);
header('Location: ../consulta_estudios.php');
          break;
        case 5:
        $sql11 = "INSERT INTO resultado_biopsia
        (descripcion_microscopica,descripcion_macroscopica,impresion_diagnostica,observaciones,fecha)
        VALUES
        ('$descripcion_microscopica','$descripcion_macroscopica','$impresion_diagnostica','$observaciones','$hoys')";

       $resultaq = $mysqliL->query($sql11);

       $id_estudio_resultado = $mysqliL->insert_id;

        $Modifi = "UPDATE ctrl_paciente_estudios
        SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
      WHERE id_atencion='$id_atencion' and id_paciente='$id_paciente' and  id_tipo_estudio='$id_tipo_estudio' and id_estudio='$id_estudio' ";

       $Mo= $mysqliL->query($Modifi);
header('Location: ../consulta_estudios.php');
              break;
            case 6:
            $sql11 = "INSERT INTO resultado_biopsia
            (descripcion_microscopica,descripcion_macroscopica,impresion_diagnostica,observaciones,fecha)
            VALUES
            ('$descripcion_microscopica','$descripcion_macroscopica','$impresion_diagnostica','$observaciones','$hoys')";

           $resultaq = $mysqliL->query($sql11);

           $id_estudio_resultado = $mysqliL->insert_id;

            $Modifi = "UPDATE ctrl_paciente_estudios
            SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
          WHERE id_atencion='$id_atencion' and id_paciente='$id_paciente' and  id_tipo_estudio='$id_tipo_estudio' and id_estudio='$id_estudio' ";

           $Mo= $mysqliL->query($Modifi);
    header('Location: ../consulta_estudios.php');
                  break;
                  case 7:
                  $sql11 = "INSERT INTO resultado_biopsia
                  (descripcion_microscopica,descripcion_macroscopica,impresion_diagnostica,observaciones,fecha)
                  VALUES
                  ('$descripcion_microscopica','$descripcion_macroscopica','$impresion_diagnostica','$observaciones','$hoys')";

                 $resultaq = $mysqliL->query($sql11);

                 $id_estudio_resultado = $mysqliL->insert_id;

                  $Modifi = "UPDATE ctrl_paciente_estudios
                  SET id_estudio_resultado='$id_estudio_resultado',clasifiacion_patologo='$clasifiacion_patologo',estatus_patologo='1'
                WHERE id_atencion='$id_atencion' and id_paciente='$id_paciente' and  id_tipo_estudio='$id_tipo_estudio' and id_estudio='$id_estudio' ";

                 $Mo= $mysqliL->query($Modifi);
          header('Location: ../consulta_estudios.php');
                        break;
}


 ?>
