<?php 
include_once 'include/funciones/funciones.php';
session_start();
usuario_autenticado();

 ?>
<?php include_once 'include/templates/header.php';?>


<section class="seccion admin contenedor">



	<h2>Crear administradores</h2>
	<?php include_once 'include/templates/admin-nav.php';?>
	<form action="crear_admin.php" class="login" method="post">
		<div class="campo">
			<label for="usuario">
			Usuario</label><input type="text" id="usuario" name="usuario" placeholder="Tu usuario">

		</div>
		<div class="campo">
			<label for="password">
			Password</label><input type="password" id="password" name="password" placeholder="Tu usuario">

		</div>
		<div class="campo">
			<input type="submit" name="submit" class="button" value="Crear">
		</div>
	</form>

	<?php 
	if(isset($_POST["submit"])){
		echo "<pre>";
		echo var_dump($_POST);
		echo "</pre>";

		$usuario=$_POST["usuario"];
		$password=$_POST["password"];
		if(strlen($usuario)<5)
			echo "El nombre del usuario debe ser mas largo";

		$opciones = array(
			"cost"=> 12,
			"salt"=>mcrypt_create_iv(22,MCRYPT_DEV_URANDOM)
		);

		$hashed_password=password_hash($password,PASSWORD_BCRYPT,$opciones);
		

		try {
			require_once ('include/funciones/bd_conexion.php');

			$stmt =$conn->prepare("insert into admins(usuario,hash_pass) values(?,?)");
			$stmt->bind_param("ss",$usuario,$hashed_password);
			$stmt->execute();

			if($stmt->error){
				echo '<div class="mensaje error">';
				echo 'Hubo un error';
				echo '</div>';
			}
			else{
				echo '<div class="mensaje">';
				echo 'Se inserto correctamente el usuario';
				echo '</div>';
			}
			$stmt->close();
			$conn->close();
		} catch (Exception $e) {
			echo "horror en la query\n";
			$error= $e->getMessage();
			echo $error;
		}


	}
	?>
</section>

<?php include_once 'include/templates/footer.php'; ?>