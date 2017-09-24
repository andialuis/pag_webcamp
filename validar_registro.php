<?php 

if(isset($_POST["submit"])) 
{
	include_once 'include/funciones/funciones.php';

	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$email=$_POST["email"];
	$regalo=$_POST["regalo"];
	$total=$_POST["total_pedido"];
	$fecha=date("Y-m-d H:i:s");


	$camisas = $_POST["pedido_camisas"];
	$etiquetas=$_POST["pedido_etiquetas"];
	$boletos=$_POST["boletos"];


	$pedido=productos_json($boletos,$camisas,$etiquetas);


	$registro=eventos_json($_POST["registro"]);



	try {
		require_once ('include/funciones/bd_conexion.php');


		$stmt = $conn->prepare("insert into registrados(nombre_registrado,apellido_registrado,email_registrado,fecha_registro,pases_articulos,talleres_registrados,regalo,total_pagado) values(?,?,?,?,?,?,?,?)");

		$stmt->bind_param("ssssssis",$nombre,$apellido,$email,$fecha,$pedido,$registro,$regalo,$total);
		$stmt->execute();

		$stmt->close();
		$conn->close();


		header('Location: validar_registro.php?exitoso=1');

	} catch (Exception $e) {
		echo "horror en la query\n";
		$error= $e->getMessage();
		echo $error;
	}
}
?>



<?php include_once 'include/templates/header.php';?>


<section class="seccion contenedor"></section>



<h2>Resumen de registro</h2>

<?php if(isset($_GET["exitoso"]))
		if($_GET["exitoso"]==1)
			echo "registro existoso!!!";
 ?>



<?php include_once 'include/templates/footer.php'; ?>