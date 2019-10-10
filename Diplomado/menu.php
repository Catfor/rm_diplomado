
<?php
if($rol=='Medico'){
echo "
<div class='mobile-menu-area'>
  <div class='container'>
      <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
              <div class='mobile-menu'>
                  <nav id='dropdown'>
                      <ul class='mobile-menu-nav'>

                      <li><a  href='consulta_paciente.php'><i class='notika-icon notika-form'></i>Ver Lista Paciente</a></li>
                      <li><a  href='consulta_estudios.php'><i class='notika-icon notika-windows'></i>Consultas Realizadas</a></li>
                     <li><a href='resultados.php'><i class='notika-icon notika-form'></i>Lista Resultados</a></li>


                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Main Menu area start-->
<div class='main-menu-area mg-tb-40'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <ul class='nav nav-tabs notika-menu-wrap menu-it-icon-pro'>

                    <li><a  href='consulta_paciente.php'><i class='notika-icon notika-form'></i>Ver Lista Paciente</a></li>
                     <li><a  href='consulta_estudios.php'><i class='notika-icon notika-windows'></i>Consultas Realizadas</a></li>
                    <li><a href='resultados.php'><i class='notika-icon notika-form'></i>Lista Resultados</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
";
}
else if($rol=='Enfermera'){
echo "
<div class='mobile-menu-area'>
  <div class='container'>
      <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
              <div class='mobile-menu'>
                  <nav id='dropdown'>
                      <ul class='mobile-menu-nav'>

                                  <li><a href='consulta_paciente1.php'>Ver Lista Pacientes</a></li>
                                  <li><a href='alta_paciente1.php'>Registro Paciente</a></li>


                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Main Menu area start-->
<div class='main-menu-area mg-tb-40'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <ul class='nav nav-tabs notika-menu-wrap menu-it-icon-pro'>
                 <li><a  href='alta_paciente1.php'><i class='notika-icon notika-form'></i>Alta Paciente</a>
                    </li>
                    <li><a  href='consulta_paciente1.php'><i class='notika-icon notika-form'></i>Consultar Pacientes</a>
                      </li>


                </ul>
            </div>
        </div>
    </div>
</div>
";
}
else if($rol=='Supervisor'){
echo "<div class='mobile-menu-area'>
  <div class='container'>
      <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
              <div class='mobile-menu'>
                  <nav id='dropdown'>
                      <ul class='mobile-menu-nav'>
                                  <li><a href='sistema.php'>Inicio</a></li>
                                  <li><a href='consulta_estudios.php'>Consultas Realizadas</a></li>
                                  <li><a  href=''><i class='notika-icon notika-form'></i>Resultados Entregados</a></li>



                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Main Menu area start-->
<div class='main-menu-area mg-tb-40'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <ul class='nav nav-tabs notika-menu-wrap menu-it-icon-pro'>
                    <li><a  href='sistema.php'><i class='notika-icon notika-form'></i>Inicio</a></li>
                    <li><a  href='consulta_estudios.php'><i class='notika-icon notika-form'></i>Consultas Realizadas</a></li>
                    <li><a  href=''><i class='notika-icon notika-form'></i>Resultados Entregados</a></li>


                </ul>
            </div>
        </div>
    </div>
</div>";
}
else if($rol=='Patologo'){
echo "<div class='mobile-menu-area'>
  <div class='container'>
      <div class='row'>
          <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
              <div class='mobile-menu'>
                  <nav id='dropdown'>
                      <ul class='mobile-menu-nav'>
<li><a href='sistema.php'>Inicio</a></li>
                                  <li><a href='consulta_estudios.php'>Consultas Realizadas </a></li>



                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Main Menu area start-->
<div class='main-menu-area mg-tb-40'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <ul class='nav nav-tabs notika-menu-wrap menu-it-icon-pro'>
                <li><a  href='sistema.php'><i class='notika-icon notika-form'></i>Inicio</a>
                  </li>
                    <li><a  href='consulta_estudios.php'><i class='notika-icon notika-form'></i>Consultas Realizadas</a>
                      </li>


                </ul>
            </div>
        </div>
    </div>
</div>";
}
/////////////////////////////////////////////////////////////////////////////
else if($rol=='Admin'){ ?>
  <div class="main-menu-area mg-tb-40">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li ><a href="Sistema.php"><i class="notika-icon notika-windows"></i>Inicio</a>
                    </li>
                      <li><a data-toggle="tab" href="#Enfermera"><i class="notika-icon notika-house"></i> Enfermera</a>
                      </li>
                      <li><a data-toggle="tab" href="#Medico"><i class="notika-icon notika-mail"></i> Medico</a>
                      </li>
                      <li><a data-toggle="tab" href="#Supervisor"><i class="notika-icon notika-edit"></i> supervisor Medico</a>
                      </li>
                      <li><a data-toggle="tab" href="#Patologo"><i class="notika-icon notika-bar-chart"></i> Patologo</a>
                      </li>
                      <li  class="active"><a data-toggle="tab" href="#Admin"><i class="notika-icon notika-windows"></i> Admin</a>
                      </li>
                  </ul>
                  <div class="tab-content custom-menu-content">
                      <div id="Enfermera" class="tab-pane in notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="alta_paciente1.php">Alta Paciente</a>
                              </li>
                              <li><a href="consulta_paciente1.php">Consultar Pacientes</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Medico" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="consulta_paciente.php">Ver Lista Pacientes</a>
                              </li>
                              <li><a href="consulta_estudios.php?opcion=M">Consultas Realizadas</a>
                              </li>
                              <li><a href="compose-email.html">Lista Resultados(En Fase de Desarrollo)</a>
                              </li>
                          </ul>
                      </div>
                      <div id="Supervisor" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="consulta_estudios.php?opcion=S">Consultas Realizadas</a>
                              </li>
                              <li><a href="google-map.html">Resultados Entregados(En Fase de Desarrollo)</a>
                              </li>

                          </ul>
                      </div>
                      <div id="Patologo" class="tab-pane notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="consulta_estudios.php?opcion=P">Consultas Realizadas (A quien son Asignadas)</a>
                              </li>
                              <li><a href="consulta_estudios.php?opcion=T">Consultas Realizadas(Tuyas)</a>
                              </li>


                          </ul>
                      </div>
                      <div id="Admin" class="tab-pane active notika-tab-menu-bg animated flipInX">
                          <ul class="notika-main-menu-dropdown">
                              <li><a href="Reiniciar.php">Reiniciar DB(Truncate)</a>
                              </li>
                              <li><a href="reporte.php">Reportes</a>
                              </li>
                              <li><a href="alta_usuario.php">Usuarios</a>
                              </li>

                              <li><a href="backups.php">Generar Backups</a>
                              </li>
                          </ul>
                      </div>


                  </div>
              </div>
          </div>
      </div>
  </div>




  <?php } ?>

 <!-- wow JS
 ============================================ -->

 <!--  Chat JS
 ============================================ -->

 <!--  todo JS
 ============================================ -->
