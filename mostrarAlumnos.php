<html>
    <head>
        <title>Listado de los alumnos</title>
		<link href="css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>	
	<style>
body {
  background-color: grey;
  -moz-transition: all 0.5s;
  -o-transition: all 0.5s;
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
  font-family: 'Roboto', Arial, Tahoma, sans-serif; }

  td {
	  color:white;
  }
	  
</style>
<?php
    include ("funciones.php");
    
    //Primer paso: Conectamos al Sistema Gestor de Bases de Datos MySQL
    $DBServer = 'localhost';
    $DBUser   = 'root';
    $DBPass   = '';
    $DBName = 'curso';
    
    try{
     
        //Primer paso: Creamos la conexi—n a la tabla de la BD
	$db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
       
        //Segundo paso: Consulta a la base de datos personas
        $consulta = $db->prepare("select * from alumnos");
	$consulta->execute(); //No tiene par‡metros as’ que no le pasamos nada
   
        //Tercer paso: procesando los datos, para cada registro o fila de la consulta...
        echo "\t<h1>Estos son los alumnos de este curso:</h1>\n";
        echo "\t<table>\n";
        echo "\t<tr><th scope='col'>DNI</th><th scope='col'>Nombre</th><th scope='col'>Fecha</th></tr>";
        while($alumno = $consulta->fetch()){
	   echo "\t<tr>\n";
	   echo "\t\t<td>".$alumno["dni"]."</td>".
		"<td>".$alumno["nombre"]."</td>".
		"<td>".convertirFecha_normal($alumno["fecha"])."</td>\n";
		echo "<td><a href='eliminar.php?dni=".$alumno["dni"]."'><img src='eliminar.png' width='30px' height='30px' </a></td>\n";
		echo "<td><a href='editar.php?dni=".$alumno["dni"]."'><img src='modificar.png' width='30px' height='30px' </a></td>";
	   echo "\t</tr>";
        }
        echo "\t</table>";
   
        $db=null;
    
    }catch(PDOException $e){
     echo "ERROR: " . $e->getMessage();
    }
    
    echo "\t<br/>\n";
    echo "\t<center><a href='pedirAlumno.php'><h2>Insertar un alumno nuevo</a>";
	    echo "\t<center><a href='pedirAlumno.php'><h4>ALFREDO Mantenimiento / CRUD de la tabla Alumno </a>";

?>
    </body>
</html>