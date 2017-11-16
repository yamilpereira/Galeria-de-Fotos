<?php
require_once("config.php");

class MySQLBD
{
  private $conexion;
  private $ultima_consulta;
  private $mq_activo;
  private $real_escape_string;
  function __construct()
  {
      $this->abrirconexion();
      $this->mq_activo=get_magic_quotes_gpc();
      $this->real_escape_string=function_exists("mysqli_real_escape_string");

  }
  public function abrirconexion()
  {
    //"localhost","root","root","galeria_photos"
    $this->conexion=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    if(!$this->conexion)
    {
      die("Error en la conexion de la base de datos");
    }

  }
  public function enviarconsulta($sql)
  {
    $this->ultima_consulta=$sql;
     $resultado=mysqli_query($this->conexion,$sql);
     $this->verficar_consulta($resultado);
     return $resultado;
  }
  public function fetch_array($resultado)
  {
     return mysqli_fetch_array($resultado);
  }
  public function affected_rows()
  {
    return mysqli_affected_rows($this->conexion);
  }
  public function insert_id()
  {
    return mysqli_insert_id($this->conexion);
  }
  public function num_rows($resultado)
  {
    return mysqli_num_rows($resultado);
  }
  public function preparar_consulta($consulta)
  {

     if($this->real_escape_string)
     {
        if($this->mq_activo)
        {
           $consulta=stripcslashes($consulta);
           // stripcslashes => Devuelve una cadena
           // con las barras invertidas eliminadas Reconoce las marcas tipo C \n, \r
           // ..., y la representación octal y hexadecimal.
        }
        $consulta=mysqli_real_escape_string($consulta);
     }
     else
     {
        if(!$this->mq_activo)
        {
          $consulta=addcslashes($consulta);
          // addslashes => Devuelve un string con barras invertidas delante de los
          // caracteres que necesitan ser escapados. Estos caracteres son la comilla simple ('), comilla doble "),
          // barra invertida (\) y NUL (el byte NULL).

        }
     }
     return $consulta;
  }
  private function verficar_consulta($consulta)
  {
    if(!$consulta)
    {
      $salida="Error al realizar la consulta <br />";
      $salida .= "Ultima Consulta ". $this->ultima_consulta;
       die($salida);

    }
  }
  public function cerrarconexion()
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
