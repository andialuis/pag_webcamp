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



	<h2>Lista de usuariso registrados</h2>
	<p>Bienvenido <?php echo $_SESSION["usuario"] ?></p>
	<?php include_once 'include/templates/admin-nav.php';?>

	<p>Filtros</p>
	<nav id="filtros">
		<a id="pagados" href="#">Pagados</a>
		<a id="no_pagados" href="#">No pagados</a>

		
	</nav>

	<table class="registrados">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Fecha Registro</th>
				<th>Articulo Adquirido</th>
				<th>Regalo</th>
				<th>Total pagado</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			try {
				require_once ('include/funciones/bd_conexion.php');
				require_once ('include/funciones/funciones.php');

				$resultado=$conn->query("select * from registrados
										inner join regalos
										on registrados.regalo=regalos.id_regalo
						");
				while($registrados= $resultado->fetch_assoc()): ?>
				<tr class="<?php echo $registrados["pagado"]?"pagado":"no_pagado"; ?>">
					<td><?php echo $registrados["id_registrado"] ?></td>
					<td><?php echo $registrados["nombre_registrado"]. " ". $registrados["apellido_registrado"] ?></td>
					<td><?php echo $registrados["email_registrado"]; ?></td>
					<td><?php echo date("jS F, Y H:i",strtotime($registrados["fecha_registro"])); ?></td>
					<td><?php $articulos = $registrados["pases_articulos"]; 
	
						 echo formatear_pedidos($articulos);
					?></td>
					<td><?php echo $registrados["nombre_regalo"] ?></td>
					<td><?php echo $registrados["total_pagado"] ?></td>
				</tr>
				<tr class="<?php echo $registrados["pagado"]?"pagado":"no_pagado"; ?>"> 
					<td colspan="7">Eventos registrados</br>
						<?php $eventos = $registrados["talleres_registrados"];
							$sql=formater_eventos_a_sql($eventos);
							$res= $conn->query($sql);
							$ev="";
							while($eventos = $res->fetch_assoc())
							{
								foreach ($eventos as $key => $evento) {
									echo $evento.", ";
								}
							}
						 ?>
					</td>
				</tr>
				<?php endwhile;

				$conn->close();
			} catch (Exception $e) {
				echo "horror en la query\n";
				$error= $e->getMessage();
				echo $error;
			}
			?>
		</tbody>
	</table>



</section>

<?php include_once 'include/templates/footer.php'; ?>