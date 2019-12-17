<?php
$session_data = $this->session->userdata('logged_in'); 
?>

  <!-- Left side column. contains the logo and sidebar -->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

  <!-- Content Wrapper. Contains page content -->
<div class="container-wrapper">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner" >
                <?php 
                $interlineado = "";
                echo $interlineado; ?>
                <h4><b>DATOS</b></h4>
                <p>&nbsp;</p>
            </div>
            <div class="icon">
                <i class="fa fa-address-card"></i>              
            </div>
            <a href="<?php  echo site_url('estudiante/datos/'.$estudiante['estudiante_id']); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    <div class="col-md-5">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-address-card"></i></span>
            <a href="<?php echo site_url('estudiante/datos/'.$estudiante['estudiante_id']) ?>" style="color: white;">
                <div class="info-box-content">
                    <span class="info-box-text">Datos</span>
                    <span class="info-box-number"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-5">
        <div class="info-box bg-aqua-gradient">
            <span class="info-box-icon"><i class="fa fa-list"></i></span>
            <a href="<?php echo site_url('estudiante/carreras/'.$estudiante['estudiante_id']) ?>" style="color: white;">
                <div class="info-box-content">
                    <span class="info-box-text">Carreras</span>
                    <span class="info-box-number"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-5">
        <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-file-text"></i></span>
            <a href="<?php echo site_url('estudiante/knotas/'.$estudiante['estudiante_id']) ?>" style="color: white;">
                <div class="info-box-content">
                    <span class="info-box-text">Kardex Notas</span>
                    <span class="info-box-number"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"></span>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-5">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-cash"></i></span>
            <a href="<?php echo site_url('estudiante/keconomico/'.$estudiante['estudiante_id']) ?>" style="color: white;">
                <div class="info-box-content">
                    <span class="info-box-text">Kardex Económico</span>
                    <span class="info-box-number"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description"></span>
                </div>
            </a>
        </div>
    </div>
  </div>