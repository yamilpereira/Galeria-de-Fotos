<?php require_once("../../includes/initialize.php");?>
<?php	if(!$sesion->estalogueado()){	 header('Location: login.php');	}?>
<?php
  $fotos=Foto::buscar_todos();
?>
<?php incluir_plantillas("admin_header.php")?>
<style type="text/css">
    @import url("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
    .panel-image {
    position: relative;
    }
    .panel-image img.panel-image-preview {
    width: 100%;
    border-radius: 4px 4px 0px 0px;
    }

    .panel-image label {
    display: block;
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    }

    .panel-heading ~ .panel-image img.panel-image-preview {
    border-radius: 0px;
    }

    .panel-body {
    overflow: hidden;
    }

    .panel-image ~ input[type=checkbox] {
    position:absolute;
    top:- 30px;
    z-index: -1;
    }

    .panel-image ~ input[type=checkbox] ~ .panel-body {
    height: 0px;
    padding: 0px;
    }

    .panel-image ~ input[type=checkbox]:checked ~ .panel-body {
    height: auto;
    padding: 15px;
    }

    .panel-image ~ .panel-footer a {
    padding: 0px 10px;
    font-size: 1.3em;
    color: rgb(100, 100, 100);
    }
</style>
<?php incluir_plantillas("nav.php")?>
<div class="container" style="margin-top:10px;">
  <div class="row form-group">
      <?php foreach ($fotos as $foto) {  ?>
          <div class="col-xs-12 col-md-4">
              <div class="panel panel-default">
                  <div class="panel-heading" >
                      <h3 class="panel-title"><?php echo $foto->titulo; ?></h3>
                  </div>
                  <div class="panel-image hide-panel-body" style="height:270px;">

                        <img src="../images/<?php echo $foto->archivo; ?>" class="panel-image-preview" style="height:100%;" />

                      <label for="toggle-3"></label>
                  </div>
                  <div class="panel-footer text-center">
                      <p style="float:left;"><?php echo $foto->peso ." Kybtes";?></p>
                      <div class="" style="text-align:right;">
                        <?php
                        if(!empty($_GET["mensaje"]))
                        {
                          echo '<script type="text/javascript">
                                 swal("Se elimino la foto"," ", "success");
                                </script>';
                        }
                        if(!empty($_GET["coment"]))
                        {
                          echo '<script type="text/javascript">
                                 swal("Se elimino el comentario"," ", "success");
                                </script>';
                        }
                        ?>
                        <a href="list_coment.php?id=<?php echo $foto->id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a href="delete_photo.php?id=<?php echo $foto->id;  ?>"><span class="glyphicon glyphicon-remove"></span></a>
                      </div>
                  </div>
              </div>
          </div>
      <?php } ?>
    </div>
</div>
<?php
  incluir_plantillas("footer.php");
?>
