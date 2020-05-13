<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="padding:30px 100px 30px 100px; background: #85241f;
    border-radius: 10px 10px 0px 0px;">

  </div>

  <div class="login-box-body">

    <form method="POST" id="formRegistrarUsuario" role="form">

              <div class="row">
                    <div class="form-group col-xs-12">
                        <label>Nombre</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 
                          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" required/>
                        </div>
                    </div> 
                    
                    <div class="form-group col-xs-12">
                        <label>Usuario</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                          <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese su usuario" required/>
                        </div>
                         
                    </div>
                    
                        <div class="form-group col-xs-12">
                            <label>Contrase&ntilde;a</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                              <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese su contraseña" required/>
                            </div>
                        </div>      
                        
                </div>

      <div class="row">
       
        <div class="col-xs-12">

          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnGuardarUsuario" id="btnGuardarUsuario" style="    border-radius: 5px;     background: #85241f;">REGISTRARME</button>
        
        </div>

      </div><br/>
      
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group" id="volver" style="text-align: center;">
                ¿Ya estas registrado? presiona <a href="login"><strong>aqu&iacute;</strong></a> para ingresar
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
