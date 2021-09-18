<!DOCTYPE html>
<html>
<head>
	<title>SITT</title>
<meta charset = "utf-8" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet"  href="css/registros.css">
<link type="text/css" rel="stylesheet" href="css/fontello.css" />
 <link rel="icon" type="image/png" href="img/logo-oficia.png">
</head>
<body>
	<header>
   <div class="menu">
     <ul>
      <li><a href="Buscar.php"><span class="icon-reply"></span> Atras</a></li>    
        
   </ul>
</div><br>
<center><h1>Resultados</h1></center><br>
<table>
	<tr>
		<th>Nombre</th>
		<th>Titulo de Documento</th>
		<th>Fecha de Examen</th>
		<th>Carrera</th>
		<th>Especialidad</th>
		<th>Presidente</th>
		<th>Secretario</th>
		<th>Vocal</th>
	</tr>
<?php
$conectar=mysqli_connect('localhost','root','','documento');
  //verificamos la conexion
  if(!$conectar){
    die("Error en la conexion:".mysqli_connect_error());
    }
    $where="";
$nombre=$_POST['nombre'];
 $clave=$_POST['clave'];
 $tipo_documento=$_POST['tipo_documento'];
 //////////////////// BOTON BUSCAR //////////////////////////////////////
 
if (isset($_POST['buscar']))
{
 
 
 
  if (empty($_POST['carrera']))
  {
    $where="where nombre like '".$nombre."%'";
  }
 
  else if (empty($_POST['nombre']))
  {
    $where="where carrera='".$carrera."'";
  }
 
  else
  {
    $where="where nombre like '".$nombre."%' and carrera='".$carrera."'";
  }
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
 
$alumnos="SELECT * FROM alumnos $where $limit";
$resAlumnos=$conexion->query($alumnos);
$resCarreras=$conexion->query($alumnos);
 
if(mysqli_num_rows($resAlumnos)==0)
{
  $mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?> 
</br>
</br>
<form action="Buscadores.php" method="GET">
<center><button type="button" value="Descargar" onclick="location.href='Reporte_Buscar.php?nombre=<?php echo $nombre ?>'">Descargar </button></center>
</body>
</html>
// $consul =("SELECT * FROM buscar WHERE nombre LIKE '%$nombre%' OR Presidente like '%$nombre%'OR Secretario like '%$nombre%'OR Vocal like '%$nombre%' ORDER BY  buscar.nombre ASC");
   
    // $consulta=mysqli_query($conectar,$consul);
         // while ($registro= mysqli_fetch_row($consulta)) {
      // echo "<tr>";
      // foreach ($registro as $ultimo) {
                // echo "<td>",utf8_encode($ultimo),"</td>";         
      // }
    // }
        // echo "</table><center>";
      /*Sector de Paginacion */

//$nombre="ggggg";
//echo "<a href='Reporte_Buscar.php?
//nombre=$nombre'>ffffff</a>";

?> 