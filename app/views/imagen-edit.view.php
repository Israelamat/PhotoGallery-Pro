<div class="container">
  <div class="col-xs-12 col-sm-8 col-sm-push-2">
    <h2>Editar Imagen</h2>
    <hr>

    <form action="/galeria/editar/<?= $imagen->getId() ?>" method="post">
      
      <div class="form-group">
        <label class="label-control">Título</label>
        <input type="text" class="form-control" name="titulo" value="<?= $titulo ?>">
      </div>

      <div class="form-group">
        <label class="label-control">Descripción</label>
        <textarea class="form-control" name="descripcion"><?= $descripcion ?></textarea>
      </div>

      <div class="form-group">
        <label class="label-control">Categoría</label>
        <input type="number" class="form-control" name="categoria" value="<?= $categoria ?>">
      </div>

      <button class="btn btn-primary">Guardar Cambios</button>
      <a href="/galeria" class="btn btn-secondary">Cancelar</a>

    </form>

  </div>
</div>
