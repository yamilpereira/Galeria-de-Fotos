<?php
require_once("../includes/database.php");
require_once("../includes/user.php");


$resultado=Usuario::buscar_todos();

echo '<pre>';
print_r($resultado);
echo '</pre>';

foreach($resultado as  $resultados) {
  echo $resultados->nombre_completo()." <br />";
}

$resul=Usuario::buscar_por_id(3);
echo $resul->nombre;



?>
