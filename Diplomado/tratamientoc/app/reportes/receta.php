<!DOCTYPE html>
<?php
session_start();
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  include('../../../../coni/Localhost.php');
  $id = $_SESSION['id_usuario'];
  $resultado = mysqli_query($mysqliL, "SELECT genero from usu_me where id_usuario=$id");
  $fila = mysqli_fetch_assoc($resultado);
  $genero = $fila["genero"];
  $nick = $_SESSION['nick'];
  $correo_general = $_SESSION['correo_general'];
  $nombre_usuario = ucwords($_SESSION['nombre_usuario']);
  $apellidos_usuario = ucwords($_SESSION['apellidos_usuario']);
  $rol = $_SESSION['rol'];
  $id_paciente = $_GET['id_paciente'];
  $resultado = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente=$id_paciente");
  $fila = mysqli_fetch_assoc($resultado);
  $nombre_paciente = ucwords(strtolower($fila['nombre_paciente']));
  $apellidos_paciente = ucwords(strtolower($fila['apellidos_paciente']));
  $edad_paciente = $fila['edad_paciente'];
  $fecha_nacimiento_paciente = $fila['fecha_nacimiento_paciente'];
  $dato_peso = "";
  $dato_talla = "";
  $dato_temp = "";
  $dato_sang = "";
  $dato_ta = "";
  $dato_fc = "";
  $dato_fr = "";
  $queryMedicamentos = "";
  $id_receta = 0;
  if (isset($_GET["id_receta"])) {
    $id_receta = $_GET['id_receta'];
    $queryMedicamentos = "SELECT c.* FROM (SELECT id_receta FROM ctrl_receta_medico c WHERE id_paciente = $id_paciente AND id_receta = $id_receta ORDER BY id_receta DESC LIMIT 1) r INNER JOIN ctrl_medicamento_receta c ON r.id_receta = c.id_receta";
    $resultadoAdicional = mysqli_query($mysqliL, "SELECT * FROM ctrl_receta_medico c WHERE id_paciente = $id_paciente AND id_receta = $id_receta ORDER BY id_receta DESC LIMIT 1");
    $filaAdicional = mysqli_fetch_assoc($resultadoAdicional);
    $dato_peso = $filaAdicional["peso"];
    $dato_talla = $filaAdicional["talla"];
    $dato_temp = $filaAdicional["temperatura"];
    $dato_sang = $filaAdicional["grupo_sanguineo"];
    $dato_ta = $filaAdicional["ta"];
    $dato_fc = $filaAdicional["fc"];
    $dato_fr = $filaAdicional["fr"];
    $id_receta = sprintf("%05d", $id_receta);
  } else {
    $resultado = mysqli_query($mysqliL, "SELECT id_receta FROM ctrl_receta_medico c WHERE id_paciente = $id_paciente ORDER BY id_receta DESC LIMIT 1");
    $fila = mysqli_fetch_assoc($resultado);
    $queryMedicamentos = "SELECT c.* FROM (SELECT id_receta FROM ctrl_receta_medico c WHERE id_paciente = $id_paciente ORDER BY id_receta DESC LIMIT 1) r INNER JOIN ctrl_medicamento_receta c ON r.id_receta = c.id_receta";
    $resultadoAdicional = mysqli_query($mysqliL, "SELECT * FROM ctrl_receta_medico c WHERE id_paciente = $id_paciente AND id_receta = ".$fila["id_receta"]." ORDER BY id_receta DESC LIMIT 1");
    $filaAdicional = mysqli_fetch_assoc($resultadoAdicional);
    $dato_peso = $filaAdicional["peso"];
    $dato_talla = $filaAdicional["talla"];
    $dato_temp = $filaAdicional["temperatura"];
    $dato_sang = $filaAdicional["grupo_sanguineo"];
    $dato_ta = $filaAdicional["ta"];
    $dato_fc = $filaAdicional["fc"];
    $dato_fr = $filaAdicional["fr"];
    $id_receta = sprintf("%05d", $fila["id_receta"]);
  }
  $resultado = $mysqliL->query($queryMedicamentos);
  ?>

  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Receta</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>

  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png">
      </div>
      <div id="client">
        <h2 class="name"><?php echo  ( $genero == 'H' ? 'Dr.' : 'Dra.') . ' ' . $nombre_usuario . ' ' . $apellidos_usuario; ?></h2>
        <div class="address">Benemérita Universidad Autónoma de Puebla</div>
        <div class="address">Tollocan 402 Col. Cipres Toluca de Lerdo,Mèxico</div>
      </div>
      <div id="invoice">
        <div class="date"><b><?php echo $id_receta; ?></b></div>
      </div>
      <div id="invoice1">
        <div class="date">C.P50120</div>
      </div>
      <div id="invoice2">
        <div class="date">Ced.Prof. 5446084</div>
      </div>
    </header>
    <div class="grid-block" style="background: url('reina1.png');height: 100%;-webkit-print-color-adjust: exact;background-repeat: no-repeat;">
      <main>
        <table>
          <tbody class="cabecera">
            <tr>
              <td><b>Nombre del Paciente:</b><?php echo ' ' . $nombre_paciente . ' ' . $apellidos_paciente; ?></td>
              <td><b>Edad:</b><?php echo ' ' . $edad_paciente; ?></td>
              <td><b>Fecha:</b><?php echo  ' ' . date("d M Y"); ?></td>
            </tr>
          </tbody>
        </table>
        <table class="0">
          <tbody class="cabecera">
            <tr>
              <td><b>Peso:</b><?php echo ' ' . $dato_peso ; ?> Kg </td>
              <td><b>Talla:</b><?php echo ' ' . $dato_talla ; ?></td>
              <td><b>Grupo:</b><?php echo ' ' . $dato_sang ; ?> </td>
              <td><b>Temperatura:</b><?php echo ' ' . $dato_temp ; ?> °C </td>
              <td><b>T.A.:</b><?php echo ' ' . $dato_ta ; ?></td>
              <td><b>F.C:</b><?php echo ' ' . $dato_fc ; ?></td>
              <td><b>F.R:</b><?php echo ' ' . $dato_fr ; ?></td>
            </tr>
          </tbody>
        </table>
        <table class="meds">
          <tbody>
            <?php
              while ($resTemp = $resultado->fetch_assoc()) {
                $medicamento = strtoupper($resTemp['medicamento']);
                $indicacion = ucwords($resTemp['indicaciones']);
                echo "<tr><td><b>$medicamento</b></td></tr>";
                echo "<tr><td>$indicacion</td></tr>";
              }
              ?>
          </tbody>
        </table>
      </main>
    </div>
    <footer>
      <h1> Firma del Médico </h1>
      <div id="company">
        <div>
          <FONT FACE="Arial" SIZE="2.5" style="color:rgb(93, 105, 117);">Reina Madre </FONT>
        </div>
        <div>
          <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">Toluca: 722 280 2002</FONT>
        </div>
        <div>
          <FONT FACE="Arial" SIZE="2" style="color:rgb(93, 105, 117);">CDMX: (55)85266020</FONT>
        </div>
        <div><a>www.reinamadre.mx</a></div>
      </div>
    </footer>
  </body>

  </html>
<?php
}
?>