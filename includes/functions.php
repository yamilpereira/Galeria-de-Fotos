<?php
  function incluir_plantillas($plantilla)
  {
    include("../layouts/{$plantilla}");
  }
  function grabar_acciones($accion,$mensaje)
  {
    if(!function_exists('fopen'))
    {
        exit("fopen function does not exist");
    }
    else {
      $ruta_archivo="/var/www/html/Php/intermedio/Semana 3/GaleriaMejorado/logs/log.txt";
      if($archivo = fopen($ruta_archivo,"a"))
      {
        $tiempo=date("Y-m-d | h:i:sa");
        $cadena=$tiempo." | ".$accion." | ".$mensaje."\n";
        fwrite($archivo,$cadena);
        fclose($archivo);
      }
      else
      {
        echo "NO se ha podido registrar";
      }
    }
  }
?>
