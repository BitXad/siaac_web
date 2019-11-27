<?php
$session_data = $this->session->userdata('logged_in'); 
//echo  '<h1>hola y adios </h1><br>';
//
//echo 'gestion: '.$session_data['gestion'].'<br>';
//echo 'gestion-semestre: '.$session_data['semestre'].'<br>';
//echo 'gestion_id: '.$session_data['gestion_id'];
?>

  <!-- Left side column. contains the logo and sidebar -->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/graficas.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/highcharts.js'); ?>"></script>
<!--<script src="https://code.highcharts.com/highcharts.js"></script>-->


<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<input type="hidden" name="empresa_nombre" id="empresa_nombre" value="<?php echo $institucion['institucion_nombre'] ?>" />


  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SIAAC WEB
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="../inscripcion/inscribir/0" style="color: black;"><div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inscripciones</span>
              <span class="info-box-number"><?php echo ($inscripcion[0]['suma']); ?><small> Bs</small></span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="../inscripcion/index" style="color: black;"><div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inscritos</span>
              <span class="info-box-number"><?php echo ($inscripcion[0]['cantidad']); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="../docente" style="color: black;"><div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Docentes</span>
              <span class="info-box-number"><?php echo sizeof($docentes); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="../estudiante" style="color: black;"><div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Estudiantes</span>
              <span class="info-box-number"><?php echo sizeof($estudiantes); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Reportes del mes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                 
                <div class="box-body" id="div_grafica_barras">
                </div>

                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Inscripciones</strong>
                  </p>
                  <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Usuario</th>
                  <th>Ingresos</th>
                  <th style="width: 40px">Bs</th>
                </tr>
                  <?php $cont = 0; $total_insc = 0;  foreach ($usuario_inscripcion as $user) { 
                    $cont++;
                        if($cont%1 == 0){ $tipobar = "danger"; $color="red";}
                        if($cont%2 == 0){ $tipobar = "info";  $color="light-blue";}
                        if($cont%3 == 0){ $tipobar = "success"; $color="green";}
                        if($cont%4 == 0){ $tipobar = "warning"; $color="yellow";}
                        if($cont%5 == 0){ $tipobar = "facebook"; $color="blue";}

                        ?>
                  <tr>
                      <td><?php echo $cont; ?></td>
                      <td><img src="<?php echo base_url('resources/images/usuarios/'.$user['usuario_imagen']); ?>" class="img-circle" width="50" height="50">
                          <?php echo $user['usuario_nombre']; ?> </td>
                    
                      <td>
                        <div class="progress progress-xs">             
                            
                          <div class="progress-bar progress-bar-<?php echo $tipobar; ?> progress-xs" style="width: <?php echo $user['total_insc']/$montos_inscripcion[0]['total_insc']*100;?>%"></div>                    
                        </div>
                      </td>
                      <td><span class="badge bg-<?php echo $color; ?>"><?php echo number_format($user['total_insc'],2,',','.');?></span></td>
                    </tr>
                <?php } ?>
                  <!-- /.progress-group -->
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
           
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Inscripciones</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
           
                    <!-- Map will be created here -->
                    

  <div class="box-body" id="div_grafica_lineas">
    </div>

                <!-- /.col -->
                
                <!-- /.col -->
              
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Carreras</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Carrera</th>
                    <th>Codigo</th>
                    <th>Estudiantes</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($estudiante_carr as $ce) { ?>
                      
                    
                  <tr>
                    <td><?php echo $ce["carrera_id"] ?></td>
                    <td><?php echo $ce["carrera_nombre"] ?></td>
                    <td><span class="label label-success"><?php echo $ce["carrera_codigo"] ?></span></td>
                    <td>
                      <?php  if($ce["cant"]>0) { ?>
                      <div class="sparkbar" data-color="#00a65a" data-height="20" align="center"><?php echo $ce["cant"]; ?></div>
                      <?php }else{  ?>
                      <div class="sparkbar" data-color="#00a65a" data-height="20" align="center">0</div>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!--<div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>-->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-cash"></i></span>

            <a href="../kardex_economico" style="color: white;"><div class="info-box-content">
              <span class="info-box-text">Mensualidades</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                   
                  </span>
            </div></a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-calculator"></i></span>

            <a href="../factura" style="color: white;"><div class="info-box-content">
              <span class="info-box-text">Facturas</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                   
                  </span>
            </div></a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-address-card"></i></span>

            <a href="../kardex_economico" style="color: white;"><div class="info-box-content">
              <span class="info-box-text">Kardex Economico</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 1000%"></div>
              </div>
              <span class="progress-description">
               
                  </span>
            </div></a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-id-card-o"></i></span>

            <a href="../kardex_academico" style="color: white;"><div class="info-box-content">
              <span class="info-box-text">Kardex Academico</span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                   
                  </span>
            </div></a>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->


          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimos estudiantes inscritos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

                <?php foreach ($inscritos_estudiante as $ie) { ?>
                <li class="item">
                  <div class="product-img">
                    <?php if ($ie['estudiante_foto']!=NULL && $ie['estudiante_foto']!="") { ?>
                    <img src="<?php echo base_url('/resources/images/estudiantes/'.$ie['estudiante_foto']);  ?>" width="30px" height="30px" class="img-circle">
                    <?php } else { ?>
                    <img src="<?php echo site_url('/resources/images/usuarios/thumb_default.jpg');  ?>" width="30px" height="30px">  
                    <?php }  ?>
                  </div>
                  <div class="product-info">
                  
                    <span class="product-description">
                         <?php echo $ie["estudiante_apellidos"]; ?> <?php echo $ie["estudiante_nombre"]; ?>
                        </span>
                  </div>
                </li>

              <?php } ?>
                <!-- /.item -->
             
                
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!--<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>-->

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<!--  <div class="control-sidebar-bg"></div>-->


<!-- ./wrapper -->

<!-- jQuery 3 -->
<!--<script src="bower_components/jquery/dist/jquery.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<!--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!-- FastClick -->
<!--<script src="bower_components/fastclick/lib/fastclick.js"></script>-->
<!-- AdminLTE App -->
<!--<script src="dist/js/adminlte.min.js"></script>-->
<!-- Sparkline -->
<!--<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>-->
<!-- jvectormap  -->
<!--<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
<!-- SlimScroll -->
<!--<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
<!-- ChartJS -->
<!--<script src="bower_components/chart.js/Chart.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="dist/js/demo.js"></script>-->
