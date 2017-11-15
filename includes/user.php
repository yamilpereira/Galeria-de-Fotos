<?php
require_once("database.php");

class Usuario
{
  public function buscar_por_id($id)
  {
    global $db;
    $sql ="SELECT * FROM usuario where id={$id}";
    $resultado=$db->enviarconsultar($sql);
    $usuario=$db->fetch_array($resultado);
    return $usuario;
  }
}

?>
