
<?php 

if(isset($_POST["submit"])){
	session_start();
	$usuario=$_POST["usuario"];
	$password=$_POST["password"];

	try {
		require_once ('include/funciones/bd_conexion.php');

		$stmt =$conn->prepare("select * from admins where usuario = ?");

		$stmt->bind_param("s",$usuario);
		$stmt->execute();

		$stmt->bind_result($id,$nombre_usuario,$password_usuario);

		while( $stmt->fetch() ){
			if(password_verify($password,$password_usuario)){
				echo '<div class="mensaje">';
				echo 'Se inicio correctamente';
				echo '</div>';
				$_SESSION["usuario"]=$usuario;
				$_SESSION["id"]=$id;
				header("location: admin-area.php");
			}else{
				echo '<div class="mensaje error">';
				echo 'Hubo un error';
				echo '</div>';
			}
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


<?php include_once 'include/templates/header.php';?>


<section class="seccion contenedor">



	<h2>Iniciar session</h2>
	<form action="login.php" class="login" method="post">
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


</section>

<?php include_once 'include/templates/footer.php'; ?>