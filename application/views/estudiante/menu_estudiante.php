<?php
$session_data = $this->session->userdata('logged_in'); 
?>

  <!-- Left side column. contains the logo and sidebar -->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>

<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />

  <!-- Content Wrapper. Contains page content -->
<div class="container-wrapper">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner" >
                <?php 
                $interlineado = "";
                echo $interlineado; ?>
                <h4><b>PERFIL</b></h4>
                <p>&nbsp;</p>
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
                <h4><b>CARRERAS</b></h4>
                <p>&nbsp;</p>
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
                <h4><b>KARDEX NOTAS</b></h4>
                <p>&nbsp;</p>
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
                <h4><b>KARDEX ECONÓMICO</b></h4>
                <p>&nbsp;</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>              
            </div>
            <a href="<?php  echo site_url('estudiante/keconomico/'.$estudiante['estudiante_id']); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    