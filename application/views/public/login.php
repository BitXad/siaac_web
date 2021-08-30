<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - Siaac Web</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url() ?>resources/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo site_url() ?>resources/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo site_url() ?>resources/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style type="text/css">
    .radio-btn {
        position: absolute;
    opacity: 0;
    visibility: hidden;
      
}
    .form-group  input:checked + label {
    border: 3px solid #333;
    background-color: #2fcc71;
    color: #000000;
}
</style>
<body class="hold-transition login-page">
            <?php if($diaslic < 0){ ?>
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion-alert-circled"></i></span>
            <div class="info-box-content" style="margin-left: 0px">
                <span class="info-box-text"><font size="4"><b>LA LICENCIA ESTA EXPIRADA </b></font></span>
                <span class="info-box-number"></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    No podra ingresar al Sistema.  Consulte con el Proveedor
                </span>
            </div><!-- /.info-box-content -->
        </div>
        <?php } else if($diaslic == 5000){ ?>
        <?php }  else { ?>
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion-alert-circled"></i></span>
            <div class="info-box-content" style="margin-left: 0px">
                <span class="info-box-text"><font size="4">LA LICENCIA VENCERA EN: <font size="5"><b><?php echo $diaslic; ?></b></font> DIAS</font></span>
                <span class="info-box-number"></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    No podra ingresar al Sistema.
                </span>
            </div><!-- /.info-box-content -->
        </div>  
<?php } ?>
    <div class="login-box">
        <div class="login-logo" style="font-family: Arial; line-height: 10px">
            <fa class="fa fa-mortar-board"></fa>    <b>esencial </b>            

            <h5>
                <?php
                    if (isset($institucion)){
                        echo $institucion["institucion_nombre"];}
                ?>        
            </h5> 

        </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

  
        
        
        
        <p class="login-box-msg"></p>
        
        <h2><?php  if(isset($msg)){ echo  $msg; }  ?> </h2>
<?php if($diaslic < 0){ ?>
                <br><div class="info-box bg-red"><br>
            <center><span class="info-box-text"><font size="4"><b>LA LICENCIA ESTA EXPIRADA </b></font></span></center><br>
            <center><span class="progress-description">
                    No podra ingresar al Sistema.  Consulte con el Proveedor
                  </span></center><br></div>
             <?php }else { ?>
        <?php echo form_open('verificar'); ?>
<!--    //Radio Buttons antiguos
        <div class="form-group">
        
        
            <input type="radio" class="radio-btn" checked name="tipo" id="cbox1" value="1"><label for="cbox1"><i class="fa fa-sitemap"></i> ADMINISTRATIVO </label>
            <input type="radio" class="radio-btn" name="tipo" id="cbox2" value="2"><label for="cbox2"><i class="fa fa-book"></i> DOCENTE </label>
            <input type="radio" class="radio-btn" name="tipo" id="cbox3" value="3" ><label for="cbox3" ><i class="fa fa-mortar-board"></i> ESTUDIANTE </label>
        
        </div>-->
        
        <div>
        
        <!--Radio buttons-->
        <?php 
            $padding = "
                        padding-top: 3px;
                        padding-left: 3px;
                        padding-bottom: 3px;
                        padding-right: 3px;";
        ?>
        
            <center>
        <div class="btn-group" data-toggle="buttons">
                
            <label class="btn btn-primary active form-check-label" style="padding:<?php echo $padding; ?>">

              <!--<input class="form-check-input" type="radio" checked autocomplete="off"> radio 1 (pre-checked)-->
                <input type="radio" class="radio-btn" checked name="tipo" id="cbox1" value="1"><i class="fa fa-sitemap"></i> ADMINISTRATIVO 

            </label>

            <label class="btn btn-primary form-check-label" style="padding:<?php echo $padding; ?>">
              <!--<input class="form-check-input" type="radio" autocomplete="off"> radio 2-->
                <input type="radio" class="radio-btn" name="tipo" id="cbox2" value="2"><i class="fa fa-book"></i> DOCENTE 
            </label>

            <label class="btn btn-primary form-check-label" style="padding:<?php echo $padding; ?>">
              <!--<input class="form-check-input" type="radio" autocomplete="off"> radio 3-->
                <input type="radio" class="radio-btn" name="tipo" id="cbox3" value="3" ><i class="fa fa-mortar-board"></i> ESTUDIANTE
            </label>
        </div>
            </center>
        
        <!--Radio buttons-->
    
        </div>
        
        
        <div class="form-group has-feedback">
                <label for="gestion">Gestión</label>
                <select class="form-control input-lg" name="gestion" id="gestion">
                    <?php
                        foreach($gestiones as $gestion){
                            echo '<option value="'.$gestion->gestion_id.'" >'. $gestion->gestion_semestre.'/'. $gestion->gestion_descripcion.'</option>' ;
                        }
                    ?>
                </select>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="usuario" autocomplete="off" autofocus required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="clave" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block"><fa class="fa fa-book"></fa> Ingresar</button>
                </div>
                <!-- /.col -->
            </div>
        <?php echo form_close(); ?>

        <!-- /.social-auth-links -->
        <!--<a href="<?php //echo site_url() ?>forgotpassword">Olvide mi contraseña</a><br>-->
<?php } ?>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo site_url() ?>resources/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url() ?>resources/js/bootstrap.min.js"></script>
<!-- iCheck -->

</body>
</html>
