<?php
require_once("database.php");
class Comentario extends Table
{
  public $id;
  public $foto_id;
  public $creado;
  public $autor_id;
  public $contenido;
  protected static $nombre_tabla="comentarios";
  protected static $campos=array("foto_id","creado","autor_id","contenido");
  public static function crear_nuevo($foto_id,$autor,$contenido)
  {
     if(!empty($foto_id) && !empty($autor) && !empty($contenido))
     {
      $comentario=new Comentario();
      $comentario->foto_id=(int)$foto_id;
      $comentario->creado=date("Y-m-d H:i:s");
      $comentario->autor_id=(int)$autor;
      $comentario->contenido=$contenido;
      return $comentario;
     }
     else
     {
       return false;
     }
  }
  public static function comentario_por_id($foto_id)
  {
    global $db;
    $sql ="SELECT * FROM ".self::$nombre_tabla;
    $sql .=" WHERE foto_id=".$db->preparar_consulta($foto_id);
    $sql .=" ORDER BY creado ASC";
    return self::buscar_por_sql($sql);
  }
  public static function comentario_multiples($foto_id)
  {
    global $db;

    $sql="select * from usuario as u,comentarios as c where c.foto_id=104";
    //$sql ="SELECT * FROM ".self::$nombre_tabla.", usuario ";
    //$sql .=" WHERE ".self::$nombre_tabla.".foto_id=".$db->preparar_consulta($foto_id);
    //$sql .= " AND ".self::$nombre_tabla.".autor_id=usuario.id";
    echo $sql;
    return $db->enviarconsulta($sql);
  }
}
?>
