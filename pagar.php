
<pre>
	<?php 

	if(!isset($_POST["submit"])){
		exit("horror  en isset producto precio");
	}


	require "include/paypal_conf.php";
	require("include/funciones/funciones.php");

	use \PayPal\Api\Payer;//importando payer
	use \PayPal\Api\Item;
	use \PayPal\Api\ItemList;
	use \PayPal\Api\Amount;
	use \PayPal\Api\Details;
	use \PayPal\Api\Transaction;
	use \PayPal\Api\RedirectUrls;
	use \PayPal\Api\Payment;
	use \PayPal\Api\Paypal;



	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$email=$_POST["email"];
	$regalo=$_POST["regalo"];
	$total=$_POST["total_pedido"];
	$fecha=date("Y-m-d H:i:s");

	$envio=0;
	$camisas = $_POST["pedido_extra"]["camisas"]["cantidad"];
	$precio_camisa =$_POST["pedido_extra"]["camisas"]["precio"];

	$etiquetas=$_POST["pedido_extra"]["etiquetas"]["cantidad"];
	$precio_etiquetas =$_POST["pedido_extra"]["etiquetas"]["precio"];

	$boletos=$_POST["boletos"];
	$numero_boletos=$boletos;


	$pedido=productos_json($boletos,$camisas,$etiquetas);
	$pedidoExtra=$_POST["pedido_extra"];
	$registro=eventos_json($_POST["registro"]);

	//print_r($boletos);
	//echo "ahora a los numeros_boletos";
	//print_r($numero_boletos);

	try {
		require_once ('include/funciones/bd_conexion.php');


		$stmt = $conn->prepare("insert into registrados(nombre_registrado,apellido_registrado,email_registrado,fecha_registro,pases_articulos,talleres_registrados,regalo,total_pagado) values(?,?,?,?,?,?,?,?)");

		$stmt->bind_param("ssssssis",$nombre,$apellido,$email,$fecha,$pedido,$registro,$regalo,$total);
		$stmt->execute();
		$ID_registro=$stmt->insert_id;
		$stmt->close();
		$conn->close();


		//header('Location: validar_registro.php?exitoso=1');

	} catch (Exception $e) {
		echo "horror en la query\n";
		$error= $e->getMessage();
		echo $error;
	}






	//$articulo = new Item();

	//$articulo->setName($producto)->setCurrency("USD")->setQuantity(1)->setPrice($precio);

	$i=0;
	

	$arreglo_pedido=array();
	foreach ($numero_boletos as $key => $value) {
		if((int)$value["cantidad"]>0){
			${"articulo$i"}= new Item();
			$arreglo_pedido[]=${"articulo$i"};
			${"articulo$i"}->setName("Pase: ".$key)
			->setCurrency("USD")
			->setQuantity((int) $value["cantidad"])
			->setPrice((int) $value["precio"]);
			$i++;
		}

	}

	//$i=0;
	foreach ($pedidoExtra as $key => $value) {
		if((int)$value["cantidad"]>0){

			if($key=="camisas")
			{
			$precio=(float)$value["precio"]* .93;// con descuento
		}
		else {
			$precio=(float)$value["precio"];
		}
		${"articulo$i"}= new Item();
		$arreglo_pedido[]=${"articulo$i"};
		${"articulo$i"}->setName("Extras: ".$key)
		->setCurrency("USD")
		->setQuantity((int) $value["cantidad"])
		->setPrice( $precio);
		$i++;

	}
}


$compra=new Payer();
$compra->setPaymentMethod("paypal");
print_r($arreglo_pedido);


$listaArticulo= new ItemList();
$listaArticulo->setItems($arreglo_pedido);

$cantidad = new Amount();

$cantidad->setCurrency("USD")
->setTotal($total);


$transaccion = new Transaction();

$transaccion->setAmount($cantidad)
->setItemList($listaArticulo)
->setDescription("Pago GDLWebcamp")
->setInvoiceNumber($ID_registro);



$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true&id_pago={$ID_registro}")
->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false&id_pago={$ID_registro}");



$pago= new Payment();
$pago->setIntent("sale")
->setPayer($compra)
->setRedirectUrls($redireccionar)
->setTransactions(array($transaccion));


try{

	$pago->create($apiContent);
}catch (PayPal\Exception\PayPalConnectionException $ex) {

    echo $ex->getCode(); // Prints the Error Code
    echo $ex->getData(); // Prints the detailed error message 
    die($ex);
} catch (Exception $ex) {

	die($ex);
}


$aprobado = $pago->getApprovalLink();

header("Location:{$aprobado}");


?>
</pre>