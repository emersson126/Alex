  <div class="content-wrapper">

    <section class="content-header">
      
       
       <h1>   Gesti&oacute;n de Tests </h1>   
      

      <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Tests</li>
      
      </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        <?php
           $item = "usuario";
           $valor = $_SESSION["id"];
           
           $respuesta = ControladorTests::ctrVerificarPrueba($item, $valor);
           
           if(!$respuesta){
        ?>
        <div class="col-md-6">
            <div class="box box-solid">
              <div class="box-header with-border">
                  <h3 class="box-title">Progreso del tests (<span id="progreso"></span> Completado)</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">

                <div class="progress">
                  <div id="bar-progreso" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">40% Complete</span>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="box box-default box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Recordatorio</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                Recuerda que puedes completar tu test inicial solamente en 7 minutos aproximadamente.
              </div>
              <!-- /.box-body -->
            </div>
          </div>

        <div class="col-md-6">
            <div class="box box-success">
                <input type="hidden" name="guardado" id="guardado" value="" />
                <input type="hidden" name="prueba" id="prueba" value="" />
                <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION["id"]; ?>" />
                
                  <div id="smartwizard">
                      <ul style="display: none">
                        <!-- Bloque 01 -->
                        <li><a href="#pregunta1">01</a></li>
                        <li><a href="#pregunta2">02</a></li>
                        <li><a href="#pregunta3">03</a></li>
                        <li><a href="#pregunta4">04</a></li>
                        <li><a href="#pregunta5">05</a></li>
                        <li><a href="#pregunta6">06</a></li>
                        <li><a href="#pregunta7">07</a></li>
                        <li><a href="#pregunta8">08</a></li>
                        <li><a href="#pregunta9">09</a></li>
                        <li><a href="#pregunta10">10</a></li>
                        <li><a href="#pregunta11">11</a></li>
                        <li><a href="#pregunta12">12</a></li>
                        
                        <!-- Bloque 02 -->
                        <li><a href="#pregunta13">13</a></li>
                        <li><a href="#pregunta14">14</a></li>
                        <li><a href="#pregunta15">15</a></li>
                        <li><a href="#pregunta16">16</a></li>
                        <li><a href="#pregunta17">17</a></li>
                        <li><a href="#pregunta18">18</a></li>
                        <li><a href="#pregunta19">19</a></li>
                        <li><a href="#pregunta20">20</a></li>
                        <li><a href="#pregunta21">21</a></li>
                        <li><a href="#pregunta22">22</a></li>
                        <li><a href="#pregunta23">23</a></li>
                        <li><a href="#pregunta24">24</a></li>
                        
                        <!-- Bloque 03 -->
                        <li><a href="#pregunta25">25</a></li>
                        <li><a href="#pregunta26">26</a></li>
                        <li><a href="#pregunta27">27</a></li>
                        <li><a href="#pregunta28">28</a></li>
                        <li><a href="#pregunta29">29</a></li>
                        <li><a href="#pregunta30">30</a></li>
                        <li><a href="#pregunta31">31</a></li>
                        <li><a href="#pregunta32">32</a></li>
                        <li><a href="#pregunta33">33</a></li>
                        <li><a href="#pregunta34">34</a></li>
                        <li><a href="#pregunta35">35</a></li>
                        <li><a href="#pregunta36">36</a></li>
                        
                        <!-- Bloque 04 -->
                        <li><a href="#pregunta37">37</a></li>
                        <li><a href="#pregunta38">38</a></li>
                        <li><a href="#pregunta39">39</a></li>
                        <li><a href="#pregunta40">40</a></li>
                        <li><a href="#pregunta41">41</a></li>
                        <li><a href="#pregunta42">42</a></li>
                        <li><a href="#pregunta43">43</a></li>
                        <li><a href="#pregunta44">44</a></li>
                        <li><a href="#pregunta45">45</a></li>
                        <li><a href="#pregunta46">46</a></li>
                        <li><a href="#pregunta47">47</a></li>
                        <li><a href="#pregunta48">48</a></li>
                        
                        <!-- Bloque 05 -->
                        <li><a href="#pregunta49">49</a></li>
                        <li><a href="#pregunta50">50</a></li>
                        <li><a href="#pregunta51">51</a></li>
                        <li><a href="#pregunta52">52</a></li>
                        <li><a href="#pregunta53">53</a></li>
                        <li><a href="#pregunta54">54</a></li>
                        <li><a href="#pregunta55">55</a></li>
                        <li><a href="#pregunta56">56</a></li>
                        <li><a href="#pregunta57">57</a></li>
                        <li><a href="#pregunta58">58</a></li>
                        <li><a href="#pregunta59">59</a></li>
                        <li><a href="#pregunta60">60</a></li>
                        
                    </ul>
                    <div>
                        <?php
                          $preguntas = ControladorTests::ctrCargarPreguntas();
                          foreach ($preguntas as $key => $value){
                              if($value["id"] < 10){
                                  $num = "0".$value["id"];
                              }
                              else{
                                  $num = $value["id"];
                              }
                          
                        ?>
                        <div id="pregunta<?php echo $value["id"]; ?>">
                          <div class="box-header">
                              <div class="col-xs-12">
                                <div class="info-box">
                                  <span class="info-box-icon" style="background: #85241f;color: #fff;border-radius: 50%;">
                                    <?php echo $num; ?>
                                  </span>

                                  <div class="info-box-content">
                                    <span class="info-box-text">Pregunta <?php echo $num; ?></span>
                                    <span class="info-box-number"><?php echo $value["pregunta"]; ?></span>
                                  </div>
                                </div>
                              </div>
                          </div>
                          
                          <div class="box-body">
                              <div class="form-group">
                                <label>
                                  <div class="icheckbox_minimal-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="minimal" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label>
                                  <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="minimal" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label>
                                  <input type="radio" class="alternativa<?php echo $value["id"];?>" name="alternativa<?php echo $value["id"]; ?>" value="1"/>&nbsp;&nbsp;<?php echo $value["alternativa1"]; ?>
                                </label>
                              </div>

                              <div class="form-group">
                                <label class="">
                                  <div class="iradio_minimal-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="r1" class="minimal" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label>
                                  <div class="iradio_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="r1" class="minimal" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label>
                                  <input type="radio" class="alternativa<?php echo $value["id"];?>" name="alternativa<?php echo $value["id"]; ?>" value="2"/>&nbsp;&nbsp;<?php echo $value["alternativa2"]; ?>
                                </label>
                              </div>

                              <div class="form-group">
                                <label>
                                  <div class="icheckbox_minimal-red checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="minimal-red" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label>
                                  <div class="icheckbox_minimal-red" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" class="minimal-red" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label>
                                  <input type="radio" class="alternativa<?php echo $value["id"];?>" name="alternativa<?php echo $value["id"]; ?>" value="3"/>&nbsp;&nbsp;<?php echo $value["alternativa3"]; ?>
                                </label>
                              </div>

                              <div class="form-group">
                                <label>
                                  <div class="iradio_minimal-red checked" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="r2" class="minimal-red" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label class="">
                                  <div class="iradio_minimal-red" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="r2" class="minimal-red" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </label>
                                <label>
                                    <input type="radio" class="alternativa<?php echo $value["id"];?>" name="alternativa<?php echo $value["id"]; ?>" value="4"/>&nbsp;&nbsp;<?php echo $value["alternativa4"]; ?>
                                </label>
                              </div>
                          </div>
                        </div>
                        <?php } ?>
                    </div>
            </div>
            </div>
            <!-- /.box -->
          </div>
           <?php }else{ 
               $fecha = explode("-", $respuesta["fecha"]);
               $fechaNueva = $fecha[2]."/".$fecha[1]."/".$fecha[0];
               ?>
        <div class="">
          <div class="col-md-6">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Recuerda:</h4>
            Usted realiz&oacute; su test vocacional el <?php echo $fechaNueva; ?>, si quiere ver los resultados presione <a href="resultados">aqu&iacute;</a> para visualizarlos.
          </div>
        </div>
        <div class="col-xs-6">
          <button href="resultados" type="button" class="btn btn-block btn-success btn-lg pull-right"><i class="fa fa-credit-card"></i> <a href="resultados" style="color: #fff;">Ver Resultados</a>
          </button>
          <button type="button" class=" pull-right btn btn-block btn-primary btn-lg">
            <i class="fa fa-user"></i> <a href="perfil" style="color: #fff;">Actualizar Perfil</a>
          </button>
            
          
        </div>
        </div>
        
           <?php } ?>
    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->