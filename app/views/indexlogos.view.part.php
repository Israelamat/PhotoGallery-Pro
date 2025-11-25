<div class="last-box row">
  <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">

    <div class="partner-box text-center" style="background-color: #1a1a1a; color: #f8f9fa; padding: 20px 0;">

      <p class="mb-3" style="color: #f8f9fa;">
        <i class="fa fa-map-marker fa-2x sr-icons" style="color: #ff4655;"></i>
        <span class="text-muted ml-1" style="color: inherit !important;">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
      </p>

      <h4 style="color: #ffffff; font-weight: bold; margin-bottom: 5px;">
        Our Main Partners
        <span style="display: block; width: 60px; height: 3px; background-color: #ff4655; margin: 5px auto 15px auto;"></span>
      </h4>

      <div class="d-flex justify-content-center">

        <ul class="list-unstyled partner-list" style="width: 100%; max-width: 300px; padding: 0;">
          <?php
          $contador = 0;
          $limiteSocios = 4;
          $limiteCaracteres = 15;
          ?>

          <?php foreach ($asociadosLista as $logo): ?>

            <?php
            if ($contador >= $limiteSocios) {
              break;
            }

            $nombreOriginal = $logo->getNombre();
            if (strlen($nombreOriginal) > $limiteCaracteres) {
              $nombreMostrado = substr($nombreOriginal, 0, $limiteCaracteres) . '...';
            } else {
              $nombreMostrado = $nombreOriginal;
            }
            ?>

            <li class="mb-2" style="list-style: none; margin-bottom: 10px;">

              <div class="d-flex justify-content-center align-items-center rounded mr-3"
                style="background-color: #ffffff; width: 50px; height: 50px; flex-shrink: 0; margin-right: 15px; display: inline-block; vertical-align: middle;">

                <img src="<?= $logo->getUrl() ?>"
                  alt="<?= $logo->getDescripcion() ?>"
                  class="img-fluid"
                  style="max-width: 90%; max-height: 90%; object-fit: contain;">
              </div><span class="text-white" style="font-size: 1rem; font-weight: 500; vertical-align: middle;">
                <?= $nombreMostrado ?>
              </span>
            </li>
          <?php
            $contador++;
          endforeach;
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>