<!DOCTYPE html>
<html>
<header>
<title>Programacion en C++</title>
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
  </style>
</header>
<body>

<button type="button" onclick="loadDoc()">Contenido</button>
<br><br>
<table id="demo"></table>

<script>
  function loadDoc() 
  {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        myFunction(this);
      }
    };
    xhttp.open("GET", "contenido.xml", true);
    xhttp.send();
  }
  function myFunction(xml) 
  {
    var i;
    var xmlDoc = xml.responseXML;
    var table="<tr><th>Tema</th><th>Fecha de modificacion</th></tr>";
    var x = xmlDoc.getElementsByTagName("tema");
    for (i = 0; i <x.length; i++) { 
      table += "<tr><td>" +
      x[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue +
      "</td><td>" +
      x[i].getElementsByTagName("fecha")[0].childNodes[0].nodeValue +
      "</td></tr>";
    }
    document.getElementById("demo").innerHTML = table;
}
</script>

</body>
</html>
