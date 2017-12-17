<?php require_once("../includes/initialize.php");?>
<?php
  $pagina = (!empty($_GET["pagina"])) ? (int)$_GET["pagina"] : 1;
  $foto_por_grupo=6;
  $total_fotos=Foto::cantidad_total();
  //$fotos=Foto::buscar_todos();
  $paginacion=new Paginacion($pagina,$foto_por_grupo,$total_fotos);
  $sql = "select * from fotos ";
  $sql .= "limit {$foto_por_grupo} ";
  $sql .= "offset ".$paginacion->offset();
  $fotos=Foto::buscar_por_sql($sql);
?>
<?php include("layouts/header.php"); ?>
<style type="text/css">
    .pagination-wrap{
    margin:auto;
    text-align:center;
    }
    .pagination-v1 > li > a,
    .pagination-v1 > li > span {
    background-color: #ea5745;
    border: 1px solid #ea5745;
    border-radius: 4px;
    color: #fff;
    float: left;
    font-size: 14px;
    line-height: 1.42857;
    margin-right: 5px;
    padding: 8px 15px;
    position: relative;
    text-decoration: none;
    }
    .pagination-v1 > li > a.active,
    .pagination-v1 > li > a:hover,
    .pagination-v1 > li > span:hover,
    .pagination-v1 > li > a:focus,
    .pagination-v1 > li > span:focus {
    background-color: #ee8477 !important;
    border-color: #ea5745;
    color: #fff;
    }


  .cometario,a
    {
       font-size: 8px;
       margin-right: 0px;
       float: right;
       padding-left: 0px;

    }
    .titulo, a, strong
    {
      border: 2px red;
      margin-left: 5px;
      float:left;
    }
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
<div class="container" style="margin-top:10px;">
  <div class="row form-group">
      <?php foreach ($fotos as $foto) {  ?>
          <div class="col-xs-12 col-md-4">
              <div class="panel panel-default">
                  <div class="panel-image hide-panel-body" style="height:270px;">
                      <img src="images/<?php echo $foto->archivo; ?>" class="panel-image-preview" style="height:100%;" />
                      <label for="toggle-3"></label>
                  </div>
                  <div class="panel-footer text-center">
                    <div class="row">
                      <div class="titulo">
                          <p><strong><?php echo $foto->titulo;?></strong></p>
                      </div>
                      <div class="cometario">
                          <a>11 Me gusta</a>
                          <a href="full_screen.php?id=<?php echo $foto->id; ?>" style="margin-left:-15px;margin-right:-5px;">
                          11 Comentarios
                          </a>
                      </div>
                    </div>
                </div>
              </div>
          </div>
      <?php } ?>
    </div>
</div>
<div class="pagination-wrap">
       <ul class="pagination pagination-v1">
        <?php
        if($paginacion->existe_anterior()){
          echo "<li><a href=\"index.php?pagina=";
          echo $paginacion->pagina_anterior();
          echo "\">Anterior</a></li>";
        }
        for ($i=1; $i <= $paginacion->total_paginas() ; $i++) {
          if($paginacion->pagina_actual==$i)
          {
            echo "<li><a href='#' class='active'>{$i}</a></li>";
          }
          else
          {
            echo "<li><a href=\"index.php?pagina=";
            echo $i;
            echo "\">{$i}</a></li>";
          }
        }
        if($paginacion->existe_siguiente()) {
          echo "<li><a href=\"index.php?pagina=";
          echo $paginacion->pagina_siguiente();
          echo "\">Siguiente</a></li>";
        }
        ?>
       </ul>
</div>

<?php include("layouts/footer.php")?>
