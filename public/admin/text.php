<?php require_once("../../includes/initialize.php");?>
<?php
	if(!$sesion->estalogueado())
	{
		 header('Location: login.php');
	}
?>
<?php incluir_plantillas("admin_header.php")?>
<?php
	$usuario=new Usuario();
	$usuario->usuario="ana";
	$usuario->clave="123456";
	$usuario->nombre="Ana";
	$usuario->apellido ="Pereira Mendoza";
	$usuario->crear();
?>

<?php incluir_plantillas("footer.php")?>
