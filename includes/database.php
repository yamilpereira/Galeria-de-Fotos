<?php
require_once("config.php");

class MySQLBD
{
  private $conexion;
  function __construct()
  {
    $this->conectar();
  }
  public function conectar()
  {
    //"localhost","root","root","galeria_photos"
    $this->conexion=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if(!$this->conexion)
    {
      die("Error en la conexion de la base de datos");
    }
    else
    {
      echo "Conexion exitosa";
    }
  }
  public function desconectar()
  {
    if(isset($this->conexion))
    {
       mysqli_close($this->conexion);
       unset($this->conexion);
    }
  }
}
$db=new MySQLBD();

?>
