<link href="<?php echo base_url('resources/css/carnet.css'); ?>" rel="stylesheet">
  
   
    <div class="profile-card">
      <div class="col-md-3">
        <center>
          <?php if ($docente['docente_foto']!=NULL && $docente['docente_foto']!="") { ?>
        <a href="#"><img class="profile-pic"src="<?php echo base_url('resources/images/docentes/').$docente['docente_foto']; ?>" /></a>
      <?php }else{ ?>
        <a href="#"><img class="profile-pic"src="<?php echo base_url('resources/images/docentes/default.jpg') ?>" /></a>
      <?php } ?>
       </center>
      </div>
      <div class="col-md-9">
        <center>
        <h4 class="name"><?php echo $docente["docente_apellidos"]; ?> <?php echo $docente["docente_nombre"]; ?></h4>
        <h5 class="title"><?php echo $docente["docente_titulo"]; ?> / <?php echo $docente["docente_especialidad"]; ?></h5>
        </center>
        <div class="col-md-6"><br>
          <ul class="attributes">
            <li>CI:</li>
            <li>F. Nac.:</li>
            <li>Genero:</li>
            <li>E. Civil:</li>
          </ul>
          <ul class="values">
            <li><?php echo $docente["docente_ci"]; ?> <?php echo $docente["docente_extci"]; ?></li>
            <li><?php echo date("d/m/Y", strtotime($docente['docente_fechanac'])); ?></li>
            <li><?php echo $docente["genero_id"]; ?></li>
            <li><?php echo $docente["estado_id"]; ?></li>
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
            <li><?php echo $docente["docente_direccion"]; ?></li>
            <li><?php echo $docente["docente_telefono"]; ?></li>
            <li><?php echo $docente["docente_celular"]; ?></li>
            <li><?php echo $docente["docente_email"]; ?></li>
          </ul>
        </div>
      
      </div>
    </div>
<BR></BR>

<section class="container-wrapper">
      <!-- Info boxes -->
      
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
              <div class="inner" >
                    <?php
                    $interlineado = "";
                    echo $interlineado; ?>
                
              <h3><b><fa class="fa fa-group"></fa></b></h3>
              <h5><b>GRUPOS</b></h5>
              
            </div>
              
            <div class="icon">
              <i class="fa fa-group"></i>              
            </div>
            <a href="<?php echo base_url('docente/grupos/'.$docente["docente_id"]); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
              <div class="inner" >
                
                    <?php
                    $interlineado = "";
                    echo $interlineado; ?>
                
              <h3><b><fa class="fa fa-database"></fa></b></h3>
              <h5><b>MATERIAS</b></h5>
            </div>
              
            <div class="icon">
              <i class="fa fa-database"></i>              
            </div>
            <a href="<?php echo base_url('docente/materias/'.$docente["docente_id"]); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
              <div class="inner" >
                
                    <?php
                    $interlineado = "";
                    echo $interlineado; ?>
                
              <h3><b><fa class="fa fa-clock-o"></fa></b></h3>
              <h5><b>HORARIOS</b></h5>
              
            </div>
              
            <div class="icon">
              <i class="fa fa-clock-o"></i>              
            </div>
            <a href="<?php echo base_url('docente/horarios/'.$docente["docente_id"]); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
              <div class="inner" >
                 
                    <?php
                    $interlineado = "";
                    echo $interlineado; ?>
                
              <h3><b><fa class="fa fa-clipboard"></fa></b></h3>
              <h5><b>NOTAS</b></h5>
              
            </div>
              
            <div class="icon">
              <i class="fa fa-clipboard"></i>              
            </div>
            <a href="<?php echo base_url('docente/notas/'.$docente["docente_id"]); ?>" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
 
</section>