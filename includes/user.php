<?php
require_once("database.php");

class Usuario
{
    // propiedad
    public $id;
    public $usuario;
    public $clave;
    public $nombre;
    public $apellido ;
    // esto se llama instanciar para convertir en objeto y tener una propiedad
    public static function buscar_por_id($id)
    {
      global $db;
      $matriz_usuario=self::buscar_por_sql("SELECT * FROM usuario where id={$id}");
      return (!empty($matriz_usuario)) ? array_shift($matriz_usuario):false;
    }
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
    public static function buscar_todos()
    {
        return self::buscar_por_sql("SELECT * from usuario");
    }
    public static function instanciar($registro)
    {
      $usuario=new Usuario();
      foreach ($registro as $propiedad => $valor) {
         if($usuario->propiedad_existe($propiedad))
         {
            $usuario->$propiedad=$valor;
         }
      }
      return $usuario;
    }
    public function propiedad_existe($propiedad)
    {
       $propiedades=get_object_vars($this);
       return array_key_exists($propiedad,$propiedades);
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
    public static function buscar_por_sql($sql)
    {
      global $db;
      $resultado=$db->enviarconsulta($sql);
      $matriz_usuario=array();
      while ($registro =$db->fetch_array($resultado)) {
        array_push($matriz_usuario,Usuario::instanciar($registro));
      }
      return $matriz_usuario;
    }
}

?>
