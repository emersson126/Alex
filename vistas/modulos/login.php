<div id="back"></div>

<div class="login-box">
  
  <div class="login-logo">

    <img src="vistas/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="padding:30px 100px 30px 100px; background: #85241f;
    border-radius: 10px 10px 0px 0px;">

  </div>

  <div class="login-box-body">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

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
                ¿Eres nuevo(a)? presiona <a href="registrar"><strong>aqu&iacute;</strong></a> para registrarte
                </div>
            </div>
        </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>
      <div class="redes">
            <a href="https://api.whatsapp.com/send?phone=968233506&text=Gracias%20por%20cont%C3%A1ctarse."><img src="vistas/img/redes/whatsapp.png" width="40" height="40"></a>
            
             <a href="https://www.facebook.com/alex.alanyamercado"><img src="vistas/img/redes/facebook.png" width="40" height="40"></a>
       </div>

    </form>

  </div>

</div>
