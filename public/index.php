<?php
require_once("../includes/database.php");
if(isset($db))
{
  echo "Fue creado";
}
else
{
  echo "no fue creado";
}
echo "<br />";

//$sql="insert into usuario(usuario,clave,nombre,apellido) values('jsonn','12','pereira','mendoza')";
//$resultado=$db->consultar($sql);
$sql="select * from usuario where usuario='jsonn'";
$resultado=$db->consultar($sql);
$usuario=$db->fetch_array($resultado);
if($usuario)
{
  echo $usuario["apellido"];
}
?>
