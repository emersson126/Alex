<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="padding:30px 100px 30px 100px; background: #85241f;
    border-radius: 10px 10px 0px 0px;">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="POST" id="formRegistrarUsuario" role="form">

              <div class="row">
                    <div class="form-group col-xs-12">
                        <label>Nombre</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 
                          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required/>
                        </div>
                    </div> 
                    <div class="row">
                    <div class="form-group col-xs-12">
                        <label>Usuario</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-send"></i></span> 
                          <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su usuario" required/>
                        </div>
                    </div>      
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label>Contrase&ntilde;a</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-send"></i></span> 
                              <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su contraseña" required/>
                            </div>
                        </div>      
                    </div>     
                </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      
      </div>

      <div class="row">
       
        <div class="col-xs-12">

          <button type="submit" class="btn btn-primary btn-block btn-flat" style="    border-radius: 5px;     background: #85241f;">Ingresar</button>
        
        </div>

      </div><br/>
      
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group" style="text-align: center;">
                ¿Eres nuevo(a)? presiona <a href="registrar">aqu&iacute;</a> para registrarte
                </div>
            </div>
        </div>

      <?php

        $nuevoUsuario = new ControladorUsuarios();
        $nuevoUsuario->ctrCrearUsuario2();
        
      ?>

    </form>

  </div>

</div>
