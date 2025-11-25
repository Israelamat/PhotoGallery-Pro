<div class="container">
  <h2>Añadir imagen a exposición</h2>

  <p>Imagen seleccionada: <strong>ID <?= $idImagen ?></strong></p>

  <form action="/exposicion/guardarImagen" method="POST">

    <input type="hidden" name="idImagen" value="<?= $idImagen ?>">

    <label>Selecciona exposición activa:</label>
    <select name="idExposicion" class="form-control" required>
      <?php foreach ($exposicionesActivas as $expo): ?>
        <option value="<?= $expo->getId() ?>">
          <?= $expo->getNombre() ?> (<?= $expo->getFechaInicio() ?> → <?= $expo->getFechaFin() ?>)
        </option>
      <?php endforeach; ?>
    </select>

    <button class="btn btn-primary mt-3">Añadir a exposición</button>
  </form>
</div>