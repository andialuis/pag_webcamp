
<?php include_once 'include/templates/header.php';?>
<section class="seccion contenedor">

  <h2>Pagos con Paypal</h2>
  <?php 
  $resultado=$_GET["exito"];
  $paymentId=$_GET["paymentId"];
  $id_pago=$_GET["id_pago"];

  if($resultado==true){
    echo "el pago se realizo correctamente";
    echo "el ID es {$paymentId}";

    require_once ('include/funciones/bd_conexion.php');


    $stmt = $conn->prepare("update registrados set pagado=? where id_registrado=?");

    $pagado=1;
    $stmt->bind_param("ii",$pagado,$id_pago);
    $stmt->execute();
    $ID_registro=$stmt->insert_id;
    $stmt->close();
    $conn->close();


  }else {
    echo "el pago no se realizo!!!";
  }
  ?>

</section>
<?php include_once 'include/templates/footer.php'; ?>