<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<link rel="icon" href="img/128.png" type="PNG" sizes="16px">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet"  href="css/inicio.css">
	<script src="js/funciones.js"></script>
</head>
<body class="body">
<br><br><br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-default">
					<div class="panel panel-heading">Inventario MRD</div>
					<div class="panel panel-body">
						<p align="center">
							<img src="img/logo.png"  height="220" width="250">
						</p>
						<form id="frmLogin">
							
						<label>Correo electronico:</label>
							<div class="input-group">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario" placeholder="Correo electronico">
							</div>
							<p></p>
							
							<label>Contraseña:</label>
							<div class="input-group">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Contraseña de usuario">
							</div>
							<p></p>
							
							<span class="btn btn-primary " id="entrarSistema">Iniciar sesion</span>
							<?php  if(!$validar): ?>
							<a href="registro.php" class="btn btn-danger active btn-sm">Registrar usuario</a>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("¡Debes completar todos los campos!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("¡Correo electronico o contraseña incorrectos!");
				}
			}
		});
	});
	});
</script>