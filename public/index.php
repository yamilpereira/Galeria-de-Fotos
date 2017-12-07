<?php require_once("../includes/initialize.php");?>
<?php
  $fotos=Foto::buscar_todos();
?>
<?php include("layouts/header.php")?>
<style type="text/css">
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
                          <a href="full_screen.php?id=<?php echo $foto->id; ?>" style="margin-left:-15px;margin-right:-5px;">11 Comentarios</a>
                      </div>
                    </div>
                </div>
              </div>
          </div>
      <?php } ?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Recent Comments</h3>
                <span class="label label-info">
                    78</span>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                        Google Style Login Page Design Using Bootstrap</a>
                                    <div class="mic-info">
                                        By: <a href="#">Bhaumik Patel</a> on 2 Aug 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Awesome design
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/Obgj">Admin Panel Quick Shortcuts</a>
                                    <div class="mic-info">
                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">Cool Sign Up</a>
                                    <div class="mic-info">
                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
            </div>
        </div>
    </div>
</div>

<?php include("layouts/footer.php")?>
