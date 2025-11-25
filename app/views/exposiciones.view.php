<div class="container">
  <h2>Exposiciones</h2>

  <a class="btn btn-success" href="/exposiciones/nueva">Nueva exposición</a>

  <table class="table mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Fechas</th>
        <th>Activa</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($exposiciones as $expo): ?>
        <tr>
          <td><?= $expo->getId() ?></td>
          <td><?= $expo->getNombre() ?></td>
          <td><?= $expo->getFechaInicio() ?> → <?= $expo->getFechaFin() ?></td>
          <td><?= $expo->isActiva() ? 'Sí' : 'No' ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="row">
    <?php foreach ($exposicionesActiva as $expo): ?>
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">

            <h5 class="card-title"><?= $expo->getNombre() ?></h5>

            <?php
            $tieneImg = false;
            foreach ($relaciones as $rel):
              if ($rel->getIdExposicion() == $expo->getId()):

                foreach ($imagenes as $img):
                  if ($img->getId() == $rel->getIdImagen()):
                    $tieneImg = true;
            ?>
                    <img src="<?= $img->getUrlImagenes() ?>"
                      class="img-fluid mb-2"
                      style="max-height: 200px; width: auto; display: block; margin: 0 auto;"
                      alt="Imagen de <?= $expo->getNombre() ?>">
            <?php
                  endif;
                endforeach; 

              endif;
            endforeach; 

            if (!$tieneImg):
              echo "<p>No hay imágenes para esta exposición.</p>";
            endif;
            ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>