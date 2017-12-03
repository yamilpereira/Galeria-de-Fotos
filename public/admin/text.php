<?php require_once("../../includes/initialize.php");?>
<?php
	if(!$sesion->estalogueado())
	{
		 header('Location: login.php');
	}
?>
<?php incluir_plantillas("admin_header.php")?>
<?php
	/*$usuario=new Usuario();
	$usuario->usuario="ana";
	$usuario->clave="123456";
	$usuario->nombre="Ana";
	$usuario->apellido ="Pereira Mendoza";
	$usuario->crear();*/
	$usuario=Usuario::buscar_por_id("1");
	$usuario->clave="aulaformatiza";
	$usuario->guardar();
?>

<?php incluir_plantillas("footer.php")?>
