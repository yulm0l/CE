<!DOCTYPE html>
<html lang="en">
<head>
	<title>CONTROL ESCOLAR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="login-ui/image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="login-ui/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="login-ui/css/util.css">
	<link rel="stylesheet" type="text/css" href="login-ui/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(login-ui/images/bg-02.jpg);">
					<span class="login100-form-title-1"></span>
				</div>

				<form method="post" id="examineeLoginFrm" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" required>
						<span class="label-input100">Correo</span>
						<input class="input100" type="text" name="username" placeholder="Ingresa tu correo">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" required>
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="Ingresa tu contraseña">
						<span class="focus-input100"></span>
					</div>


					<div class="container-login100-form-btn">
            
					<div class="container-login100-form-btn">
          <input type="hidden" name="action" id="action" value="login">
          <button type="submit" class="btn btn-primary" id="saveButton" data-action="login">Iniciar sesión</button>
          <a href="#j" class="btn btn-primary" data-action="register" data-toggle="modal" data-target="#exampleModalLong">Registrar</a>
          
				</form>
			</div>
		</div>
        <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="refreshFrm" id="addExamineeFrm" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Nombre completo</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="Fátima López Pérez" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label>Fecha de nacimiento</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Fecha" autocomplete="off"required >
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender" id="gender" required>
              <option value="0">Selecciona tu género</option>
              <option value="male">Hombre</option>
              <option value="female">Mujer</option>
            </select>
          </div>
          <div class="form-group">
            <label>Nivel</label>
            <select class="form-control" name="course" id="course" required>
    <option value="0">Selecciona nivel</option>
    <option value="1">PRIMER GRADO</option>
    <option value="2">SEGUNDO GRADO</option>
    <option value="3">TERCER GRADO</option>
    <option value="4">CUARTO GRADO</option>
    <option value="5">QUINTO GRADO</option>
    <option value="6">SEXTO GRADO</option>
</select>

          </div>
          <!-- <div class="form-group">
            <label>Año</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="0">Selecciona</option>
              <option value="first year">First Year</option>
              <option value="second year">Second Year</option>
              <option value="third year">Third Year</option>
              <option value="fourth year">Fourth Year</option>
            </select>
          </div> -->
          <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="you@example.com" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="*******" autocomplete="off" required>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    </form>
  </div>
</div>
	</div>
	
	<script src="login-ui/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="login-ui/vendor/animsition/js/animsition.min.js"></script>
	<script src="login-ui/vendor/bootstrap/js/popper.js"></script>
	<script src="login-ui/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="login-ui/vendor/select2/select2.min.js"></script>
	<script src="login-ui/vendor/daterangepicker/moment.min.js"></script>
	<script src="login-ui/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="login-ui/vendor/countdowntime/countdowntime.js"></script>
	<script src="login-ui/js/main.js"></script>

</body>
</html>