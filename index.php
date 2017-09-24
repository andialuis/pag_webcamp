     <?php include_once 'include/templates/header.php'; ?>


     <section class="seccion contenedor">
        <h2>la mejor conferencia de diseño web</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </section><!-- seccion contenedor -->

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop poster="img/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4"/>
                <source src="video/video.webm" type="video/webm"/>
                <source src="video/video.ogv" type="video/ogv"/>
            </video>
        </div> <!-- contenedor video -->

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Programa del evento</h2>
                    <?php 
                    try {
                        require_once ('include/funciones/bd_conexion.php');

                        $sql="SELECT * FROM categoria_evento";
                        $resultado=$conn->query($sql);
                    } catch (Exception $e) {
                        echo "horror en la query\n";
                        $error= $e->getMessage();
                        echo $error;
                    }
                    ?>
                    <nav class="menu-programa">
                        <?php while($invitado = $resultado->fetch_array(MYSQLI_ASSOC)){ 

                            ?>
                            <a href="#<?php echo strtolower(trim($invitado["cat_evento"])) ?>">
                                <i class="fa <?php echo $invitado['icono'] ?>" aria-hidden="true"></i><?php echo $invitado["cat_evento"]; ?></a>


                                <?php } ?>
                            </nav>


                            <?php 
                            try {

                             $sql="SELECT evento_id,nombre_evento,fecha_evento,hora_evento,categoria_evento.cat_evento,nombre_invitado,apellido_invitado,descripcion,url_imagen FROM eventos 
                             inner join categoria_evento 
                             on eventos.id_cat_evento=categoria_evento.id_categoria
                             inner join invitados
                             on eventos.id_inv=invitados.invitado_id
                             and eventos.id_cat_evento=1
                             order by evento_id limit 2;
                             SELECT evento_id,nombre_evento,fecha_evento,hora_evento,categoria_evento.cat_evento,nombre_invitado,apellido_invitado,descripcion,url_imagen FROM eventos 
                             inner join categoria_evento 
                             on eventos.id_cat_evento=categoria_evento.id_categoria
                             inner join invitados
                             on eventos.id_inv=invitados.invitado_id
                             and eventos.id_cat_evento=2
                             order by evento_id limit 2;
                             SELECT evento_id,nombre_evento,fecha_evento,hora_evento,categoria_evento.cat_evento,nombre_invitado,apellido_invitado,descripcion,url_imagen FROM eventos 
                             inner join categoria_evento 
                             on eventos.id_cat_evento=categoria_evento.id_categoria
                             inner join invitados
                             on eventos.id_inv=invitados.invitado_id
                             and eventos.id_cat_evento=3
                             order by evento_id limit 2;

                             ";


                         } catch (Exception $e) {
                            echo "horror en la query\n";
                            $error= $e->getMessage();
                            echo $error;
                        }
                        ?>
                        <?php
                        $conn->multi_query($sql); 
                        do{
                            $resultado=$conn->store_result();
                            $row = $resultado->fetch_all(MYSQLI_ASSOC); 
                            
                            $i=0;
                            foreach ($row as $key => $evento):?>

                            <?php if($i%2==0):?>
                               <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                               <?php endif;?>  
                               <div class="detalle-evento">
                                <h3><?php echo $evento["nombre_evento"]; ?></h3>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $evento["hora_evento"]; ?></p>
                                <p><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $evento["fecha_evento"]; ?></p>
                                <p><i class="fa fa-user" aria-hidden="true"></i><?php echo $evento["nombre_evento"]; ?></p>
                            </div>

                            <?php if($i%2==1): ?>
                                <a href="#" class="button float-right">ver todos</a>
                            </div><!-- talleres -->
                            <?php 
                        endif; 
                        $i++;
                    endforeach;
                    $resultado->free();
                }while($conn->more_results() && $conn->next_result());



                ?>

            </div><!-- programa evento -->
        </div><!-- contenedor -->
    </div><!-- contenido programa -->
</section>



<?php include_once 'include/templates/invitados.php'; ?>




<div class="contador parallax">
    <div class="contenedor">
        <ul class="resumen-evento clearfix">
            <li><p class="numero">6</p>Invitado</li>
            <li><p class="numero">15</p>Talleres</li>
            <li><p class="numero">3</p>Dias</li>
            <li><p class="numero">9</p>Conferencias</li>

        </ul>
    </div>

</div>



<section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
        <ul class="lista-precios clearfix">
            <li>

                <div class="tabla-precio">
                    <h3>Pase por dia</h3>
                    <p class="numero">$30</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
            <li>

                <div class="tabla-precio">
                    <h3>Pase todos los dia</h3>
                    <p class="numero">$50</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button">Comprar</a>
                </div>
            </li>
            <li>

                <div class="tabla-precio">
                    <h3>Pase por dia</h3>
                    <p class="numero">$45</p>
                    <ul>
                        <li>Bocadillos gratis</li>
                        <li>Todas las conferencias</li>
                        <li>Todos los talleres</li>
                    </ul>
                    <a href="#" class="button hollow">Comprar</a>
                </div>
            </li>
        </ul>
    </div>

</section>


<div id="mapa" class="mapa" >

</div>



<section class="seccion">
    <h2>Testimoniales</h2>
    <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>
                        Oswaldo Apunte Escovedo
                        <span>Diseñador grafico</span>
                    </cite>
                </footer>
            </blockquote>
        </div><!-- FIn testimonial -->
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>
                        Oswaldo Apunte Escovedo
                        <span>Diseñador grafico</span>
                    </cite>
                </footer>
            </blockquote>
        </div><!-- FIn testimonial -->   
        <div class="testimonial">
            <blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                <footer class="info-testimonial clearfix">
                    <img src="img/testimonial.jpg" alt="imagen testimonial">
                    <cite>
                        Oswaldo Apunte Escovedo
                        <span>Diseñador grafico</span>
                    </cite>
                </footer>
            </blockquote>
        </div><!-- FIn testimonial -->
    </div><!-- fin testimoniales clearfix -->
</section>

<div class="newsletter parallax">
    <div class="contenido contenedor">
        <p>registrate al newsletter</p>
        <h3>gdlwebcamp</h3>
        <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>


    </div><!-- contenido contenedor -->

</div><!-- newsletter -->

<section clas="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
        <ul class="clearfix">

            <li><p class="numero" id="dias">80</p>dias</li>
            <li><p class="numero" id="horas">15</p>horas</li>
            <li><p class="numero" id="minutos">5</p>minutos</li>
            <li><p class="numero" id="segundos">30</p>segundos</li>

        </ul>
    </div>
</section>





<?php include_once 'include/templates/footer.php'; ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBf48Ulu7zn9_9EGvsbhixb2Lx28YNowqA&callback=initMap"
async defer>

</script>