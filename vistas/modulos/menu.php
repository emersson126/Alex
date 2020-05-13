<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<div class="user-panel">
		        <div class="pull-left image">
                        <?php
                            if($_SESSION["foto"] != ""){
                                echo '<img src="'.$_SESSION["foto"].'" class="img-circle">';
                            }else{
                                echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle">';
            		    }
		        ?>

		        </div>
		        <div class="pull-left info">
		          <p><?php  echo $_SESSION["nombre"]; ?></p>
		          <a><i class="fa fa-circle text-success"></i> Online</a>
		        </div>
		     </div>
                    	<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>
                    <?php if($_SESSION["perfil"] === "Administrador"){ ?>
		
			<li>

				<a href="usuarios">

					<i class="fa fa-users"></i>
					<span>Usuarios</span>

				</a>

			</li>
			<!-- Administrador -->
                    <?php } elseif($_SESSION["perfil"] === "Usuario"){ ?>
			<li>
				<a href="tests">
                                    <i class="fa fa-search"></i>
                                    <span>Test Vocacional</span><!--USUARIOS-->
				</a>
			</li>
                        <li>
                                <a href="resultados">
                                    <i class="fa fa-book"></i>
                                    <span>Resultados</span>
                                </a>
			</li>
			<li>
				<a href="perfil">
					<i class="fa fa-id-card"></i>
					<span>Editar Perfil</span>
				</a>
			</li>	
				
                <?php }  ?>
                </ul>

	 </section>

</aside>