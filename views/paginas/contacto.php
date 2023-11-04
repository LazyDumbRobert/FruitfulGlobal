<main class="contenedor seccion">
        <h1>Contacto</h1>
    <?php 
        if($mensaje) {?>
            <p class='alerta exito'><?php echo $mensaje; ?></p>
        <?php }
    
    ?>


        <h2>Llene el formulario de contacto</h2>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información el contactante</legend>

                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu nombre" name="contacto[nombre]">


                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]"></textarea>

            </fieldset>

            <fieldset>
                <legend>Informacion sobre la empresa</legend>

                
                <label for="empresa">Nombre de su empresa</label>
                <input id="empresa" type="text" placeholder="Nombre de la empresa" name="contacto[empresa]">

                <label for="ubicacion">En donde se ubican</label>
                <input id="ubicacion" type="text" placeholder="Ubicación de la empresa" name="contacto[ubicacion]">

                <label for="tipo_empresa">A que se dedica la empresa</label>
                <input id="tipo_empresa" type="text" placeholder="A que se dedica la empresa" name="contacto[tipo_empresa]">
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                    <label for="contactar-email">Email</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]">
                </div>
                <div id="contacto"></div>

                    
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>