<!DOCTYPE html>
<?php
session_start();

setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


  include('../coni/Localhost.php');
  $id = $_SESSION['id_usuario'];
  $nick = $_SESSION['nick'];
  $correo_general = $_SESSION['correo_general'];
  $nombre_usuario = ucwords($_SESSION['nombre_usuario']);
  $apellidos_usuario = ucwords($_SESSION['apellidos_usuario']);
  $rol = $_SESSION['rol'];
  $id_paciente = $_GET['id_paciente'];

  $result123 = mysqli_query($mysqliL, "SELECT * from paciente where id_paciente=$id_paciente");

  $rowwe = mysqli_fetch_assoc($result123);
  $nombre_paciente = ucwords(strtolower($rowwe['nombre_paciente']));
  $apellidos_paciente = ucwords(strtolower($rowwe['apellidos_paciente']));
  $edad_paciente = $rowwe['edad_paciente'];
  $fecha_nacimiento_paciente = $rowwe['fecha_nacimiento_paciente'];

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

        <h2 class="name">Dra.<?php echo ' ' . $nombre_usuario . ' ' . $apellidos_usuario ;?></h2>
        <div class="address">Benemérita Universidad Autónoma de Puebla</div>
        <div class="address">Tollocan 402 Col. Cipres Toluca de Lerdo,Mèxico</div>
      </div>
      <div id="invoice">
        <div class="date"><b>00019</b></div>

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


          <tr>

            <td><b>Nombre del Paciente:</b><?php echo ' ' . $nombre_paciente . ' ' . $apellidos_paciente ;?></td>

            <td><b>Edad:</b><?php echo $edad_paciente; ?></td>

            <td><b>Fecha:</b><?php echo  date("d-m-Y") ; ?></td>

          </tr>
        </table>


        <table class="0">

          <tr>

            <td><b>Peso:</b>79kg </td>
            <td><b>Talla:</b>1.67</td>
            <td><b>Grupo:</b>o+ </td>
            <td><b>Temperatura:</b>36.1 °C </td>
            <td><b>T.A.:</b>105/64</td>
            <td><b>F.C:</b>90</td>
            <td><b>F.R:</b>2C</td>



          </tr>
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