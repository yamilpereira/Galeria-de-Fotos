<?php
class Sesion
{
    public $usuario_id;
    private $logueado=false;
    function __construct()
    {
      session_start();
      $this->verficarlogueo();
    }
    public function estalogueado()
    {
      return $this->logueado;
    }
    public function loguearse($usuario)
    {
      if($usuario)
      {
        $this->usuario_id=$_SESSION["usuario_id"]=$usuario->id;
        $this->logueado=true;
      }
    }
    public function desloguearse()
    {
      unset($this->usuario_id);
      unset($_SESSION["usuario_id"]);
      $this->logueado=false;
    }
    private function verficarlogueo()
    {
      if(isset($_SESSION["usuario_id"]))
      {
        $this->usuario_id=$_SESSION["usuario_id"];
        $this->logueado=true;
      }
      else
      {
        unset($this->usuario_id);
        $this->logueado=false;
      }
    }
}
$sesion=new Sesion();

?>
