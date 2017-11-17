<?php
require_once("../../includes/initialize.php");
  if($sesion->estalogueado())
  {
     header('Location: index.php');
  }
  if(isset($_POST["submit"]))
  {
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $usuario=  Usuario::autenticar($usuario,$password);
    if($usuario)
    {
       $sesion->loguearse($usuario);
       header('Location: index.php');
    }
    else
    {
      $mensaje="Usuario / Clave no coincide";
    }
  }
?>
    <?php incluir_plantillas("header.php")?>
    		 <div id="Contenedor">
      		 <div class="Icon">
             <span class="glyphicon glyphicon-user"></span>
           </div>
           <?php
              if(isset($mensaje))
              {
                echo "<div class='alert alert-danger'>{$mensaje}</div>";
              }
           ?>
           <div class="ContentForm">
        		 	<form action="login.php" method="post" name="FormEntrar">
        		 		<div class="input-group input-group-lg">
        				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-education"></i></span>
        				  <input type="text" class="form-control" name="usuario" placeholder="Nombre usuario" id="usuario" aria-describedby="sizing-addon1" required>
        				</div>
        				<br>
        				<div class="input-group input-group-lg">
        				  <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
        				  <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1" required>
        				</div>
        				<br>
        				<button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" name="submit" type="submit">Entrar</button>
        				<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>
        		 	</form>
      		 </div>
    		 </div>
    </body>
 <!-- vinculando a libreria Jquery-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <!-- Libreria java scritp de bootstrap -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
<?php
  if($db)
  {
    $db->cerrarconexion();
  }
?>
