<?php
$session_data = $this->session->userdata('logged_in'); 
?>

  <!-- Left side column. contains the logo and sidebar -->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<link href="<?php echo base_url('resources/css/carnet.css'); ?>" rel="stylesheet">
  
   
    <div class="profile-card">
      <div class="col-md-3">
        <center>
          <?php if ($estudiante['estudiante_foto']!=NULL && $estudiante['estudiante_foto']!="") { ?>
        <a href="#"><img class="profile-pic"src="<?php echo base_url('resources/images/estudiantes/').$estudiante['estudiante_foto']; ?>" /></a>
      <?php }else{ ?>
        <a href="#"><img class="profile-pic"src="<?php echo base_url('resources/images/estudiantes/default.jpg') ?>" /></a>
      <?php } ?>
       </center>
      </div>
      <div class="col-md-9">
        <center>
        <h4 class="name"><?php echo $estudiante["estudiante_apellidos"]; ?> <?php echo $estudiante["estudiante_nombre"]; ?></h4>
        <h5 class="title"><?php echo $estudiante["estudiante_lugarnac"]; ?> / <?php echo $estudiante["estudiante_nacionalidad"]; ?></h5>
        </center>
        <div class="col-md-6"><br>
          <ul class="attributes">
            <li>CI:</li>
            <li>F. Nac.:</li>
            <li>Genero:</li>
            <li>E. Civil:</li>
          </ul>
          <ul class="values">
            <li><?php echo $estudiante["estudiante_ci"]; ?> <?php echo $estudiante["estudiante_extci"]; ?></li>
            <li><?php echo date("d/m/Y", strtotime($estudiante['estudiante_fechanac'])); ?></li>
            <li><?php echo $estudiante["genero_id"]; ?></li>
            <li><?php echo $estudiante["estado_id"]; ?></li>
          </ul>
        </div>
        <div class="col-md-6"><br>
          <ul class="attributes">
            <li>Direccion:</li>
            <li>Telefono:</li>
            <li>Celular:</li>
            <li>Email:</li>
          </ul>
          <ul class="values">
            <li><?php echo $estudiante["estudiante_direccion"]; ?></li>
            <li><?php echo $estudiante["estudiante_telefono"]; ?></li>
            <li><?php echo $estudiante["estudiante_celular"]; ?></li>
            <li><?php echo $estudiante["estudiante_email"]; ?></li>
          </ul>
        </div>
      
      </div>
    </div>
<BR></BR>
  <!-- Content Wrapper. Contains page content -->
<div class="container-wrapper"> 
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner" >
                <?php 
                $interlineado = "";
                echo $interlineado; ?>
                <h3><b><fa class="fa fa-address-card"></fa></b></h3>
                <h5><b>PERFIL</b></h5>
            </div>
            <div class="icon">
                <i class="fa fa-address-card"></i>              
            </div>
            <a href="<?php  echo site_url('estudiante/datos/'.$estudiante['estudiante_id']); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua-gradient">
            <div class="inner" >
                <?php 
                $interlineado = "";
                echo $interlineado; ?>
                <h3><b><fa class="fa fa-list"></fa></b></h3>
                <h5><b>CARRERAS</b></h5>
            </div>
            <div class="icon">
                <i class="fa fa-list"></i>              
            </div>
            <a href="<?php  echo site_url('estudiante/carreras/'.$estudiante['estudiante_id']); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
            <div class="inner" >
                <?php 
                $interlineado = "";
                echo $interlineado; ?>
                <h3><b><fa class="fa fa-file-text"></fa></b></h3>
                <h5><b>KARDEX NOTAS</b></h5>
            </div>
            <div class="icon">
                <i class="fa fa-file-text"></i>              
            </div>
            <a href="<?php  echo site_url('estudiante/knotas/'.$estudiante['estudiante_id']); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner" >
                <?php 
                $interlineado = "";
                echo $interlineado; ?>
                <h3><b><fa class="ion ion-cash"></fa></b></h3>
                <h5><b>KARDEX ECONOMICO</b></h5>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>              
            </div>
            <a href="<?php  echo site_url('estudiante/keconomico/'.$estudiante['estudiante_id']); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    