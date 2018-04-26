<!DOCTYPE html>
<html>
<header>
    <title>Programacion en C++</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../CSS/normalize.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Index.css">
    <link rel="stylesheet" type="text/css" href="../CSS/usuarios.css">
    <style>
      table,th,td 
      {
        border : 1px solid black;
        border-collapse: collapse;
      }
      th,td 
      {
        padding: 5px;
      }
      table
      {
        width: 90%;
        margin: 5%;
      }

      div.botones
      {
        margin-right: 0px;
      }
    </style>
</header>
<body>
  <header>
      <p>Reportes</p>
  </header>
  <section id="usuarios">

    <div id="color2" class="botones">
      <button class="boton" type="button" onclick=" contenido() ">Contenido</button>
    </div>

    <div id="color1" class="botones">
      <button class="boton" type="button" onclick="publicaciones()">Publicaciones</button>
    </div>

    <div id="color3" class="botones">
      <button class="boton" type="button" onclick="usuarios()">Usuarios</button>
    </div>

    <table id="demo"></table>

  </section>

  <script>
    function contenido() 
    {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() 
      {
        if (this.readyState == 4 && this.status == 200) 
        {
          myFunctionContenido(this);
        }
      };
      xhttp.open("GET", "XML/ContenidoXML.php", true);
      xhttp.send();
    }
    function myFunctionContenido(xml) 
    {
      var i;
      var xmlDoc = xml.responseXML;
      var table="<tr><th>Nombre</th><th>Fecha</th></tr>";
      var x = xmlDoc.getElementsByTagName("tema");
      for (i = 0; i <x.length; i++) 
      { 
        table += "<tr><td>" +
        x[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("fecha")[0].childNodes[0].nodeValue +
        "</td></tr>";
      }
      document.getElementById("demo").innerHTML = table;
    }
    /////////////////////////////////////////////////////////////////////////////////////////////
    function publicaciones() 
    {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() 
      {
        if (this.readyState == 4 && this.status == 200) 
        {
          myFunctionPublicaciones(this);
        }
      };
      xhttp.open("GET", "XML/PublicacionesXML.php", true);
      xhttp.send();
    }
    function myFunctionPublicaciones(xml) 
    {
      var i;
      var xmlDoc = xml.responseXML;
      var table="<tr><th>Publicacion</th><th>Fecha</th><th>Nombre</th><th>Nick</th></tr>";
      var x = xmlDoc.getElementsByTagName("foro");
      for (i = 0; i <x.length; i++) 
      { 
        table += "<tr><td>" +
        x[i].getElementsByTagName("publicacion")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("fecha")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue +
        x[i].getElementsByTagName("paterno")[0].childNodes[0].nodeValue +
        x[i].getElementsByTagName("materno")[0].childNodes[0].nodeValue +
        "</td><td>" +
         x[i].getElementsByTagName("nick")[0].childNodes[0].nodeValue +
        "</td></tr>";
      }
      document.getElementById("demo").innerHTML = table;
    }
    //////////////////////////////////////////////////////////////////////////////////////////
    function usuarios() 
    {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() 
      {
        if (this.readyState == 4 && this.status == 200) 
        {
          myFunctionUsuarios(this);
        }
      };
      xhttp.open("GET", "XML/UsuariosXML.php", true);
      xhttp.send();
    }
    function myFunctionUsuarios(xml) 
    {
      var i;
      var xmlDoc = xml.responseXML;
      var table="<tr><th>Nombre</th><th>Correo</th><th>Sexo</th><th>Nacimiento</th><th>Nick</th><th>Contraseña</th><th>Fecha</th></tr>";
      var x = xmlDoc.getElementsByTagName("usuario");
      
      for (i = 0; i<x.length; i++) 
      { 
        table += "<tr><td>" +
        x[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue +
        x[i].getElementsByTagName("paterno")[0].childNodes[0].nodeValue +
        x[i].getElementsByTagName("materno")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("correo")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("sexo")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("nacimiento")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("nick")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("password")[0].childNodes[0].nodeValue +
        "</td><td>" +
        x[i].getElementsByTagName("fecha")[0].childNodes[0].nodeValue +
        "</td></tr>";
      }
      document.getElementById("demo").innerHTML = table;
    }

  </script>

</body>
</html>
