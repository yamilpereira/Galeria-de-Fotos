<?php
require_once("../includes/database.php");
require_once("../includes/user.php");

//$sql="insert into usuario(usuario,clave,nombre,apellido) values('jsonn','12','pereira','mendoza')";
//$resultado=$db->enviarconsultar($sql);

$usuario_obj=new Usuario();
$usuario=$usuario_obj->buscar_por_id(2);
if($usuario)
{
  echo $usuario["apellido"];
}
?>
