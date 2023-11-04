<div class="contenedor-anuncios">
        <?php foreach($productos as $producto):?>    
            <div class="anuncio"> 
                <img class="imagen" src="/imagenes/<?php echo $producto->imagen;?>" alt="anuncio" loading="lazy">

                <div class="contenido-anuncio">
                    <h3><?php echo $producto->producto;?></h3>
                    <p><?php echo $producto->descripcion;?></p>
                    <!-- <p class="precio">$ <?php #echo $producto->precio;?></p> -->
                    <a href="/producto?id=<?php echo $producto->id;?>" class="boton-amarillo-block">Ver Producto</a>
                </div><!--Contenido anuncio-->
            </div><!--Anuncio-->
            <?php endforeach;?>
        </div><!--Cotenedor anuncios-->