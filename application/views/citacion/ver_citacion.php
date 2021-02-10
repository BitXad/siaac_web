<div class="box-header">
    <h3 class="box-title">Citaci&oacute;n</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class="row">
                                    <h3 class="text-center"><?= $citacion['citacion_titulo'] ?></h3>
                                    <div class="col-md-6">
                                        <p class="text-height">
                                            <span><b>RAZ&Oacute;N:</b> <?= $citacion['citacion_razon'] ?></span><br>
                                            <span><b>MATERIA:</b> <?= $citacion['materia_nombre'] ?></span><br>
                                            <span><b>REALIZADO POR:</b> <?= "{$citacion['docente_apellidos']} {$citacion['docente_nombre']}" ?></span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="text-right">
                                            <b>FECHA: </b><span><?= "{$citacion['citacion_fecha']}" ?></span><br>
                                            <b>HORA: </b><span><?= "{$citacion['citacion_hora']}" ?></span>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="text-justify"><?= $citacion['citacion_descripcion'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>