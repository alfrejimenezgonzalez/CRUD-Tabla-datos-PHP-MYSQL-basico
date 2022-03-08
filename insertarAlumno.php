<?php
    //Incluimos una biblioteca de funciones
    include("funciones.php");
    
    //Comprobamos que los datos obligatorios son v‡lidos
    //En otra aproximaci—n podr’amos crear una funci—n para validar el DNI
    //La fecha est‡ validada en javascript en el formulario, pero tambien la podr’amos validar aqu’
    if( $_GET['dni']!="" && $_GET['nombre']!="" && $_GET['fecha']!="" )
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
            
            //Segundo paso: Consulta de inserci—n a la base de datos personas
            $fechaMysql = convertirFecha_mysql($fecha);
            $consulta = $db->prepare( "insert into alumnos(dni, nombre, fecha) values(:dni, :nombre, :fecha)" );
            $parametros = array(
                "dni"=>$dni,
                "nombre"=>$nombre,
                "fecha"=>$fechaMysql
            );
            
            if( $consulta->execute($parametros) )
                header("Location: mostrarAlumnos.php");
            else
                echo "Error: el alumno no ha podido insertarse correctamente";
        
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Error: algunos de los campos no se han rellenado";
    echo "\t<a href='pedirAlumno.php'>Volver</a>";
    
?>