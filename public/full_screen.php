<?php
require_once("../includes/initialize.php");
?>
<?php include("layouts/header.php")?>
<?php
  if($sesion->estalogueado())
  {
    $user=Usuario::buscar_por_id($sesion->usuario_id);
  }
  if(!empty($_GET["id"]))
  {
     $foto=Foto::buscar_por_id($_GET["id"]);
     if(!$foto)
     {
       header('Location: index.php');
     }
  }
  $mensaje="";
  if(isset($_POST["submit"]))
  {
    $autor=$user->id;
    $comentario =$_POST["comentario"];
    $contenido=Comentario::crear_nuevo($foto->id,$autor,$comentario);
    if($contenido && $contenido->crear())
    {
         header("Location: full_screen.php?id=".$foto->id);
    }
    else
    {
        $mensaje="NO se ha podido crear el mensaje";
    }
  }
  else {
    $autor="";
    $comentario="";
  }
?>
<style type="text/css">
  #login { display: none; }
  .login,
  .logout {
    position: absolute;
    top: -3px;
    right: 0;

  }
  .page-header { position: relative; }
  .reviews {
    color: #555;
    font-weight: bold;
    margin: 10px auto 20px;
  }
  .notes {
    color: #999;
    font-size: 12px;
  }
  .media .media-object { max-width: 120px; }
  .media-body { position: relative; }
  .media-date {
    position: absolute;
    right: 25px;
    top: 25px;
  }
  .media-date li { padding: 0; }
  .media-date li:first-child:before { content: ''; }
  .media-date li:before {
    content: '.';
    margin-left: -2px;
    margin-right: 2px;
  }
  .media-comment { margin-bottom: 20px; }
  .media-replied { margin: 0 0 20px 50px; }
  .media-replied .media-heading { padding-left: 6px; }

  .btn-circle {
    font-weight: bold;
    font-size: 12px;
    padding: 6px 15px;
    border-radius: 20px;
  }
  .btn-circle span { padding-right: 6px; }
  .embed-responsive { margin-bottom: 20px; }
  .tab-content {
    padding: 50px 15px;
    border: 1px solid #ddd;
    border-top: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
  }
  .contenedor
  {

    padding-top: 10px;
    text-align: center;

  }
  .contenedor img
  {

    width: 829px;
  height: 385px;
  }
</style>
<div class="contenedor">
  <img class="imagen" src="images/<?php echo $foto->archivo; ?>" alt="">
</div>

<?php
	if($sesion->estalogueado())
	{
    ?>
        <div class="container">
        <form action="full_screen.php?id=<?php echo $foto->id;?>" method="post" style="width:400px; margin: 0 auto;">
            <h1>Comentario</h1>
            <div class="required-field-block">
                <input type="text" placeholder="<?php echo $user->nombre_completo(); ?>" class="form-control" disabled="">
            </div>
            <br />
            <div class="required-field-block">
                <textarea rows="3" class="form-control" name="comentario"   placeholder="Escribe un comentario"></textarea>
            </div><br />
            <input type="submit" name="submit" class="btn btn-primary" value="Enviar" />
        </form>
    </div>
<?php
	}
?>
<?php
  if(isset($mensaje) && !empty($mensaje))
  {
    echo '<script type="text/javascript">
           swal("Error al insertar"," ", "error");
          </script>';
  }
  if(isset($_GET["modal"]) && $_GET["modal"]==1)
  {
    echo '<script type="text/javascript">
           swal("Se elimino la foto"," ", "success");
          </script>';
  }
?>
<?php

$comentarios=Comentario::comentario_por_id($foto->id);

?>
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="comment-tabs">
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">
                  <?php
                  foreach ($comentarios as $value) {?>

                    <ul class="media-list">
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews">
                              <?php
                              $user=Usuario::buscar_por_id($value->autor_id);

                              echo $user->nombre;
                              ?> </h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd" style="color:black;"><?php echo $value->creado;?></li>
                              </ul>
                              <p class="media-comment" style="color:black;">
                                <?php echo $value->contenido;?>
                              </p>
                              <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 2 comments</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
	</div>
  </div>
</div>

<?php include("layouts/footer.php")?>
