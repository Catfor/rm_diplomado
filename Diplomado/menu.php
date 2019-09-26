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

                                  <li><a href='consulta_paciente.php'>Consultar Pacientes</a></li>
                                  <li><a href=''>Atención Médica</a></li>
                                  <li><a href='resultados.php'>Resultados</a></li>


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

                    </li>
                    <li><a  href='consulta_paciente.php'><i class='notika-icon notika-form'></i>Consultar Pacientes</a>
                      </li>
                     <li><a  href='consulta_estudios.php'><i class='notika-icon notika-windows'></i>Reporte De Consulta</a>
                    </li>
                    <li><a href='resultados.php'><i class='notika-icon notika-form'></i>Resultado Patología</a>
                    </li>

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

                                  <li><a href='consulta_paciente1.php'>Consultar Pacientes</a></li>
                                  <li><a href='alta_paciente1.php'>Alta Paciente</a></li>


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
                                  <li><a href='consulta_estudios.php'>Consultar Resultados</a></li>



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
                    <li><a  href='consulta_estudios.php'><i class='notika-icon notika-form'></i>Consultar Resultados</a>
                      </li>


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
                                  <li><a href='consulta_estudios.php'>Consultar </a></li>



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
                    <li><a  href='consulta_estudios.php'><i class='notika-icon notika-form'></i>Consultar Resultados</a>
                      </li>


                </ul>
            </div>
        </div>
    </div>
</div>";
}
 ?>
