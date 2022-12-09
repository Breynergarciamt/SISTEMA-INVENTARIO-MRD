<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuario</title>
	<link rel="icon" href="img/128.png" type="PNG" sizes="16px">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet"  href="css/inicio.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>

</head>
	<body class="body">
	<br><br><br><br><br><br><br>
	<div class="container ">
		<div class="row">	
		<div class="col-sm-4"></div>
		<div class="col-sm-4  ">
				<div class="panel panel-default class ">
					<div class="panel panel-heading">Registrar Usuario</div>
					<div class="panel panel-body input-group">
						<form id="frmRegistro">
							
							<label>Nombre:</label>
							<div class="input-group">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control input-sm" name="nombre" id="nombre" placeholder="Nombre de usuario">
							</div> 
							<p></p>
							
							<label>Apellido:</label>
							<div class="input-group">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control input-sm" name="apellido" id="apellido" placeholder="Apellido de usuario">
							</div>
							<p></p>

							<label>Correo electronico:</label>
							<div class="input-group">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario" placeholder="Correo electronico">
							</div>
							<p></p>
							
							<label>Contraseña:</label>
							<div class="input-group">
    						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="text" class="form-control input-sm" name="password" id="password" placeholder="Contraseña de usuario">
							</div>
							<p></p>
							
							<span class="btn btn-primary " id="registro">Registrar usuario</span>
							<a href="index.php" class="btn btn-danger active btn-sm">Regresar al Login</a>
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
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("¡Debes completar todos los campos!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("¡Usuario registrado!");
					}else{
						alert("¡Error al registrar usuario!");
					}
				}
			});
		});
	});
</script>

