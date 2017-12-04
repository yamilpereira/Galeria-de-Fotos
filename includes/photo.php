<?php
require_once("database.php");
class Foto extends Table
{
  public $id;
  public $archivo;
  public $tipo;
  public $peso;
  public $titulo;
  private $nombre_temp;
  private $fotos_dir;
  public $errores=array();
  public $errores_upload= array(
    UPLOAD_ERR_OK => 'No se ha producido ningun error' ,
    UPLOAD_ERR_INI_SIZE => 'El tamaño de archivo ha excedido el maximo indicando php.ini',
    UPLOAD_ERR_FORM_SIZE =>'El tamaño de archivo ha excedido el maximo para este formulario ',
    UPLOAD_ERR_PARTIAL=>'El archivo ha sido subido parcialmente',
    UPLOAD_ERR_NO_FILE => 'El archivo no existe',
    UPLOAD_ERR_NO_TMP_DIR=> 'El directorio temporal no existe',
    UPLOAD_ERR_CANT_WRITE=>'NO se puede escribir en el disco',
    UPLOAD_ERR_EXTENSION =>'Error de extension en php'
  );
  protected static $nombre_tabla="fotos";
  protected static $campos=array("archivo","tipo","peso","titulo");
  public function adjuntar_foto($info)
  {
    if(!$info || empty($info) || !is_array($info))
    {
        array_push($errores,"No hay ningun informacion");
        return false;

    }
    elseif ($info["error"] != 0) {
      array_push($errores,$errores_upload[$info["error"]]);
      return false;
    }
    else
    {
      $this->archivo=basename($info["name"]);
      $this->tipo=$info["type"];
      $this->peso=$info["size"];
      $this->nombre_temp=$info["tmp_name"];
      return true;
    }
  }
  public function guardar()
  {
    if(!empty($errores))
    {
      return false;
    }
    if(strlen($this->titulo)>255) {
      $this->errores[]="El titulo posee mas de 255 caracteres";
      return  false;
    }
    $nueva_ruta="/var/www/html/Php/intermedio/Semana 3/GaleriaMejorado/public/images/"."{$this->archivo}";
    if(empty($this->nombre_temp))
    {
      $this->errores="No han datos suficientes";
      return false;
    }
  //  echo $nueva_ruta;

    if(file_exists($nueva_ruta))
    {
      $this->errores="No se puede utlizar ese nombre";
      return false;
    }
    if(move_uploaded_file($this->nombre_temp,$nueva_ruta))
    {
      if($this->crear())
      {
        return true;
      }
      else {
        $this->errores="No ha podido crear el registro";
        return false;
      }
    }
    else
    {
      $this->errores="Errores de carpeta";
      return false;
    }
  }
}
?>
