<?=$header;?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del cantante</h5>
        <p class="card-text">
        <form method="post" action="<?=site_url('/actualizar')?>" enctype="multipart/form-data">
        <input type="hidden" value="<?=$singer['id']?>" name="id">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" value="<?=$singer['nombre']?>" name="nombre" id="nombre" class="form-control">
            </div>
            <div class="form-group">
              <label for="fecha_nacimiento">fecha de nacimiento</label>
              <input type="date" value="<?=$singer['fecha_nacimiento']?>" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
            </div>
            <div class="form-group">
            <label for="Biografia">Biografia</label>
            <textarea class="form-control" name="biografia"  id="biografia"><?=$singer['biografia']?></textarea>
            </div>
            <div class="form-group">
            <label for="foto">Foto</label>
            <br/>
            <img src="<?=base_url()?>/uploads/<?=$singer['foto'];?>" 
                 wiidth="100" height="100" alt="">
                 <input type="file" class="form-control-file"name="imagen" id="imagen" class="form-control">
            </div>
            <div class="form-group">
              <label for="genero">Genero</label>
              <input type="text" value="<?=$singer['genero']?>" name="genero" id="genero" class="form-control">
            </div>
            <button class="btn btn-success" type="submit">Actualizar</button>
            <a class="btn btn-info" href="<?=base_url('')?>">Cancelar</a>
        </form>

        </p>
    </div>
</div>

<?=$footer;?>