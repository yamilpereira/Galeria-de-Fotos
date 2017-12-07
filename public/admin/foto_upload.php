<?php require_once("../../includes/initialize.php");?>
<?php	if(!$sesion->estalogueado()){	 header('Location: login.php');	}?>
<?php
  if(isset($_POST["submit"]))
  {
    $foto=new Foto();
    $foto->titulo=$_POST["title"];
    $foto->adjuntar_foto($_FILES["file_upload"]);
    if($foto->guardar())
    {
      $mensaje="El archivo se subio";
    }
    else
    {
      $mensaje="El archivo no se subio";
      $mensaje .="<br /> ". $foto->errores;
    }
  }

?>
<?php incluir_plantillas("admin_header.php")?>
<?php incluir_plantillas("nav.php")?>
<style type="text/css">
  form {
      width: 25em;
      padding: 1em;
      border: 1px solid #ccc;
      border-radius: .5em;
      margin: 1em;
      box-shadow: .25em .25em 0 #ccc;
      }

      /* Estilo del área del input[file] */
      .drag-drop {
      height: 8em;
      width: 8em;
      background-color: #ccc;
      border-radius: 4em;
      text-align: center;
      color: white;
      position: relative;
      margin: 0 auto 1em;
      }

      .drag-drop span.desc {
      display: block;
      font-size: .7em;
      padding: 0 .5em;
      color: #000;
      }

      input[type="file"] {
          height: 10em;
          opacity: 0;
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          z-index: 3;
      }

      /* Estilo del área del input[file] con :hover */

      .drag-drop:hover, input[type="file"]:hover {
      background-color: #3276b1;
      cursor: pointer;
      }

      .drag-drop:hover span.desc {
      color: #fff;
      }

      .drag-drop:hover .pulsating {
      animation: pulse1 1s linear infinite;
      animation-direction: alternate ;
      -webkit-animation: pulse1 1s linear infinite;
      -webkit-animation-direction: alternate ;
      }

      /* Composición del icono de Upload con FontAwesome */
      .fa-stack { margin-top: .5em; }

      .fa-stack .top { color: white; }

      .fa-stack .medium {
      color: black;
      text-shadow: 0 0 .25em #666;
      }

      .fa-stack .bottom { color: rgba(225, 225, 225, .75); }

      /* Keyframing de la animación */

      @keyframes pulse1 {
      0% { color: rgba(225, 225, 225, .75); }
      50% { color: rgba(225, 225, 225, 0.25); }
      100% { color: rgba(225, 225, 225, .75); }
      }

      @-moz-keyframes pulse1 {
      0% { color: rgba(225, 225, 225, .75); }
      50% { color: rgba(225, 225, 225, 0.25); }
      100% { color: rgba(225, 225, 225, .75); }
      }

      @-webkit-keyframes pulse1 {
      0% { color: rgba(225, 225, 225, .75); }
      50% { color: rgba(225, 225, 225, 0.25); }
      100% { color: rgba(225, 225, 225, .75); }
      }

      @-ms-keyframes pulse1 {
      0% { color: rgba(225, 225, 225, .75); }
      50% { color: rgba(225, 225, 225, 0.25); }
      100% { color: rgba(225, 225, 225, .75); }
      }
      .formula
      {
        text-align: center;
      }
</style>
<br><br><br>
<div class="formula">

  <form class="" action="foto_upload.php" method="post"  enctype="multipart/form-data" style="text-align:center;margin:0 auto;">
    <?php
        if(isset($mensaje))
        {
          echo "<div class='alert alert-danger'>{$mensaje}</div>";
        }
    ?>
      <div class="form-group">
          <label for="name">Titulo</label>
          <input type="text" class="form-control" name="title" id="name"/>
          <input type="hidden" class="form-control" name="MAX_FILE_SIZE" value="1000000"/>
      </div>
      <label for="photo">Incluya una foto</label>
      <div class="drag-drop">
        <input type="file" multiple="multiple" name="file_upload"  id="photo" />
        <span class="fa-stack fa-2x">
          <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
          <i class="fa fa-circle fa-stack-1x top medium"></i>
          <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
        </span>
        <span class="desc">Pulse aquí para añadir archivos</span>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Subir</button>
      <button type="reset" name="" class="btn btn-default">Cancelar</button>
  </form>
</div>
<br>
<br><br>
<?php incluir_plantillas("footer.php")?>
