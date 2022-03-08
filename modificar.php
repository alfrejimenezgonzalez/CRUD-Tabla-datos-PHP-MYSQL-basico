<?php
			include ("funciones.php");

    if(isset($_GET['dni']) && $_GET['dni']!="" && isset($_GET['nombre']) &&$_GET['nombre']!="" && isset($_GET['fecha']) && $_GET['fecha']!="" )
    {
        $dni = $_GET['dni'];
        $nombre = $_GET['nombre'];
        $fecha = $_GET['fecha'];
        
        $DBServer = 'localhost';
        $DBUser   = 'root';
        $DBPass   = '';
        $DBName = 'curso';
    
        try{
            //Primer paso: Conectamos al Sistema Gestor de Bases de Datos MySQL
            $db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
            

            //Segundo paso: Consulta de delete
            $consulta = $db->prepare( "update alumnos set nombre=:nombre,fecha=:fecha where dni=:dni" );
            $parametros = array(
                "dni"=>$dni,
                "nombre"=>$nombre,
                "fecha"=>$fecha
            );
			//prueba
			

            if( $consulta->execute($parametros) )
                header("Location: mostrarAlumnos.php");
            else
                echo "Error: el alumno no ha podido actualizarse correctamente";
        
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Error: no se ha completado todos los datos";
    echo "\t<a href='modificar.php'>Volver</a>";
    
?>