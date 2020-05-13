<div class="content-wrapper">

  <section class="content-header">
    
    <h1> Perfil de usuario  </h1>         
    
   
    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Perfil de usuario</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
      <form method="POST" role="form" id="formEditarPerfil" enctype="multipart/form-data">
      <div class="box-body">
        <div class="row col-xs-12">
            <input type="hidden" name="usuarioactual" value="<?php echo $_SESSION["usuario"]; ?>"/>
                    <div class="form-group col-lg-12 col-xs-12">
                        <label>Usuario</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                          <input type="text" class="form-control" name="usuarioperfil" id="usuarioperfil" readonly/>
                        </div>
              </div> 
              <div class="form-group col-lg-6 col-xs-12 ">
                        <label>Nombre</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user-circle"></i></span> 
                          <input type="text" class="form-control" name="nombreperfil" id="nombreperfil" placeholder="Ingrese su nombre" required/>
                        </div>
            </div> 
            <input type="hidden" name="claveactual" id="claveactual" value=""/>
                    <div class="form-group col-lg-6 col-xs-12 ">
                        <label>Nueva Contrase&ntilde;a</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 
                          <input type="password" class="form-control" name="claveperfil" id="claveperfil" placeholder="Ingrese su contraseña" />
                        </div>
             </div> 
             <div class="form-group col-lg-6 col-xs-12 ">
                        <label>Correo</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-send"></i></span> 
                          <input type="email" class="form-control" name="correoperfil" id="correoperfil" placeholder="Ingrese su correo" required/>
                        </div>
             </div> 
             <div class="form-group col-lg-6 col-xs-12 ">
                        <label>Celular</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-phone-square"></i></span> 
                          <input type="text" class="form-control" name="celularperfil" id="celularperfil" placeholder="Ingrese su celular" required/>
                        </div>
              </div> 
              <div class="form-group col-lg-6 col-xs-12 ">
                        <label>Instituto Educativo</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-institution"></i></span> 
                          <input type="text" class="form-control" name="institutoperfil" id="institutoperfil" placeholder="Ingrese el instituto educativo al cual pertenece" required/>
                        </div>
               </div>  
               <div class="form-group col-lg-6 col-xs-12 ">
                      <label>Fecha de Nacimiento</label>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                        <input type="date" class="form-control" name="fecnacperfil" id="fecnacperfil" required/>
                      </div>
               </div> 
               <div class="form-group col-xs-12">
                      <label>Metas</label>
                      <textarea class="form-control" name="metasperfil" id="metasperfil" required></textarea>
               </div>
               <input type="hidden" name="fotoactual" id="fotoactual" value=""/>
                <div class="form-group col-xs-12">
                    <label>Subir Foto</label>
                    <input type="file" class="form-control" name="fotoperfil" id="fotoperfil"/>
                    <p class="help-block">Peso máximo de la foto 2MB</p>
                </div>

        </div> 
      <div class="box-footer">
          
            <div class="row">

                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-md" name="btnActualizarPerfil" id="btnActualizarPerfil">
                      <i class="fa fa-save"></i> Actualizar Perfil
                  </button>
                </div>
           </div>

      </div>
          <?php

            $actualizarPerfil = new ControladorUsuarios();
            $actualizarPerfil ->ctrEditarPerfil();

          ?>
      </form>
    </div>

  </section>

</div>

