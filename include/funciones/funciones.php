<?php 


function productos_json(&$boletos,&$camisas=0,&$etiquetas=0){

	$dias=array("un dia","pase_completo","pase_2dias");
	$total_boletos=array_combine($dias, $boletos);

	$json=array();

	foreach ($total_boletos as $key => $boletos) {
		if((int)$boletos>0)
		{
			$json[$key]=(int)$boletos;
		}

		$camisas=(int)$camisas;
		if($camisas>0)
			$json["camisa"]=$camisas;

		$etiquetas=(int)$etiquetas;
		if($etiquetas>0)
			$json["etiquetas"]=$etiquetas;


		return json_encode($json);

	}

}

function eventos_json(&$eventos)
{
	$eventos_json=array();

	foreach ($eventos as $key => $evento) {
		$eventos_json["evento"][]=$evento;
	}

	return json_encode($eventos_json);

}
function usuario_autenticado(){
	if(!revisar_usuario())
		header("Location:login.php");
}
function revisar_usuario(){
	return isset($_SESSION["usuario"]);
}

function formatear_pedidos($articulos){
	$art= json_decode($articulos,true);

	$pedido="";
	if(array_key_exists("un dia", $art)){
		$pedido.="Pase 1 dia" . $art["un dia"]."</br>";
	}
	if(array_key_exists("pase_2dias", $art)){
		$pedido.="Pase 2 dia: " . $art["pase_2dias"]."</br>";
	}	
	if(array_key_exists("", $art)){
		$pedido.="Pase 1 dia: " . $art["un_dia"]."</br>";
	}
	if(array_key_exists("pase_completo", $art)){
		$pedido.="Pase(s) completos: " . $art["pase_completo"]."</br>";
	}
	if(array_key_exists("camisas", $art)){
		$pedido.="Camisas: " . $art["camisas"]."</br>";
	}
	if(array_key_exists("etiquetas", $art)){
		$pedido.="etiquetas: " . $art["etiquetas"]."</br>";
	}
	return $pedido;
}
function formater_eventos_a_sql($eventos){
	
	$eventos = json_decode($eventos,true);
	$sql = "select  * from eventos where clave = 'a'";

	foreach($eventos['evento'] as $evento){
		$sql.=" or clave= '{$evento}'";
	}
	return 	$sql;
}

?>