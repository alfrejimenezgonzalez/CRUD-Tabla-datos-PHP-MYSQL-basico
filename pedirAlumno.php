<?php
    //pedirAlumno.php
    //Descripci—n: presenta un formulario para que el usuario introduzca
    //los datos de un alumno nuevo
?>
<html>
    <head>
        <title>Introducir un alumno nuevo</title>
        <link	rel=stylesheet type="text/css" href="css/calendar-estilo.css"/>
        <link	rel=stylesheet type="text/css" href="css/estilos.css"/>
        <script type="text/javascript" src="js/calendar.js"></script>
        <script type="text/javascript" src="js/calendar-es.js"></script>
        <script type="text/javascript" src="js/calendar-setup.js"></script>
    </head>
    <body>        
        <h1>Introduzca los datos del nuevo alumno</h1>
        <form name="datosAlumno" action="insertarAlumno.php" method="get">
        <table>
            <tr>
                <td>Introduzca el dni: </td><td><input type="text" name="dni"/></td>
            </tr>
            <tr>
                <td>Introduzca el nombre: </td><td><input type="text" name="nombre"/></td>
            </tr>
            <tr>
                <td>Introduzca su fecha de nacimiento: </td><td><input type="hidden" name="fecha" id="fecha" />
                    <span style="color: blue; text-decoration:underline;" 
                    onmouseover="this.style.cursor='pointer'; this.style.cursor='hand'; this.style.backgroundColor='#ff8'; this.style.textDecoration='none';"
                    onmouseout="this.style.backgroundColor='#ffc'; this.style.textDecoration='underline';"
                    id="fecha_usuario"> 
                    Selecciona la fecha
                    </span></td>
            </tr>
            <tr>
                <td><input type="submit" value="Insertar"/></td>
            </tr>
        </table>
        </form>
        <script type="text/javascript">
        Calendar.setup({
          inputField: "fecha",
          ifFormat:   "%d/%m/%Y",
          weekNumbers: false,
          displayArea: "fecha_usuario",
          daFormat:    "%A, %d de %B de %Y"
        });
        </script>
    </body>
</html>