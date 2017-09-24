<?php 
include_once 'include/funciones/funciones.php';
session_start();
usuario_autenticado();

if(isset($_POST["submit"])){
	var_dump($_POST);
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$descripcion=$_POST["descripcion"];
	$imagen=$_FILES["imagen"];
	$directorio= "/img/invitados/";
	$resultado="error en carga de archivo";
	if(move_uploaded_file($imagen["tmp_name"], __DIR__ . $directorio .$imagen["name"] ) ){
		$imagen_url = $imagen["name"];
		$resultado="se subio correctamente";


		try {
			require_once ('include/funciones/bd_conexion.php');

			$stmt =$conn->prepare("insert into invitados(nombre_invitado,apellido_invitado,descripcion,url_imagen) values(?,?,?,?)");
			$stmt->bind_param("ssss",$nombre,$apellido,$descripcion,$imagen_url);
			$stmt->execute();
			
			if($stmt->error){
				$resultado= '<div class="mensaje error">Hubo un error</div>';
			}
			else{
				$resultado= '<div class="mensaje">Se inserto correctamente el usuario</div>';
			}
			$stmt->close();
			$conn->close();
			header("Location:agregar_invitado.php?exitoso=1");
		} catch (Exception $e) {
			echo "horror en la query\n";
			$error= $e->getMessage();
			echo $error;
		}

	}
}

?>

<?php include_once 'include/templates/header.php';?>


<section class="admin seccion contenedor">



	<h2>Panel de administracion</h2>
	<p>Bienvenido <?php echo $_SESSION["usuario"] ?></p>
	<?php include_once 'include/templates/admin-nav.php';?>

	<form class="invitado" action="agregar_invitado.php" method="post" enctype="multipart/form-data">
		<div class="campo">
			<label for="nombre">
			Nombre</label><input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
		</div>
		<div class="campo">
			<label for="apellido">
			Usuario</label><input type="text" id="apellido" name="apellido" placeholder="Tu apellido" required>

		</div>
		<div class="campo">
			<label for="descripcion">
			descripcion</label><textarea id="descripcion" name="descripcion" placeholder="Tu descripcion" required>
			</textarea>
		</div>
		<div class="campo">
			<label for="imagen">
			Usuario</label>
			<input type="file" id="imagen" name="imagen" placeholder="Tu imagen" required>
		</div>
		<div class="campo">

			<input type="submit" id="submit" name="submit" class="button" required>
		</div>
	</form>
	<?php if(isset($_GET["exitoso"])){
		echo "subia exitosa";
	} else 
	echo $resultado;
	?>

</section>

<?php include_once 'include/templates/footer.php'; ?>