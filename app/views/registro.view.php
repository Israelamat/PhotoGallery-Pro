<div id="registro">
  <div class="container">
    <div class="col-xs-12 col-sm-8 col-sm-push-2">
      <h1>Registro</h1>
      <hr>

      <?php include __DIR__ . '/show-error.part.view.php'; ?>

      <form class="form-horizontal" action="/check-registro" method="post" onsubmit="return validarPasswords()">

        <!-- Username -->
        <div class="form-group">
          <div class="col-xs-12">
            <label class="label-control">Username</label>
            <input class="form-control" type="text" name="username"
              value="<?= $username ?? '' ?>" required>
          </div>
        </div>

        <!-- Password -->
        <div class="form-group">
          <div class="col-xs-12">
            <label class="label-control">Password</label>
            <input class="form-control" id="password" name="password"
              type="password" required>
          </div>
        </div>

        <!-- Repetir Password -->
        <div class="form-group">
          <div class="col-xs-12">
            <label class="label-control">Repetir password</label>
            <input class="form-control" id="repassword" name="repassword"
              type="password" required>
          </div>
        </div>

        <!-- Botón -->
        <div class="form-group">
          <div class="col-xs-12">
            <button class="pull-right btn btn-lg sr-button">REGISTRAR</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>