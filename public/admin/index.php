<?php require_once("../../includes/initialize.php");?>
<?php
	if(!$sesion->estalogueado())
	{
		 header('Location: login.php');
	}
?>
<?php incluir_plantillas("admin_header.php")?>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
<nav>
	<ul>
		<li><a href="logfile.php" style="color: #303030">Ver el archivo Log</a></li>
	</ul>
</nav>
<?php incluir_plantillas("footer.php")?>
