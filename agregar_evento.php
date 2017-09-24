<?php 
include_once 'include/funciones/funciones.php';
session_start();
usuario_autenticado();

if(isset($_POST["submit"])){
	var_dump($_POST);
	$nombre=$_POST["nombre"];
	$fecha=$_POST["fecha"];
	$hora=$_POST["hora"];
	$id_cat=$_POST["categorias"];
	$id_invitado=$_POST["invitado"];
	

	
	try {
		require_once ('include/funciones/bd_conexion.php');

		$stmt=$conn->prepare("select cat_evento,count(distinct nombre_evento) from eventos
			inner join categoria_evento on eventos.id_cat_evento=categoria_evento.id_categoria 
			where id_cat_evento=?
			");

		$stmt->bind_param("s",$id_cat);
		$stmt->execute();
		$stmt->bind_result($categoria_evento,$total);
		$stmt->store_result();
		
		$sql="insert into eventos(nombre_evento,fecha_evento,hora_evento,id_cat_evento,id_inv,clave) 
		values(?,?,?,?,?,?) ";
		$stmt2 = $conn->prepare($sql);
		$stmt->fetch();


		(int)$total=$total;
		$total++;
		$clave = strtolower(substr($categoria_evento,0,5)) ."_".$total;
		$stmt2->bind_param("ssssss",$nombre,$fecha,$hora,$id_cat,$id_invitado,$clave);
		$stmt2->execute();

		$stmt2->close();
		$stmt->close();
		$conn->close();
		header("Location:agregar_evento.php?exitoso=1");
	} catch (Exception $e) {
		echo "horror en la query\n";
		$error= $e->getMessage();
		echo $error;
	}

	
}

?>

<?php include_once 'include/templates/header.php';?>


<section class="admin seccion contenedor">



	<h2>Panel de administracion</h2>
	<p>Bienvenido <?php echo $_SESSION["usuario"] ?></p>
	<?php include_once 'include/templates/admin-nav.php';?>

	<form class="invitado" action="agregar_evento.php" method="post">
		<div class="campo">
			<label for="nombre">
			Nombre Evento</label><input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
		</div>
		<div class="campo">
			<label for="fecha">
			Fecha</label><input type="date" id="fecha" name="fecha" placeholder="Tu fecha" required>

		</div>
		<div class="campo">
			<label for="hora">
			Hora</label><input type="time" id="hora" name="hora" placeholder="Tu hora" required>

		</div>
	</div>
	<div class="campo">
		<label for="categoria">Categoria</label></br>
		<?php 
		try {
			require_once ('include/funciones/bd_conexion.php');

			$res= $conn->query("select * from categoria_evento");

			while($cat_evento = $res->fetch_assoc()){
				echo '<input type="radio" name="categorias" value='.$cat_evento["id_categoria"] . '>'.$cat_evento["cat_evento"] .'</br>';
			}


			
		} catch (Exception $e) {
			echo "horror en la query\n";
			$error= $e->getMessage();
			echo $error;
		}
		?>
	</div>
	<div class="campo">
		<label for="invitado">Invitado</label>
		<select name="invitado">
			<option value="1">Rafael bautista</option>
			<?php 
			try {
				require_once ('include/funciones/bd_conexion.php');

				$res= $conn->query("select * from invitados");

				while($cat_evento = $res->fetch_assoc()){
					echo '<option value='.$cat_evento["invitado_id"] . '>'.$cat_evento["nombre_invitado"] .'</option>';
				}


				$conn->close();
			} catch (Exception $e) {
				echo "horror en la query\n";
				$error= $e->getMessage();
				echo $error;
			}
			?>
		</select>
	</div>
	<div class="campo">

		<input type="submit" id="submit" name="submit" class="button" required>
	</div>
</form>
<div class="mensaje">
	<?php if(isset($_GET["exitoso"])){
		echo "se guardo exitosamente!!!";
	} 
	?>
</div>
</section>

<?php include_once 'include/templates/footer.php'; ?>