<?php
    function convertirFecha_mysql($fecha)
    {
        $partes = explode("/", $fecha);
        //La fecha espa–ola se convierte a fecha mysql
        return $partes[2]."-".$partes[1]."-".$partes[0];
    }
    
    function convertirFecha_normal($fecha)
    {
        $partes = explode("-", $fecha);
        //La fecha espa–ola se convierte a fecha mysql
        return $partes[2]."/".$partes[1]."/".$partes[0];
    }
?>