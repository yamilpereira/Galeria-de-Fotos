<?php require_once("../../includes/initialize.php");?>
<?php	if(!$sesion->estalogueado()){	 header('Location: login.php');	}?>
<?php incluir_plantillas("admin_header.php")?>
<?php
if(!empty($_GET["id"]))
{
    $comentarios=Comentario::comentario_por_id($_GET["id"]);
}
if(!empty($_GET["mensaje"]))
{
  echo '<script type="text/javascript">
         swal("Se elimino el comentario"," ", "success");
        </script>';
}
?>
<?php incluir_plantillas("nav.php")?>
<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">

                <h3 class="panel-title">
                  Galeria de fotos
                  <span class="label label-info">
                      78</span>
                </h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                  <?php
                  foreach ($comentarios as $value) {?>
                    <?php $user=Usuario::buscar_por_id($value->autor_id);?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <p style="color: black;"><strong>
                                      <?php
                                      echo $user->nombre;
                                      ?></strong></p>
                                    <div class="mic-info" style="color:black;">
                                        Publicado :   <?php echo $value->creado; ?>
                                    </div>
                                </div>
                                <div class="comment-text" style="color:black;">
                                    <?php echo $value->contenido; ?>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <a href="delete_comment.php?id=<?php echo $value->id;?>"><button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
            </div>
        </div>
    </div>
</div>
<?php
  incluir_plantillas("footer.php");
?>
