<html>
<head>
    <title>
        Embarazo
    </title>
</head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <form id="tuformulario" name="tuformulario" action="alta_guardar_paciente.php" method="GET" onsubmit="pregunta()">

    <center>
    <div class="row">
        <div class="col-xs-2">Nombres del paciente:
          <input type="text" name="nombre_paciente" >
         </div>

    </div>
    </center>
    <br/><br/>

    <center>
    <div class="row">
        <div class="col-xs-2">Apellidos:
          <input type="text" name="apellidos_paciente" >
         </div>

    </div>
    </center>
    <br/><br/>


      <center>
    <div class="col-xs-1">
      Edad:
      <select name="edad_paciente" class="form-control" required>
        <option value="">selecciona una opcion....</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
        <option value="60">60</option>
        <option value="61">61</option>
        <option value="62">62</option>
        <option value="63">63</option>
        <option value="64">64</option>
        <option value="65">65</option>
        <option value="66">66</option>
        <option value="67">67</option>
        <option value="68">68</option>
        <option value="69">69</option>
        <option value="70">70</option>
        <option value="71">71</option>
        <option value="72">72</option>
        <option value="73">73</option>
        <option value="74">74</option>
        <option value="75">75</option>
        <option value="76">76</option>
        <option value="77">77</option>
        <option value="78">78</option>
        <option value="79">79</option>
        <option value="80">80</option>
        <option value="81">81</option>
        <option value="82">82</option>
        <option value="83">83</option>
        <option value="84">84</option>
        <option value="85">85</option>
        <option value="86">86</option>
        <option value="87">87</option>
        <option value="88">88</option>
        <option value="89">89</option>
        <option value="90">90</option>
        <option value="91">91</option>
        <option value="92">92</option>
        <option value="93">93</option>
        <option value="94">94</option>
        <option value="95">95</option>
        <option value="96">96</option>
        <option value="97">97</option>
        <option value="98">98</option>
        <option value="99">99</option>
        <option value="100">100</option>

      </select>
    </div> <br>

  </center>







  <center>
<br><br><br><br>
    <div class="col-xs-2"><br>
      Estado Civil:
      <select name="estado_civil" class="form-control" required>
        <option value="" >Selecciona una opcion...</option>
          <option value="soltero." >Soltero/a.</option>
        <option value="  Comprometido/a.">Comprometido/a.</option>
        <option value="Casado/a." >Casado/a.</option>
        <option value="Casado/a." >Divorciado/a.</option>
        <option value="Casado/a." >Viudo/a.</option>

      </select>
    </div> <br>

    <center> <br> <br> <br>
    <div class="row">
        <div class="col-xs-2">Direcciòn Paciente:
          <input type="text" name="direccion_paciente" >
         </div>
         <div class="col-xs-2">
           Municipio:
        <input type="text" name="municipio_paciente" >
        </div>
        <div class="col-xs-2">
        Còdigo Postal:
       <input type="text" name="codigo_postal" >
       </div>
    </div>
    </center>

  <div class="row">
      <div class="col-xs-2">
        <p>

              Cuenta con algùn Tipo de Seguro:<br>

              <input type="checkbox" value='imss' name="tipo_seguro[]"> IMSS<br>

              <input type="checkbox" value='isste' name="tipo_seguro[]">ISSTE<br>

              <input type="checkbox" value='seguro_popular' name="tipo_seguro[]"> Seguro <br>

            </p>
       </div>

  </div>
  </center>

  <center>
    <div class="col-xs-2">
      Ingreso Mensual: :
      <select name="ingresomensual" class="form-control" required>
        <option value="">selecciona una opcion....</option>
        <option value="Menos de $2,000" >Menos de $2,000</option>
        <option value="Entre $2,000 y $6,000">Entre $2,000 y $6,000</option>
        <option value="Entre $6,001 y $12,000" >Entre $6,001 y $12,000</option>
        <option value="Menos de $2,000" >Menos de $2,000</option>
        <option value="Entre $2,000 y $6,000">Entre $2,000 y $6,000</option>
        <option value="Más de $12,001" >Más de $12,001</option>

      </select>
    </div>
</div> <br>

</center>

<center><br><br>

<div class="col-xs-2"><br>
  Escolaridad:
  <select name="escolaridad_paciente" class="form-control" >
    <option value="">selecciona una opcion....</option>
    <option value="sin estudios" >Sin estudios</option>
    <option value="primaria">Primaria</option>
    <option value="secundaria" >Secundaria</option>
    <option value="preparatoria">Preparatoria</option>
    <option value="universidad">Universidad</option>
</select>
</div>
</center>
<br><br><br><br>
<center>



<div class="col-xs-2"><br>
  Apoyo de programa gubernamental:
    <select name='apoyo_gubernamental_paciente ' id='apoyo_gubernamental_paciente 'class="form-control">
        <option value="" >selecciona...</option>
        <option value="si">Si</option>
        <option value="no">No</option>
    </select>
cual?
    <input id="razon_apoyo_paciente " type="text" disabled>
</div><br><br>


</center>
<br><br><br><br><br><br>
<h5>DATOS DE UN FAMILIAR</h5>
<center>

<div class="row"><br>
    <div class="col-xs-2">Nombre:
      <input type="text" name="nombre_familiar_paciente" >
     </div>
    </div>
</center>
<br/><br/>
<center>
<div class="row">
  <div class="col-xs-2">Telefono :
    <input name='telefono_familiar_paciente' type="text" maxlength="10"  />
   </div>
   <div class="col-xs-2">
     Celular:
<input name='celular_familiar_paciente' type="text" maxlength="10"    />
  </div>

</div>
</center>
<h5>DATOS DE UN CONTACTO</h5>
<center>
<div class="row"><br><br><br><br>
    <div class="col-xs-2">Nombre:
      <input type="text" name="nombre_contacto_paciente" >
     </div>
    </div>
</center>
<br/><br/><br/><br/>
<center>
<div class="row">
  <div class="col-xs-2">Telefono:
    <input name='telefono_contacto_paciente' type="text" maxlength="10"    />
   </div>
   <div class="col-xs-2">
     Celular:
<input name='celular_contacto_paciente' type="text" maxlength="10"    />
  </div>

</div>
</center>

<br/><br/>
<br><br>



<input type=button onclick="pregunta()" value="Enviar">


</form>
<script language="JavaScript">
$( function() {
    $("#apoyo_gubernamental_paciente ").change( function() {
        if ($(this).val() === "no") {
            $("#razon_apoyo_paciente ").prop("disabled", true);
        }
else if($(this).val() === ""){
$("#razon_apoyo_paciente ").prop("disabled", true);
}

        else {
            $("#razon_apoyo_paciente ").prop("disabled", false);
        }
    });
});</script>
<script language="JavaScript">
function pregunta(){
    if (confirm('¿Estas seguro de enviar este formulario?')){
       document.tuformulario.submit()
    }
}
</script>

</body>



    </html>
