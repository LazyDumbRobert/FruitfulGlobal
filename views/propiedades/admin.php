<main class="contenedor seccion">
        <h1>Administrador de FruitfulGlobal</h1> 
        <?php
            if($resultado){
                    $mensaje = MostrarNotificacion(intval($resultado));
                    if($mensaje) { ?>
                        <p class="alerta exito"><?php echo s($mensaje); ?></p>
                    <?php }
                }
            ?>      
       
        <a href="/productos/crear" class="boton boton-verde">Nueva producto</a>

        <h2>Productos</h2>
        <table class="propiedades">
            <thead>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </thead>

            <tbody><!--Mostrar los datos de la base de datos-->

            <?php foreach($productos as $producto):?>
                <tr>
                    <td><?php echo $producto->producto;?></td>
                    <td><img src="/imagenes/<?php echo $producto->imagen?>" class="imagen-tabla"></td>
                    <td>
                        <form method="POST" class="w-100" action="/productos/eliminar">
                            <input type="hidden" name="id" value="<?php echo $producto->id;?>">
                            <input type="hidden" name="tipo" value="producto">
                            <input type="submit" class="boton-rojo-block" value="Eliminar"></a>
                        </form>

                        <a href="/productos/actualizar?id=<?php echo $producto->id?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</main>