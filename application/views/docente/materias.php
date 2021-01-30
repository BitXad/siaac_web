<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">
  <div class="box-header">
    <h3 class="box-title">Materias</h3>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-striped" id="mitabla">
      <thead>
        <tr>
          <th>#</th>
          <th>Materia</th>
          <th>Codigo</th>
          <th>Nivel</th>
          <th>Paralelo</th>
          <th>Area</th>
          <th>Gestion</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php $cont = 1;?>
        <?php foreach($materias as $materia){?>
          <tr>
            <td><?= $cont; ?></td>
            <td><?= $materia['materia_nombre'] ?></td>
            <td><?= $materia['materia_codigo'] ?></td>
            <td class="text-center"><?= $materia['nivel_descripcion'] ?></td>
            <td class="text-center"><?= $materia['paralelo_descripcion'] ?></td>
            <td><?= $materia['area_nombre'] ?></td>
            <td class="text-center"><?= $materia['gestion_descripcion'] ?></td>
            <td>
            
              <!-- <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#temas" onclick="tabla_tema($materia_id)">Tema</button> -->
              <a href="<?= site_url("material/index/{$materia['materia_id']}") ?>" class="btn btn-xs btn-warning">Material</a>
              <a href="<?= site_url("tarea/index/{$materia['materia_id']}") ?>" class="btn btn-xs btn-warning">Tareas</a>
            </td>
          </tr>
        <?php $cont+=1; }?>
      </tbody>
    </table>
  </div>

  <!-- <div class="modal fade" id="temas" tabindex="-1" role="dialog" aria-labelledby="temaModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="temaModal">Temas</h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Tema</th>
            <th>Estado</th>
            <th>Acci&oacute;n</th>
          </thead>
          <tbody id="tema">

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div> -->
</div>
 