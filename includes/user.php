<?php
require_once("database.php");
require_once("tabla.php");
class Usuario extends Table
{
    // propiedad
    public $id;
    public $usuario;
    public $clave;
    public $nombre;
    public $apellido ;
    protected static $nombre_tabla="usuario";
    // esto se llama instanciar para convertir en objeto y tener una propiedad

    public function autenticar($username="",$password="")
    {

      global $db;
      $usuario=$db->preparar_consulta($username);
      $pass=$db->preparar_consulta($password);
      $sql="SELECT * FROM usuario ";
      $sql .="WHERE usuario='{$usuario}' ";
      $sql .="AND clave='{$pass}' ";
      $sql .="LIMIT 1";
      $matriz_usuario=self::buscar_por_sql($sql);
      return (!empty($matriz_usuario)) ? array_shift($matriz_usuario) : false;
    }
    public function nombre_completo()
    {
       if(isset($this->nombre) && isset($this->apellido))
       {
           return $this->nombre ." ".$this->apellido;
       }
       else {
         return " ";
       }
    }


 }

?>
