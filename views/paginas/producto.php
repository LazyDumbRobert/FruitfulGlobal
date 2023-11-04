<main class="contenedor seccion contenido-centrado">
        <h1><?php echo $producto->producto;?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $producto->imagen;?>" alt="imagen/jpeg">

        <div class="resumen-producto">
            <p>
                <?php echo $producto->descripcion;?>
            </p>
        </div>
    </main>