<?php require_once("../../includes/initialize.php");?>
<?php if(!$sesion->estalogueado()){  header('Location: login.php');}?>
<?php
  $archivo_txt="/var/www/html/Php/intermedio/Semana 3/GaleriaMejorado/logs/log.txt";
  /*   is_readable — Indica si un fichero existe y es legible
  Devuelve TRUE si el fichero o directorio especificado por filename existe y es legible, FALSE si no. */
  /*
  trim — Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
  */
  if(isset($_GET["limpiar"]) && $_GET["limpiar"]=="1")
  {
     file_put_contents($archivo_txt,"");
     grabar_acciones("limpiar"," El usuario ". $sesion->id." has limpiado el archivo log");
     header('Location: logfile.php');
  }

?>
<?php incluir_plantillas("admin_header.php")?>
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
          <tr>
            <th colspan="6" style="text-align:center;color: #303030"><a href="logfile.php?limpiar=1" style="color: #303030">Eliminar el archivo</a></th>
          </tr>
      </tbody>
    </table>
<?php incluir_plantillas("footer.php")?>
