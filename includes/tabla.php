<?php
require_once("database.php");
class Table
{
  protected static $nombre_tabla;
  protected static $campos;
  public static function buscar_por_id($id)
  {
    global $db;
    $matriz_usuario=static::buscar_por_sql("SELECT * FROM ".static::$nombre_tabla." where id={$id}");
    return (!empty($matriz_usuario)) ? array_shift($matriz_usuario):false;
  }
  public static function buscar_todos()
  {
      return self::buscar_por_sql("SELECT * from ".static::$nombre_tabla);
  }
  public static function buscar_por_sql($sql)
  {
    global $db;
    $resultado=$db->enviarconsulta($sql);
    $matriz_usuario=array();
    while ($registro =$db->fetch_array($resultado))
    {
      array_push($matriz_usuario,static ::instanciar($registro));
    }
    return $matriz_usuario;
  }
  public static function instanciar($registro)
  {
    // get_called_class => sirve para defirnir la clase en que ambito de crea
    $nombre_clase=get_called_class();
    $objeto=new $nombre_clase;
    foreach ($registro as $propiedad => $valor) {
       if($objeto->propiedad_existe($propiedad))
       {
          $objeto->$propiedad=$valor;
       }
    }
    return $objeto;
  }
  public  function propiedad_existe($propiedad)
  {
     $propiedades=get_object_vars($this);
     return array_key_exists($propiedad,$propiedades);
  }
  public function  propiedades()
  {
    $campos_pro=array();
    foreach (static::$campos as $value) {
      $campos_pro[$value]=$this->$value;
    }
    return $campos_pro;
     //return get_object_vars($this);

  }
  public function guardar()
  {
    if(!isset($this->id))
    {
       $this->crear();
    }
    else
    {
      $this->actualizar();
    }
  }
  public function crear()
  {
      global $db;
      $propiedades=$this->propiedades();
      //unset($propiedades['id']);
      $sql="INSERT INTO ".static::$nombre_tabla."(";
      $sql .= implode(",",array_keys($propiedades));
      $sql .=") VALUES('";
      $sql .= implode("','",array_values($propiedades))."')";
      if($db->enviarconsulta($sql))
      {
        return true;
      }
      else
      {
        return false;
      }

  }
  public function actualizar()
  {
    global $db;
    $propiedades =$this->propiedades();
    $valores=array();
    foreach ($propiedades as $propiedad => $value) {
       array_push($valores,"{$propiedad}='{$value}'");
    }
    //echo "<pre>";
    //unset($valores[0]);
    //echo var_dump($valores);
    //echo "</pre>";
    $sql="UPDATE ".static::$nombre_tabla." SET ";
    $sql .= implode(",",$valores);
    $sql .=" WHERE id=".$db->preparar_consulta($this->id);
    $db->enviarconsulta($sql);
    if($db->affected_rows()==1)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  public function eliminar()
  {
      global $db;
      $sql="DELETE FROM ".static::$nombre_tabla." ";
      $sql .="WHERE id=".$db->preparar_consulta($this->id);
      $sql .=" LIMIT 1";
      $db->enviarconsulta($sql);
      if($db->affected_rows()==1)
      {
        return true;
      }
      else
      {
        return false;
      }
  }

}
?>
