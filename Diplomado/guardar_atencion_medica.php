<?php
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
/*
$colposcopia=$_GET['colposcopia'];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
$=$_GET[''];
*/

 ?>

 <script language="JavaScript">
 $( function() {
     $("#colposcopia").change( function() {
         if ($(this).val() !== "no_adecuada") {
             $("#causa ").prop("disabled", true);
         }

         else {
             $("#causa").prop("disabled", false);
         }
     });
 });
 </script>

 <script language="JavaScript">
 $("#campo1").change(function() {
       if($("#campo1").val() !== "0"){
         $('#diagnostico1').prop('disabled', false);
       }else{
         $('#diagnostico1').prop('disabled', 'disabled');
         $('#diagnostico2').prop('disabled', 'disabled');
         $('#diagnostico3').prop('disabled', 'disabled');
       }
     });

     $("#diagnostico1").change(function() {
       if($("#diagnostico1").val() !== "0"){
         $('#diagnostico2').prop('disabled', false);
       }else{
         $('#diagnostico2').prop('disabled', 'disabled');
         $('#diagnostico3').prop('disabled', 'disabled');
       }
     });
 </script>
