<?php

use dwes\app\utils\Utils;
?>
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">
        <span>[PHOTO]</span>
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="menu">
      <ul class="nav navbar-nav">
        <li class="<?php echo (utils::esOpcionMenuActiva('/index.php') || utils::esOpcionMenuActiva('/')) ? 'active lien' : 'lien'; ?>">
          <a href="/"><i class="fa fa-home sr-icons"></i> Home</a>
        </li>
        <li class="<?php echo utils::esOpcionMenuActiva('/about.php') ? 'active lien' : 'lien'; ?>">
          <a href="/about"><i class="fa fa-bookmark sr-icons"></i> About</a>
        </li>
        <li class="<?php echo utils::esOpcionMenuActiva('/blog.php') ? 'active lien' : 'lien'; ?>">
          <a href="/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a>
        </li>
        <li class="<?php echo utils::esOpcionMenuActiva('/contact.php') ? 'active lien' : 'lien'; ?>">
          <a href="/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
        </li>
        <!-- Condicion si el usuario esta logueado -->
        <?php if (is_null($app['user'])) : ?>
          <?php if (Utils::esOpcionMenuActiva('/login') == true) echo '<li class="active lien">';
          else echo '<li class=" lien">'; ?>
          <a href="/login"><i class="fa fa-user-secret sr-icons"></i> Login</a></li>
        <?php else : ?>
          <li class="<?php echo utils::esOpcionMenuActiva('/galeria.php') ? 'active lien' : 'lien'; ?>">
            <a href="/galeria"><i class="fa fa-file-text sr-icons"></i> Galeria</a>
          </li>
          <li class="<?php echo utils::esOpcionMenuActiva('/asociados.php') ? 'active lien' : 'lien'; ?>">
            <a href="/asociados"><i class="fa fa-bookmark sr-icons"></i> Asociados</a>
          </li>
          <?php if (Utils::esOpcionMenuActiva('/logout') == true) echo '<li class="active lien">';
          else echo '<li class=" lien">'; ?>
          <a href="/logout"><i class="fa fa-sign-out sr-icons"></i> <?= $app['user']->getUsername() ?></a></li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>