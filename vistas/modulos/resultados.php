<div class="content-wrapper">

  <section class="content-header">
    
    <h1> Resultados del Test Vocacional </h1>    
    


    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Resultados</li>
    
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <?php 
        $item = "usuario";
        $valor = $_SESSION["id"];
        
        $carreras = ControladorTests::ctrMostrarCarrerasRecomendadas($item, $valor);
        
        $aptitudes = ControladorTests::ctrMostrarAptitudesRecomendadas($item, $valor)
    ?>
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h2 class="box-title">Carreras Recomendadas</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <table id="carreras_recomendadas" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Carrera</th>
                        <th>% Porcentaje</th>
                        <th >Enlace</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $num = 1;
                        foreach ($carreras as $key => $value){
                            echo ' <tr>
                                <td>'.$num.'</td>
                                <td>'.$value["carrera"].'</td>
                                <td>'.$value["porcentaje"].' %</td>
                                <td><a href="'.$value["enlace"].'" target="_blank">Visitar Carrera</a></td></tr>';
                            $num = $num + 1;
                        }
                    ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Resultados de Aptitudes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="aptitudes_recomendadas" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Aptitudes</th>
                        <th>% Porcentaje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $num = 1;
                        foreach ($aptitudes as $key => $value){
                            echo ' <tr>
                                <td>'.$num.'</td>
                                <td>'.$value["aptitud"].'</td>
                                <td>'.$value["porcentaje"].' %</td></tr>';
                            $num = $num + 1;
                        }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

  </section>
  <!-- /.content -->
  
</div>
