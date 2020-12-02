<?php require_once("vistas/parte_superior.php"); ?>




<link href="styles.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400' rel='stylesheet' type='text/css'>

<!-- formulario de contacto -->

<center>
	<form action="envia.php" method="post" class="form-consulta"> 
		<label>Nombre y apellido: <span>*</span>
			<input type="text" name="nombre" placeholder="Nombre y apellido" class="campo-form" required>
		</label>
		<br>
		<label>Asunto: <span>*</span>
			<input type="text" name="asunto" placeholder="Asunto" class="campo-form" required>
		</label>
		<br>
		<label>Email: <span>*</span>
			<input type="email" name="email" placeholder="Email" class="campo-form" required>
		</label>
		<br>
		<label>Consulta:
			<textarea name="consulta" class="campo-form"></textarea>
		</label>
<br>
		<input type="submit" value="Enviar" class="btn-form">
	</form>
</center>
<!-- formulario -->


<?php require_once("vistas/parte_inferior.php"); ?>