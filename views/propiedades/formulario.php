            <fieldset>
                <legend>Información general</legend>

                <label for="producto">Producto</label>
                <input type="text" id="producto" name="producto[producto]" placeholder="Producto" value="<?php echo s($propiedad->titulo);?>">

                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="producto[imagen]">
                <?php if($propiedad->imagen):?>
                    <img src="/imagenes/<?php echo $propiedad->imagen?>" class="imagen-small">
                <?php endif;?>

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="producto[descripcion]"><?php echo s($propiedad->descripcion);?></textarea>
            </fieldset>

            </fieldset>
