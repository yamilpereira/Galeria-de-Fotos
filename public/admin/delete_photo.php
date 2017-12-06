<?php require_once("../../includes/initialize.php");?>
<?php	if(!$sesion->estalogueado()){	 header('Location: login.php');	}?>
<?php
  $mensaje="";
  if(!empty($_GET["id"]))
  {
    $foto=Foto::buscar_por_id($_GET["id"]);
    if($foto->suprimir())
    {
      $mensaje="Se elimino correctamente la foto";
    }
    else
    {
      $mensaje="No se elimino la foto";
    }

  }
  header("Location: list_photo.php?mensaje={$mensaje}");
?>
<?php if($db){ $db->cerrarconexion();}?>
