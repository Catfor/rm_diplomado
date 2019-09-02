
 <form action="check-login.php" method="POST">
   <div class="icon1">
     <span class="fa fa-user"></span>
     <input type="email" name='email' placeholder="Correo Electronico" required=""/>
   </div>
   <div class="icon1">
     <span class="fa fa-lock"></span>
     <input type="password" name='password' placeholder="Contraseña" required=""/>
   </div>
   <!--<div class="login-check">
      <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
   </div>-->
   <?php
   if(isset($_GET['error'])){
if($_GET['error']==1){
//imprimes el error
echo '<enter><h4><font color="black">Usuario Y contraseña Incorrecta</font></h4></center>';
}

}
if(isset($_GET['error'])){
if($_GET['error']==2){
//imprimes el error
echo '<enter><h4><font color="black">Usuario No Activo</font></h4></center>';
}

}
if(isset($_GET['error'])){
if($_GET['error']==3){
//imprimes el error
echo '<enter><h4><font color="black">No ingresaste los datos correctamente</font></h4></center>';
}

}
?>
   <div class="bottom">
     <button class="btn">Ingresar</button>
   </div>

 </form>
