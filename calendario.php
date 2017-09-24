

<?php include_once 'include/templates/header.php'; ?>

<section class="seccion contenedor clearfix">
    <h2>Calendario de eventos</h2>

    <?php 
    try {
        require_once ('include/funciones/bd_conexion.php');

        $sql="SELECT evento_id,nombre_evento,fecha_evento,hora_evento,categoria_evento.cat_evento,nombre_invitado,apellido_invitado,descripcion,url_imagen FROM eventos 
        inner join categoria_evento 
        on eventos.id_cat_evento=categoria_evento.id_categoria
        inner join invitados
        on eventos.id_inv=invitados.invitado_id
        order by evento_id";
        $resultado=$conn->query($sql);
    } catch (Exception $e) {
        echo "horror en la query\n";
        $error= $e->getMessage();
        echo $error;
    }
    ?>
<div class="calendario">

    <?php while($eventos = $resultado->fetch_all(MYSQLI_ASSOC)){ ?>
    <?php $dias=array(); ?>
    <?php foreach($eventos as $evento){
        $dias[]=$evento["fecha_evento"];
    } $dias = array_values(array_unique($dias)); 
    $contador=0;?>

    <?php 
    foreach ($eventos as $key => $evento) {


     ?>
     <?php $dia_actual=$evento["fecha_evento"];
        if($dia_actual==$dias[$contador]): ?>
        <h3><i class="fa fa-calendar" aria-hidden="true"></i>
            <?php echo $dia_actual ?>
        </h3>
        <?php $contador++;$contador%=3; endif; ?>
     <div class="dia">
         <p class="titulo">
             <?php echo ($evento["nombre_evento"]); ?>
         </p>
         <p class="hora"><i class="fa fa-clock-o" aria-hidden="true"></i>
             <?php echo $evento["fecha_evento"].$evento["hora_evento"]; ?>
         </p>
         <p>
             <?php $categoria_evento=$evento["cat_evento"];
             switch ($categoria_evento) {
                case 'talleres':
                echo '<i class="fa fa-code" aria-hidden="true"></i>Taller';
                break;
                case 'conferencia':
                echo '<i class="fa fa-comment" aria-hidden="true"></i>Conferencia';
                break;
                case 'seminario':
                echo '<i class="fa fa-university" aria-hidden="true"></i>Seminarios';
                break;
                default:
                        # code...
                break;
            }
            ?>

        </p>
        <p><i class="fa fa-user" aria-hidden="true"></i>
            <?php echo $evento["nombre_invitado"] . " ". $evento["apellido_invitado"]; ?>
        </p>
    </div>
    <?php }//for row categoria ?>

    <?php } 
    $conn->close();
    ?>
    </div><!-- calendario -->

</section>


<?php include_once 'include/templates/footer.php'; ?>