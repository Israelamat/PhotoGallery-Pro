<?php

use dwes\app\utils\Utils; ?>

<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand page-scroll" href="/">
        <span>[PHOTO]</span>
      </a>
    </div>

    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">

        <!-- PUBLICO -->
        <li class="<?= Utils::esOpcionMenuActiva('/') ? 'active lien' : 'lien' ?>">
          <a href="/"><i class="fa fa-home sr-icons"></i> Home</a>
        </li>

        <li class="<?= Utils::esOpcionMenuActiva('/about') ? 'active lien' : 'lien' ?>">
          <a href="/about"><i class="fa fa-bookmark sr-icons"></i> About</a>
        </li>

        <li class="<?= Utils::esOpcionMenuActiva('/blog') ? 'active lien' : 'lien' ?>">
          <a href="/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>

        <li class="<?= Utils::esOpcionMenuActiva('/contact') ? 'active lien' : 'lien' ?>">
          <a href="/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
        </li>

        <!-- SI EL USUARIO NO ESTÁ LOGUEADO -->
        <?php if ($app['user'] === null): ?>

          <li class="<?= Utils::esOpcionMenuActiva('/login') ? 'active lien' : 'lien' ?>">
            <a href="/login"><i class="fa fa-user-secret sr-icons"></i> Login</a>
          </li>

          <li class="<?= Utils::esOpcionMenuActiva('/registro') ? 'active lien' : 'lien' ?>">
            <a href="/registro"><i class="fa fa-sign-in sr-icons"></i> Registro</a>
          </li>

        <?php else: ?>
          <!-- SI EL USUARIO ESTÁ LOGUEADO -->

          <li class="<?= Utils::esOpcionMenuActiva('/galeria') ? 'active lien' : 'lien' ?>">
            <a href="/galeria"><i class="fa fa-image sr-icons"></i> Galería</a>
          </li>

          <li class="<?= Utils::esOpcionMenuActiva('/asociados') ? 'active lien' : 'lien' ?>">
            <a href="/asociados"><i class="fa fa-users sr-icons"></i> Asociados</a>
          </li>

          <li class="<?= Utils::esOpcionMenuActiva('/exposiciones') ? 'active lien' : 'lien' ?>">
            <a href="/exposiciones"><i class="fa fa-picture-o sr-icons"></i> Exposiciones</a>
          </li>

          <li class="<?= Utils::esOpcionMenuActiva('/logout') ? 'active lien' : 'lien' ?>">
            <a href="/logout"><i class="fa fa-sign-out sr-icons"></i> <?= $app['user']->getUsername() ?></a>
          </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>