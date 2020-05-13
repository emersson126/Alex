<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <?php if(isset($_SESSION["perfil"]) && ($_SESSION["perfil"] == "Usuario")){ ?>
      <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background: #85241f;color: #fff;">
              <h3 class="widget-user-username"><?php  echo $_SESSION["nombre"]; ?></h3>
              <h5 class="widget-user-desc">Bienvenid@</h5>
            </div>
            <div class="widget-user-image">
                <?php
                    if($_SESSION["foto"] != ""){
                        echo '<img src="'.$_SESSION["foto"].'" class="img-circle">';
                    }else{
                        echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle">';
                    }
                ?>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Descubre tu profesión e impacta al mundo</h5>
                    <span class="description-text">Conectamos tu futuro</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
      </div>
      <div class="box-header with-border">

          <h3>MI ORIENTACION</h3>
      </div>
      <div class="box-body">
          <div class="row">
            <?php
                    include "reportes/reportes-generales.php"
            ?>
          </div>
          
      </div>
      <?php }elseif(isset ($_SESSION["perfil"]) && $_SESSION["perfil"] == "Administrador"){ ?>
       <div class="box-header with-border">
          <h2>Bienvenid@ al Sistema</h2>
      </div>
      <div class="box-body">
          <div class="row">
              <div class="col-md-12">
                <h3>Bienvenid@ <?php echo $_SESSION["nombre"]; ?> esperamos que disfrutes de usar el sistema.</h3>
              </div>
          </div>
      </div>
      <?php } ?>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->