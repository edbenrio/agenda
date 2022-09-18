<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="<?= media();?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?= media();?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?= media();?>/css/jquery-ui.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Registro - Agenda Médica</title>
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
        <form class="login-form" id="formPrimerInicio">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>PROFESIONAL</h3>
          <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label">Usuario</label>
                <input class="form-control" id="txtusuario" name="txtusuario" type="text" placeholder="Usuario" autofocus>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Contraseña</label>
                <input class="form-control"  id="txtcontrasena" name="txtcontrasena" type="password" placeholder="Contraseña">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label">Nombre</label>
                <input class="form-control" id="txtnombre" name="txtnombre" type="text" placeholder="nombre" autofocus>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Apellido</label>
                <input class="form-control" id="txtapellido" name="txtapellido" type="text" placeholder="apellido" autofocus>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label">Correo</label>
            <input class="form-control" id="txtcorreo" name="txtcorreo" type="text" placeholder="correo" autofocus>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
                <label class="control-label">Teléfono</label>
                <input class="form-control" id="txttelefono" name="txttelefono" type="text" placeholder="telefono" autofocus>
            </div>
            <div class="form-group col-md-6">
                <label class="control-label">Estado</label>
                <input class="form-control" id="txtestado" name="txtestado" type="text" placeholder="estado" autofocus>
            </div>
          </div>
          
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTRAR</button>
          </div>
        </form>
      </div>
    </section>
    <?php footerAdmin(); ?>
</html>