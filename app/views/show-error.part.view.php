<?php if (!empty($mensaje) || !empty($errores)) : ?>
  <div class="alert alert-<?= empty($errores) ? 'info' : 'danger' ?>">
    <?php if (!empty($mensaje)) : ?>
      <p><?= $mensaje ?></p>
    <?php endif; ?>
    <?php if (!empty($errores)) : ?>
      <ul>
        <?php foreach ($errores as $error) : ?>
          <li><?= $error ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
<?php endif; ?>