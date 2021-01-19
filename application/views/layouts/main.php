<!DOCTYPE html>
<html>
    <head>
        <?php
            $session_data = $this->session->userdata('logged_in');
            $rolusuario = $session_data['rol'];
            $institucion = $this->db->query("SELECT  *  FROM `institucion` WHERE `institucion_id` = 1")->row_array();
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIAAC <?php if(isset($page_title)){ echo " - ".$page_title; }?> </title>

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
                    <span class="logo-mini"><font size="1">ESENCIAL</font></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">ESENCIAL</span>
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
                                <?php if ($session_data['tipousuario_id']==1) {
                                    $carpeta = 'usuarios';
                                } elseif ($session_data['tipousuario_id']==2) {
                                    $carpeta = 'docentes';
                                } elseif ($session_data['tipousuario_id']==3) {
                                    $carpeta = 'estudiantes';
                                } ?>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/images/'.$carpeta.'/'.$session_data['usuario_imagen']);?>" class="user-image">
                                    <span class="hidden-xs"><?php echo $session_data['usuario_nombre']?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/images/'.$carpeta.'/'.$session_data['usuario_imagen']);?>">
                                    <p>
                                        <?php echo $session_data['usuario_nombre']?> - <?php echo $session_data['tipousuario_descripcion']?>
                                        <small><?php echo $session_data['usuario_email']?></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <?php if ($session_data['tipousuario_id']==1) { ?>
                                            <a href="<?php echo site_url() ?>admin/dashb/cuenta" class="btn btn-default btn-flat">Mi Cuenta</a>
                                        <?php } ?>
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
                            <img src="<?php echo site_url('resources/images/'.$carpeta.'/'.$session_data['usuario_imagen']);?>" class="img-circle" alt="Imagen de usuario">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $session_data['usuario_nombre']?></p>
                            <a href="<?php echo site_url();?>admin/dashb"><i class="fa fa-circle text-success"></i> <?php echo $session_data['tipousuario_descripcion']?></a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Men&uacute;</li>
                        <?php if($session_data['tipousuario_id'] == 1){ ?>
                        <li>
                            <a href="<?php echo site_url();?>admin/dashb">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-industry"></i> <span>Operaciones</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php 
                                if($rolusuario[1-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('inscripcion');?>"><i class="fa fa-mortar-board"></i>Inscripción</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[8-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('venta/ventas');?>"><i class="fa fa-cart-plus"></i>Ventas</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[14-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('compra');?>"><i class="fa fa-shopping-basket"></i>Compras</a>
                                </li>                                
                                <?php } ?>
                                <?php
                                if($rolusuario[19-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('egreso');?>"><i class="fa fa-arrow-left"></i>Egresos</a>
                                </li>
                                <?php
                                } ?>
                                <?php
                                if($rolusuario[25-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('ingreso');?>"><i class="fa fa-arrow-right"></i>Ingresos</a>
                                </li>
                                <?php
                                } ?>                                                                
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-gears"></i> <span>Administración</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[31-1]['rolusuario_asignado'] == 1){?>
                                <li>
                                    <a href="<?php echo site_url('kardex_academico/busqueda');?>"><i class="fa fa-address-book-o"></i> Kardex Academico</a>
                                </li>
                                <?php }?>
                                
                                <?php
                                if($rolusuario[34-1]['rolusuario_asignado'] == 1){?>
                                <li>
                                    <a href="<?php echo site_url('kardex_economico/busqueda');?>"><i class="fa fa-address-book"></i>Kardex Economico</a>
                                </li>                                
                                <?php } ?>
                                
                                <?php
                                if($rolusuario[41-1]['rolusuario_asignado'] == 1){?>
                                <li>
                                    <a href="<?php echo site_url('grupo');?>"><i class="fa fa-clock-o"></i> Grupos & Horarios</a>
                                </li>
                                <?php } ?>                                
                                
                                <?php
                                if($rolusuario[44-1]['rolusuario_asignado'] == 1){?>
                                <li>
                                    <a href="<?php echo site_url('plan_academico/planacad');?>"><i class="fa fa-sitemap"></i>Planes Académicos</a>
                                </li>
                                <?php } ?>
                                
                                <?php
                                if($rolusuario[45-1]['rolusuario_asignado'] == 1){?>
                                <li>
                                    <a href="<?php echo site_url('gestion');?>"><i class="fa fa-calendar"></i>Gestiones</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i> <span>Registro</span>
                            </a>
                            <ul class="treeview-menu">
                                
                                
                                <?php
                                if($rolusuario[48-1]['rolusuario_asignado'] == 1){ ?>
                                <li>
                                    <a href="<?php echo site_url('estudiante');?>"><i class="fa fa-user"></i> Estudiantes</a>
                                </li>
                                <?php } ?>
                                <?php
                                if($rolusuario[54-1]['rolusuario_asignado'] == 1){?>
                                <li>
                                    <a href="<?php echo site_url('docente');?>"><i class="fa fa-user-circle"></i> Docentes</a>
                                </li>
                                <?php } ?>
                                
                                <?php
                                if($rolusuario[58-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('administrativo');?>"><i class="fa fa-user-circle-o"></i> Administrativos</a>
                                </li>
                                <?php } ?>
                                <?php
                                if($rolusuario[61-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('carrera');?>"><i class="fa fa-file-code-o"></i>Carreras</a>
                                </li>
                                <?php
                                } ?>
                                
                                <?php
                                if($rolusuario[65-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('materia');?>"><i class="fa fa-maxcdn"></i>Materias</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[68-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('notum');?>"><i class="fa fa-list-alt"></i>Notas</a>
                                </li>
                                <?php } ?>
                                <?php 
                                if($rolusuario[71-1]['rolusuario_asignado'] == 1){?>
                                <li>
                                    <a href="<?php echo site_url('aula');?>"><i class="fa fa-font"></i> Aulas</a>
                                </li>
                                <?php }
                                if($rolusuario[74-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('producto');?>"><i class="fa fa-cubes"></i>Productos</a>
                                </li>
                                <?php }
                                if($rolusuario[81-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('categoria_producto');?>"><i class="fa fa-list"></i>Categorias</a>
                                </li>
                                <?php }
                                if($rolusuario[82-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('inventario');?>"><i class="fa fa-list-ol"></i>Inventario</a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>

                        
                        <?php
                        if($rolusuario[86-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('institucion');?>"><i class="fa fa-university"></i> <span>Institución</span></a>
                        </li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-list-ol"></i> <span>Parámetros</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[61-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('area_carrera');?>"><i class="fa fa-university"></i>Carrera: Areas</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[65-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('area_materium');?>"><i class="fa fa-book"></i> Area Materia</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[88-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('categoria_egreso');?>"><i class="fa fa-list"></i>Categoria Egreso</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[91-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('categoria_ingreso');?>"><i class="fa fa-list-alt"></i>Categoria Ingreso</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[94-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('parametro');?>"><i class="fa fa-server"></i>Configuración</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[96-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('estado');?>"><i class="fa fa-etsy"></i>Estado</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[97-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('estado_civil');?>"><i class="fa fa-odnoklassniki"></i>Estado Civil</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[100-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('genero');?>"><i class="fa fa-venus-mars"></i>Genero</a>
                                </li>
                                <?php
                                } ?>

                                <?php
                                if($rolusuario[103-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('nivel');?>"><i class="fa fa-calendar"></i>Nivel</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[106-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('paralelo');?>"><i class="fa fa-server"></i> Paralelo</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[109-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('periodo');?>"><i class="fa fa-clock-o"></i>Periodo</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[112-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_aula');?>"><i class="fa fa-home"></i>Tipo Aula</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[115-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('turno');?>"><i class="fa fa-adjust"></i>Turno</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        
                <li>
                    <a href="#"><i class="fa fa-clipboard"></i> <span>Reportes</span></a>
                    <ul class="treeview-menu">
                        <?php
                        if($rolusuario[119-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('reportes/rinscripcion');?>"><i class="fa fa-check-square-o"></i> <span>Inscripciones</span></a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if($rolusuario[120-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('reportes');?>"><i class="fa fa-exchange"></i> <span>Movimiento Diario</span></a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-calculator"></i> <span>Contabilidad</span></a>
                    <ul class="treeview-menu">
                        <?php
                        if($rolusuario[121-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('dosificacion');?>"><i class="fa fa-list-alt"></i>Dosificación</a>
                        </li>
                        <?php
                        }
                        if($rolusuario[124-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('factura');?>"><i class="fa fa-shopping-cart"></i> <span>Libro de Ventas</span></a>
                        </li>
                        <?php
                        }
                        if($rolusuario[125-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('factura/factura_compra');?>"><i class="fa fa-shopping-basket"></i> <span>Libro de Compras</span></a>
                        </li>
                        <?php
                        }
                        if($rolusuario[126-1]['rolusuario_asignado'] == 1){
                        ?>
                        <li>
                            <a href="<?php echo site_url('factura/verificador');?>"><i class="fa fa-paperclip"></i>Verificador de facturas</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li>
                            <a href="#">
                                <i class="fa fa-lock"></i> <span>Seguridad</span>
                            </a>
                            <ul class="treeview-menu">
                                <?php
                                if($rolusuario[127-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('rol');?>"><i class="fa fa-retweet"></i>Roles</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[129-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('tipo_usuario');?>"><i class="fa fa-list-ul"></i>Tipo Usuario</a>
                                </li>
                                <?php
                                }
                                if($rolusuario[130-1]['rolusuario_asignado'] == 1){
                                ?>
                                <li>
                                    <a href="<?php echo site_url('usuario');?>"><i class="fa fa-users"></i>Usuarios</a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        
                        <?php  ?>
                        <?php }elseif($session_data['tipousuario_id'] == 2){ ?>
                        <li>
                            <a href="<?php echo site_url('docente/dashboard/'.$session_data['usuario_id']);?>"><i class="fa fa-home"></i> <span>Inicio</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/grupos/'.$session_data['usuario_id']);?>"><i class="fa fa-users"></i> <span>Grupos</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/materias/'.$session_data['usuario_id']);?>"><i class="fa fa-database"></i> <span>Materias</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/horarios/'.$session_data['usuario_id']);?>"><i class="fa fa-calendar-check-o"></i> <span>Horarios</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/notas/'.$session_data['usuario_id']);?>"><i class="fa fa-list-alt"></i> <span>Notas</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('docente/cuenta/'.$session_data['usuario_id']);?>"><i class="fa fa-id-card"></i> <span>Administrar Cuenta</span></a>
                        </li>
                        <?php  ?>
                        <?php }elseif($session_data['tipousuario_id'] == 3){ ?>
                        <li>
                            <a href="<?php echo site_url('estudiante/menu_estudiante/'.$session_data['usuario_id']);?>"><i class="fa fa-home"></i> <span>Inicio</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('estudiante/datos/'.$session_data['usuario_id']);?>"><i class="fa fa-buysellads"></i> <span>Perfil</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('estudiante/carreras/'.$session_data['usuario_id']);?>"><i class="fa fa-user-circle"></i> <span>Carreras</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('estudiante/knotas/'.$session_data['usuario_id']);?>"><i class="fa fa-user"></i> <span>Kardex Notas</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('estudiante/keconomico/'.$session_data['usuario_id']);?>"><i class="fa fa-maxcdn"></i> <span>Kardex Económico</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('estudiante/cuenta/'.$session_data['usuario_id']);?>"><i class="fa fa-id-card"></i> <span>Administrar Cuenta</span></a>
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
