<?php 
include_once 'include/funciones/funciones.php';
session_start();
usuario_autenticado();

 ?>

<?php include_once 'include/templates/header.php';?>


<section class="admin seccion contenedor">



	<h2>Panel de administracion</h2>
	<p>Bienvenido <?php echo $_SESSION["usuario"] ?></p>
<?php include_once 'include/templates/admin-nav.php';?>


</section>

<?php include_once 'include/templates/footer.php'; ?>