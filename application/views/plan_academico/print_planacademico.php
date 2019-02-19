<style type="text/css">
.titprincipal{
    font-size: 25pt;
    font-weight: bold;
}
.micontenedor{
    display: flex;
    max-width: 100%;
    max-height: 5%;
    font-family: "Arial", Arial Narrow;
    text-align: center;
}
.cabizquierda{
    width: 50%;
    font-size: 12pt;
}
/*.cabcentro{
    width: 10%;
}*/
.cabderecha{
    width: 50%;
    font-size: 12pt;
}
.unafila{
    float: left;
}
.unafila div{
    display: inline;
}
.todalafila{
    width: 100%;
}
.fuente8pt{
    font-size: 8pt;
}


</style>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header text-center titprincipal">PLAN DE ESTUDIOS</div>
<div class="box-header micontenedor">
    <div class="cabizquierda">
        <div>
            <table>
                <tr><td class="text-right">AREA FORMACION:&nbsp;</td><td class="text-left"><?php echo $area['areacarrera_nombre']; ?></td></tr>
                <tr><td class="text-right">CARRERA:&nbsp;</td><td class="text-left"><?php echo $carrera['carrera_nombre']; ?></td></tr>
            </table>
        </div>
    </div>
    <div class="cabderecha">
        DENOMINACION DEL TITULO PROFESIONAL:<br>
        <?php echo $plan_academico['planacad_titmodalidad']; ?>
    </div>
</div>
<div class="box-header text-center fuente8pt text-bold">CARGA HORARIA:&nbsp;<?php echo $carrera['carrera_cargahoraria'] ;?> Hrs.</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <?php
                    $i = 0;
                    foreach($all_nivel as $nivel) { ?>
                    
                    <th class="col-md-4"><?php echo $nivel['nivel_descripcion']; ?>
                        <?php if($i == 0){ ?>
                                <table>
                                    <th>CODIGO</th>
                                    <th>ASIGNATURAS</th>
                                    <th>HORAS</th>
                                </table>
                        <?php }else{ ?>
                                <table>
                                    <th>CODIGO</th>
                                    <th>ASIGNATURAS</th>
                                    <th>HORAS</th>
                                    <th>PRE<br>REQUISITO</th>
                                </table>
                        <?php } ?>
                    <?php $i++; } ?>
                    </th>
                </table>
                                
            </div>
        </div>
    </div>
</div>
