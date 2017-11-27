<?php require_once("../../includes/initialize.php");?>
<?php if(!$sesion->estalogueado()){  header('Location: login.php');}?>
<?php incluir_plantillas("admin_header.php")?>
<?php

$archivo_txt="/var/www/html/Php/intermedio/Semana 3/GaleriaMejorado/logs/log.txt";
/*   is_readable — Indica si un fichero existe y es legible
Devuelve TRUE si el fichero o directorio especificado por filename existe y es legible, FALSE si no. */
/*
trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
*/
?>
    <table>
      <thead>
        <tr>
          <th colspan="6" style="text-align:center;">Atividades de los clientes</th>
        </tr>
      </thead>
      <tbody>

          <?php
            if(file_exists($archivo_txt) && is_readable($archivo_txt) && $archivo=fopen($archivo_txt,"r"))
            {
              while (!feof($archivo)) {
                $contenido=trim(fgets($archivo));
                echo "<tr>";
                echo "<td style='text-align:left;' >".$contenido." </td>";
                echo "</tr>";
              }
              fclose($archivo);
            }
          ?>
      </tbody>
    </table>
<?php incluir_plantillas("footer.php")?>
