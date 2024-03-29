<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Diplomado Reina Madre</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/logo/corona.png">
  <!-- Google Fonts
		============================================ -->

  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- font awesome CSS
		============================================ -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- wave CSS
		============================================ -->
  <link rel="stylesheet" href="css/wave/waves.min.css">
  <!-- Notika icon CSS
		============================================ -->
  <link rel="stylesheet" href="css/notika-custom-icon.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="css/main.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <style>
    .card:hover {
      box-shadow: 0 7px 20px 0 #a25cbfdd;
    }

    .card {
      transition: 0.5s;
      border-radius: 15px;
      padding: 30px;
    }
  </style>
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- Login Register area Start-->
  <div class="login-content">



    <!-- Login -->

    <div class="nk-block toggled card" id="l-login">
      <form action="check-login.php" method="POST">
        <div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="logo-area">
                <img src="img/logo/logo.webp" style="max-width:100%;" />
                <button class="btn btn-login btn-success btn-float" style="position: relative !important;top: 15px;"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
              </div>
            </div>
          </div>
          <div class="input-group">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
            <div class="nk-int-st">
              <input type="text" class="form-control" name='email' placeholder="Correo">
            </div>
          </div>
          <div class="input-group mg-t-15">
            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
            <div class="nk-int-st">
              <input type="password" class="form-control" name='password' placeholder="Password">
            </div>
          </div>
        </div>
        <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == 1) {
            //imprimes el error
            echo '
            <div class="alert alert-danger" role="warning">
              Credenciales no validas.
            </div>
          ';
          }

          if ($_GET['error'] == 2) {
            //imprimes el error
            echo '  <div class="alert alert-danger" role="alert">
                El usuario debe de ser un correo.
              </div>';
          }

          if ($_GET['error'] == 3) {
            //imprimes el error
            echo '

            <div class="alert alert-danger" role="alert">
              No pueden estar vacios alguno de los campos.
            </div>

                ';
          }
        }
        ?>
    </div>

    </form>







  </div>
  <!-- Login Register area End-->
  <!-- jquery
		============================================ -->
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="js/wow.min.js"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="js/jquery-price-slider.js"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="js/jquery.scrollUp.min.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="js/meanmenu/jquery.meanmenu.js"></script>
  <!-- counterup JS
		============================================ -->
  <script src="js/counterup/jquery.counterup.min.js"></script>
  <script src="js/counterup/waypoints.min.js"></script>
  <script src="js/counterup/counterup-active.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sparkline JS
		============================================ -->
  <script src="js/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/sparkline/sparkline-active.js"></script>
  <!-- flot JS
		============================================ -->
  <script src="js/flot/jquery.flot.js"></script>
  <script src="js/flot/jquery.flot.resize.js"></script>
  <script src="js/flot/flot-active.js"></script>
  <!-- knob JS
		============================================ -->
  <script src="js/knob/jquery.knob.js"></script>
  <script src="js/knob/jquery.appear.js"></script>
  <script src="js/knob/knob-active.js"></script>
  <!--  wave JS
		============================================ -->
  <script src="js/wave/waves.min.js"></script>
  <script src="js/wave/wave-active.js"></script>
  <!-- icheck JS
		============================================ -->
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/icheck/icheck-active.js"></script>
  <!--  todo JS
		============================================ -->
  <script src="js/todo/jquery.todo.js"></script>
  <!-- Login JS
		============================================ -->
  <script src="js/login/login-action.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="js/main.js"></script>
</body>

</html>