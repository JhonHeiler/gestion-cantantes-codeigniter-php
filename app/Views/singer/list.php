<br/>
    <?=$header;?>
    <br/>
    <a class="btn btn-sm btn-success" href="<?=base_url('create')?>">Crear cantante </a>
    <br/>
    <br/>
    <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
          <table class="table users table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th><div class="col-md-4">#</div></th>
                <th><div class="col-md-4">nombre</div></th>
                <th><div class="col-md-4">fecha_nacimiento</div></th>
                <th><div class="col-md-4">biografia</div></th>
                <th><div class="col-md-4">foto</div></th>
                <th><div class="col-md-4">genero</div></th>
                <th><div class="col-md-4">Acciones</div></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($singers as $singer): ?>
            <tr>
                <td><?=$singer['id']; ?></td>
                <td><?=$singer['nombre'];?></td>
                <td><?=$singer['fecha_nacimiento'];?></td>
                <td><?=$singer['biografia'];?></td>
                <td><img src="<?=base_url()?>/uploads/<?=$singer['foto'];?>" 
                 wiidth="100" height="100" alt=""></td>
                <td><?=$singer['genero'];?></td>
                <td>
                   <a type="button" class="btn btn-info btn-block" href="<?=base_url('edit/'.$singer['id']);?>">Editar</a>
                   <a type="button" class="btn btn-danger btn-block" href="<?=base_url('delete/'.$singer['id']);?>">Eliminar</a> 
                </td>
            </tr>
            <?php endforeach;  ?>
        </tbody>
    </table>
    </div>
    </div>
  </div>

    <?=$footer; ?>