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
	$usuario->usuario="json";
	$usuario->clave="12345";
	$usuario->nombre="Yamil";
	$usuario->apellido ="Pereira Mendoza";
	$usuario->crear();*/
	//$usuario=Usuario::buscar_por_id(8);
	//$usuario->eliminar();
	//$usuario=Usuario::buscar_por_id(6);
	//$usuario->nombre="Gabi";
	//$usuario->actualizar();

?>

<?php incluir_plantillas("footer.php")?>
