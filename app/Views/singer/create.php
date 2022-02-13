<?=$header;?>
Formulario de registro

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Ingresar datos del cantante</h5>
        <p class="card-text">
        <form method="post" action="<?=site_url('/cantantes')?>" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" value="<?=old('nombre')?>"name="nombre" id="nombre" class="form-control">
            </div>
            <div class="form-group">
              <label for="fecha_nacimiento">fecha de nacimiento</label>
              <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
            </div>
            <div class="form-group">
            <label for="Biografia">Biografia</label>
            <textarea class="form-control" name="biografia" placeholder="biografia" id="biografia"></textarea>
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" class="form-control-file"name="foto" id="foto" class="form-control">
            </div>
            <div class="form-group">
              <label for="genero">Genero</label>
              <input type="text" name="genero" id="genero" class="form-control">
            </div>
            <button class="btn btn-success" type="submit">Guadar</button>
            <a class="btn btn-info" href="<?=base_url('')?>">Cancelar</a>
        </form>

        </p>
    </div>
</div>

<?=$footer;?>