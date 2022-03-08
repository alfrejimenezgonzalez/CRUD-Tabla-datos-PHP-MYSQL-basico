<?php
    //Incluimos una biblioteca de funciones
    include("funciones.php");
    
    //Comprobamos que los datos obligatorios son v‡lidos
    //En otra aproximaci—n podr’amos crear una funci—n para validar el DNI
    //La fecha est‡ validada en javascript en el formulario, pero tambien la podr’amos validar aqu’
    if( isset($_GET['dni']) && $_GET['dni']!="")
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
           $consulta = $db->prepare( "  DELETE from alumnos where dni =  :dni  " );

            //La consulta tiene parámetros que empiezan por :, son como variables donde se pueden meter datos. Esos datos se introducen con el siguiente array $parametros
            
            $parametros = array(

                "dni" => $dni

            );
            
            if( $consulta->execute($parametros) )
                header("Location: mostrarAlumnos.php");
            else
                echo "Error: el alumno no ha podido eliminar correctamente";
        
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Error: algunos de los campos no se han rellenado";
    echo "\t<a href='pedirAlumno.php'>Volver</a>";
    
?>