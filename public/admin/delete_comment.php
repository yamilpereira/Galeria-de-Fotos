<?php require_once("../../includes/initialize.php");?>
<?php	if(!$sesion->estalogueado()){	 header('Location: login.php');	}?>
<?php
  $coment="";
  if(!empty($_GET["id"]))
  {
      $comentario=Comentario::buscar_por_id($_GET["id"]);
      if($comentario && $comentario->eliminar())
      {
        $coment="se elimino" ;
      }
      else
      {
        $coment="nose elimino";
      }
  }
  header("Location: list_photo.php?coment={$coment}");
?>
<?php if($db){ $db->cerrarconexion();}?>
