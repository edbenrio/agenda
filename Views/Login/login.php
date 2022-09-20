<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/jquery-ui.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Iniciar Sesión - Agenda Médica</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Agenda Médica</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
          <div class="form-group">
            <label class="control-label">Usuario</label>
            <input class="form-control" type="text" placeholder="Usuario" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input class="form-control" type="contrasena" placeholder="Contraseña">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar Sesión</button>
          </div>
        </form>
      </div>
    </section>
    <?php footerAdmin(); ?>
</html>