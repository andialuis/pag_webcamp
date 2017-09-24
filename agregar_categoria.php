<?php 
include_once 'include/funciones/funciones.php';
session_start();
usuario_autenticado();

if(isset($_POST["submit"])){
	var_dump($_POST);
	$nombre=$_POST["nombre"];
	$icono=$_POST["icono"];
	
	try {
		require_once ('include/funciones/bd_conexion.php');


		$sql="insert into categoria_evento(cat_evento,icono) 
		values(?,?) ";
		$stmt2 = $conn->prepare($sql);
		

		$stmt2->bind_param("ss",$nombre,$icono);
		$stmt2->execute();

		$stmt2->close();

		$conn->close();
		header("Location:agregar_categoria.php?exitoso=1");
	} catch (Exception $e) {
		echo "horror en la query\n";
		$error= $e->getMessage();
		echo $error;
	}

	
}

?>

<?php include_once 'include/templates/header.php';?>


<section class="admin seccion contenedor">



	<h2>Agregar Categoria</h2>
	<p>Bienvenido <?php echo $_SESSION["usuario"] ?></p>
	<?php include_once 'include/templates/admin-nav.php';?>

	<form class="invitado" action="agregar_categoria.php" method="post">
		<div class="campo">
			<label for="nombre">
			Nombre categoria</label><input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
		</div>
		<div class="campo">
			<label for="icono">
			Icono</label><input type="text" id="icono" name="icono" placeholder="Tu icono" required>
		</div>
		<div class="campo">
			<input type="submit" id="submit" name="submit" class="button" required>
		</div>
	</form>
	
	<?php if(isset($_GET["exitoso"])){ ?>
	<div class="mensaje">
		<?php  echo "se guardo exitosamente!!!";?>
	</div>
	<?php } 
	?>
	
</section>

<?php include_once 'include/templates/footer.php'; ?>