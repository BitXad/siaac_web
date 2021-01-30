<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
<div class="box-header">
                <h3 class="box-title">Grupos</h3>
           
            </div>
<div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                    	<th>Grupo</th>
                        <th>Materia</th>
                        <th>Nivel</th>
                        <th>Gestion</th>
                    </tr>
                    <?php
                    
                    foreach($grupos as $g){
                    ?>
          			<tr>
          				<td><?php echo $g['grupo_nombre']; ?></td>
          				<td><?php echo $g['materia_nombre']; ?></td>
          				<td><?php echo $g['nivel_descripcion']; ?></td>
          				<td align="center"><?php echo $g['descripcion_gestion']; ?></td>
          			</tr>
              <?php } ?>
          			
          		</table>
</div>