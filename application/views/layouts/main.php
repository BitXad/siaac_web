<!DOCTYPE html>
<html>
    <head>
        <?php
            $session_data = $this->session->userdata('logged_in');
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIAAC<?php if(isset($page_title)){ echo $page_title; }?> </title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">SIAAC</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">SIAAC</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $session_data['usuario_nombre']?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $session_data['usuario_nombre']?> - <?php echo $session_data['rol']?>
                                        <small><?php echo $session_data['usuario_email']?></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo site_url() ?>admin/dashb/cuenta" class="btn btn-default btn-flat">Mi Cuenta</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo site_url() ?>admin/dashb/logout" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $session_data['usuario_nombre']?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $session_data['rol']?></a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Navegacion</li>
                        <li>
                            <a href="<?php echo site_url();?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Administrativo</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('administrativo/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('administrativo/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-university"></i> <span>Area Carrera</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('area_carrera/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('area_carrera/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-book"></i> <span>Area Materium</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('area_materium/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('area_materium/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-font"></i> <span>Aula</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('aula/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('aula/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-file-code-o"></i> <span>Carrera</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('carrera/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('carrera/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-file-text-o"></i> <span>Detalle Factura</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('detalle_factura/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('detalle_factura/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Docente</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('docente/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('docente/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-etsy"></i> <span>Estado</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('estado/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('estado/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-odnoklassniki"></i> <span>Estado Civil</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('estado_civil/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('estado_civil/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Estudiante</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('estudiante/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('estudiante/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-align-left"></i> <span>Factura</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('factura/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('factura/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-venus-mars"></i> <span>Genero</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('genero/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('genero/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-calendar"></i> <span>Gestion</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('gestion/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('gestion/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Grupo</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('grupo/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('grupo/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-calendar-check-o"></i> <span>Horario</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('horario/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('horario/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-check-square-o"></i> <span>Inscripcion</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('inscripcion/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('inscripcion/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-university"></i> <span>Institucion</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('institucion/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('institucion/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-address-book-o"></i> <span>Kardex Academico</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('kardex_academico/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('kardex_academico/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-address-book"></i> <span>Kardex Economico</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('kardex_economico/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('kardex_economico/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-maxcdn"></i> <span>Materia</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('materia/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('materia/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-navicon"></i> <span>Materia Asignada</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('materia_asignada/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('materia_asignada/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-money"></i> <span>Matricula</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('matricula/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('matricula/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-usd"></i> <span>Mensualidad</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('mensualidad/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('mensualidad/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-sort"></i> <span>Nivel</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('nivel/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('nivel/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-list-alt"></i> <span>Notum</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('notum/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('notum/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-server"></i> <span>Paralelo</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('paralelo/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('paralelo/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-clock-o"></i> <span>Periodo</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('periodo/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('periodo/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-buysellads"></i> <span>Plan Academico</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('plan_academico/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('plan_academico/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-retweet"></i> <span>Rol</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('rol/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('rol/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
                            <li>
                            <a href="#">
                                <i class="fa fa-home"></i> <span>Tipo Aula</span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="active">
                                    <a href="<?php echo site_url('tipo_aula/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('tipo_aula/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
                            </ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-adjust"></i> <span>Turno</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('turno/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('turno/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
						<li>
                            <a href="#">
                                <i class="fa fa-user"></i> <span>Usuario</span>
                            </a>
                            <ul class="treeview-menu">
								<li class="active">
                                    <a href="<?php echo site_url('usuario/add');?>"><i class="fa fa-plus"></i> Add</a>
                                </li>
								<li>
                                    <a href="<?php echo site_url('usuario/index');?>"><i class="fa fa-list-ul"></i> Listing</a>
                                </li>
							</ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Generated By <a href="http://www.crudigniter.com/">CRUDigniter</a> 3.2</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->


        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>
    </body>
</html>
