<!DOCTYPE html>
<html>
    <head>
        <?php
            $session_data = $this->session->userdata('logged_in');

            $institucion = $this->db->query("SELECT  *  FROM `institucion` WHERE `institucion_id` = 1")->row_array();
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
        <script type="text/javascript"> 
        function mueveReloj(){
            momentoActual = new Date();
            var today = moment(momentoActual).format('DD/MM/YYYY HH:mm:ss');
            $("#reloj").html(today);
            
        } 
        setInterval("mueveReloj()",1000);
        </script>
    </head>
    
    <body class="hold-transition skin-blue sidebar-mini"  onload="mueveReloj()">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><font size="1">SIAAC</font></span>
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
                                    <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['usuario_imagen']);?>" class="user-image" alt="Imagen de usuario">
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
                    <div style="float: none; width: 90%" face="Arial" class="text-center" >
    <span class="text-bold" style="display: block; padding-top: 0px;padding-bottom: -8px; color: #FFF; font-size: 22px;"><?php echo $institucion['institucion_nombre'] ?></span>
    <span name="reloj" id="reloj" style="color: #FFF; font-size: 12px;"></span> 
    
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
                            <img src="<?php echo site_url('resources/images/usuarios/'.$session_data['thumb']);?>" class="img-circle" alt="Imagen de usuario">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $session_data['usuario_nombre']?></p>
                            <a href="<?php echo site_url();?>admin/dashb"><i class="fa fa-circle text-success"></i> <?php echo $session_data['rol']?></a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Navegacion</li>
                        <?php if($session_data['tipousuario_id'] == 1){ ?>
                        <li>
                            <a href="<?php echo site_url();?>admin/dashb">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-address-book-o"></i> <span>Registros</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('administrativo');?>"><i class="fa fa-user-circle-o"></i>Administrativos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('docente');?>"><i class="fa fa-user-circle"></i> Docentes</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('estudiante');?>"><i class="fa fa-user"></i> Estudiantes</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-list-ol"></i> <span>Parametros</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('area_carrera');?>"><i class="fa fa-university"></i>Area Carrera</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('area_materium');?>"><i class="fa fa-book"></i> Area Materia</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('categoria_egreso');?>"><i class="fa fa-list"></i>Categoria Egreso</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('categoria_ingreso');?>"><i class="fa fa-list-alt"></i>Categoria Ingreso</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('estado');?>"><i class="fa fa-etsy"></i>Estado</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('estado_civil');?>"><i class="fa fa-odnoklassniki"></i>Estado Civil</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('genero');?>"><i class="fa fa-venus-mars"></i>Genero</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('gestion');?>"><i class="fa fa-calendar"></i>Gestion</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('parametro');?>"><i class="fa fa-server"></i>Parametro</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('periodo');?>"><i class="fa fa-clock-o"></i>Periodo</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('tipo_aula');?>"><i class="fa fa-home"></i>Tipo Aula</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('turno');?>"><i class="fa fa-adjust"></i>Turno</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-industry"></i> <span>Operaciones</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('carrera');?>"><i class="fa fa-file-code-o"></i>Carrera</a>
                                </li>
                                <!--<li>
                                    <a href="<?php echo site_url('detalle_factura');?>"><i class="fa fa-file-text-o"></i>Detalle Factura</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('factura');?>"><i class="fa fa-align-left"></i>Factura</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('horario');?>"><i class="fa fa-calendar-check-o"></i>Horarios</a>
                                </li>-->
                                <li>
                                    <a href="<?php echo site_url('egreso');?>"><i class="fa fa-arrow-left"></i>Egresos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('ingreso');?>"><i class="fa fa-arrow-right"></i>Ingresos</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('inscripcion/inscribir/0');?>"><i class="fa fa-check-square-o"></i>Inscripción</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('kardex_academico');?>"><i class="fa fa-address-book-o"></i> Kardex Academico</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('kardex_economico/busqueda');?>"><i class="fa fa-address-book"></i>Kardex Economico</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('materia');?>"><i class="fa fa-maxcdn"></i>Materias</a>
                                </li>
                                <!--<li>
                                    <a href="<?php echo site_url('materia_asignada');?>"><i class="fa fa-navicon"></i>Materias Asignadas</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('matricula');?>"><i class="fa fa-money"></i>Matricula</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('mensualidad');?>"><i class="fa fa-usd"></i>Mensualidad</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('nivel');?>"><i class="fa fa-sort"></i>Nivel</a>
                                </li>-->
                                <li>
                                    <a href="<?php echo site_url('notum');?>"><i class="fa fa-list-alt"></i>Notas</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('plan_academico/planacad');?>"><i class="fa fa-buysellads"></i>Plan Académico</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo site_url('institucion');?>"><i class="fa fa-university"></i> <span>Institución</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('aula');?>"><i class="fa fa-font"></i> <span>Aula</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('grupo');?>"><i class="fa fa-users"></i> <span>Grupo</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('paralelo');?>"><i class="fa fa-server"></i> <span>Paralelo</span></a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-lock"></i> <span>Seguridad</span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo site_url('rol');?>"><i class="fa fa-retweet"></i>Roles</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('tipo_usuario');?>"><i class="fa fa-list-ul"></i>Tipo Usuario</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('usuario');?>"><i class="fa fa-users"></i>Usuarios</a>
                                </li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if($session_data['tipousuario_id'] == 2 || $session_data['tipousuario_id'] == 7){ ?>
                        <li>
                            <a href="<?php echo site_url('docente/grupos');?>"><i class="fa fa-users"></i> <span>Grupos</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/materias');?>"><i class="fa fa-database"></i> <span>Materias</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/notas');?>"><i class="fa fa-list-alt"></i>Notas</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/horarios');?>"><i class="fa fa-calendar-check-o"></i>Horarios</a>
                        </li>
                        <?php } ?>
                        <?php if($session_data['tipousuario_id'] == 3){ ?>
                        <li>
                            <a href="<?php echo site_url('plan_academico');?>"><i class="fa fa-buysellads"></i>Plan Académico</a>
                        </li>
                                                        <li>
                            <a href="<?php echo site_url('docente');?>"><i class="fa fa-user-circle"></i>Docentes</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('estudiante');?>"><i class="fa fa-user"></i>Estudiantes</a>
                        </li>
                                                        <li>
                            <a href="<?php echo site_url('materia');?>"><i class="fa fa-maxcdn"></i>Materias</a>
                        </li>
                                                        <li>
                            <a href="<?php echo site_url('horario');?>"><i class="fa fa-calendar-check-o"></i>Horarios</a>
                        </li>
                        <?php } ?>
                        <?php if($session_data['tipousuario_id'] == 4){ ?>
                        <li>
                            <a href="#"><i class="fa fa-money"></i>Cobranza en construcción</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('inscripcion');?>"><i class="fa fa-check-square-o"></i>Inscripción</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-building"></i>Reportes Economicos en construcción</a>
                        </li>
                        <?php } ?>
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
            <footer class="main-footer no-print">
                <strong>Desarrollado por <a href="http://www.passwordbolivia.com/">PASSWORD SRL</a>| Ingenieria en Hardware & Software</strong>
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
